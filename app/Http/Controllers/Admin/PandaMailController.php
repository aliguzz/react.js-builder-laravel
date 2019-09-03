<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Contact;
use App\Leads;
use App\EmailLists;
use App\EmailTemplates;
use App\SmsTemplates;
use App\BroadcastEmailList;
use App\Project;
use App\DbModel;
use App\Funnels;
use App\FunnelSteps;
use App\FunnelEmailLists;
use App\AutomationActions;
use Alert;
use View;
use DB;
use Twilio;
use Auth;
use Session;

class PandaMailController extends Controller {

    public function index(Request $request) {
         $user = array();
           $user = Auth::user();
        $data['contacts'] = Leads::select('leads.*', \DB::raw('(select name from `projects` WHERE projects.id = leads.project_id) AS project_name'))->where('user_id',$user->id)->orderby('id', 'DESC')->paginate(10);
        $data['total'] = Leads::count();

       
        $pages = array();
        
      
            $data['user_id'] = $user->id;
        $data['ProjectData'] = \DB::table('projects')->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')->select('projects.*', \DB::raw('(SELECT GROUP_CONCAT(domains.name) FROM domains WHERE domains.project_id = projects.id GROUP BY domains.project_id LIMIT 0,1) AS domain_names'), \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'))->where('users_projects.user_id', $user->id)->first();

        
        $where = ' email_lists.id > 0 ';

        if (isset($request->keyword)) {
            $where .= ' AND LOWER(email_lists.title) LIKE "%' . strtolower($request->keyword) . '%" ';
        }

        $data['email_lists'] = \DB::table('email_lists')->select('email_lists.*', \DB::raw('(SELECT COUNT(id) FROM leads_email_lists WHERE leads_email_lists.email_list_id = email_lists.id AND leads_email_lists.action = "add_to" LIMIT 0,1) AS sub_count'), \DB::raw('(SELECT COUNT(id) FROM leads_email_lists WHERE leads_email_lists.email_list_id = email_lists.id AND leads_email_lists.action = "remove_from" LIMIT 0,1) AS unsub_count'))
        ->whereRaw($where)
        ->orderby('id', 'DESC')->paginate(10);
        $data['total'] = \DB::table('email_lists')->count();

        return view('admin.pandamails.contacts')->with($data);
    }

    public function contacts_ajax(Request $request) {
        $input = $request->all();
        $where = ' leads.id > 0 ';
        if (isset($input['date_period']) && $input['date_period'] != '') {
            $date_range = explode(' - ', $input['date_period']);
            $start_date = date("Y-m-d", strtotime($date_range[0])) . ' 00:00:00';
            $end_date = date("Y-m-d", strtotime($date_range[1])) . ' 23:59:59';
            $where .= ' AND leads.created_at >= "' . $start_date . '" AND leads.created_at <= "' . $end_date . '" ';
        }
        if (isset($input['search_keyword']) && $input['search_keyword'] != '') {
            $where .= ' AND ( ';
            $where .= ' LOWER(CONCAT(leads.title, " ",leads.first_name, " ", leads.last_name)) LIKE "%' . strtolower($input['search_keyword']) . '%" ';
            $where .= ' OR LOWER(leads.first_name) LIKE "%' . strtolower($input['search_keyword']) . '%" ';
            $where .= ' OR LOWER(leads.email) LIKE "%' . strtolower($input['search_keyword']) . '%" ';
            $where .= ' OR LOWER(leads.full_name) LIKE "%' . strtolower($input['search_keyword']) . '%" ';

            $splited_array = explode(" ", strtolower($input['search_keyword']));
            if (count($splited_array) > 1) {
                foreach ($splited_array as $single_val) {
                    if ($single_val != '') {
                        $where .= ' OR LOWER(CONCAT(leads.title, " ",leads.first_name, " ", leads.last_name)) LIKE "%' . $single_val . '%" ';
                        $where .= ' OR LOWER(leads.first_name) LIKE "%' . $single_val . '%" ';
                        $where .= ' OR LOWER(leads.email) LIKE "%' . $single_val . '%" ';
                        $where .= ' OR LOWER(leads.full_name) LIKE "%' . $single_val . '%" ';
                    }
                }
            }
            $where .= ' ) ';
        }

        $leads = Leads::select('leads.*',  \DB::raw('(select name from `projects` WHERE projects.id = leads.project_id) AS project_name'))->whereRaw($where)->orderby('id', 'desc')->paginate(10);

        $output = '<table class="table table-hover table-nomargin no-margin table-bordered table-striped"><thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>IP Address</th><th>Page</th><th>Status</th><th>Actions</th></tr></thead><tbody>';
        foreach ($leads as $cont) {
            if ($cont->lead_status == 1) {
                $status = '<label class="label label-success">Active</label>';
            } else {
                $status = '<label class="label label-danger">Inactive</label>';
            }
            $name = '';
            if ($cont->title) {
                $name .= $cont->title . ' ';
            }
            if ($cont->full_name) {
                $name .= $cont->full_name;
            } else {
                $name .= $cont->first_name . ' ' . $cont->last_name;
            }
            $output .= '<tr><td>' . $name . '</td><td>' . $cont->email . '</td><td>' . $cont->phone . '</td><td>' . $cont->ip_address . '</td><td>' . $cont->page_name . '</td><td>' . $status . '</td><td><a href="' . url('admin/contacts/' . $cont->id) . '"><i class="fa fa-edit fa-fw"></i></a><a target="_blank" href="' . url('page/' . $cont->project_name) . '"><i class="fa fa-eye fa-fw"></i></a></td></tr>';
        }
        $output .= '</tbody></table></div><nav class = "pull-right">' . $leads->render() . '</nav>';
        if (count($leads) == 0) {
            $output = '<div class="contact_cnt text-center"><h3>No Contacts Found</h3><p><em>Looks like you have not collected any contacts for this panda page in the selected date range.</em><br><br>Start by sending traffic to the beginning of this panda page or any opt-in page within this panda page. All your contacts will appear here to manage and view.</p></div>';
        }
        echo $output;
    }

    public function contacts_export(Request $request) {
        $input = $request->all();
        $where = ' leads.id > 0 ';
        if (isset($input['date_period']) && $input['date_period'] != '') {
            $date_range = explode(' - ', $input['date_period']);
            $start_date = date("Y-m-d", strtotime($date_range[0])) . ' 00:00:00';
            $end_date = date("Y-m-d", strtotime($date_range[1])) . ' 23:59:59';
            $where .= ' AND leads.created_at >= "' . $start_date . '" AND leads.created_at <= "' . $end_date . '" ';
        }
        if (isset($input['search_keyword']) && $input['search_keyword'] != '') {
            $where .= ' AND ( ';
            $where .= ' LOWER(CONCAT(leads.title, " ",leads.first_name, " ", leads.last_name)) LIKE "%' . strtolower($input['search_keyword']) . '%" ';
            $where .= ' OR LOWER(leads.email) LIKE "%' . strtolower($input['search_keyword']) . '%" ';
            $where .= ' OR LOWER(leads.full_name) LIKE "%' . strtolower($input['search_keyword']) . '%" ';
            $splited_array = explode(" ", strtolower($input['search_keyword']));
            if (count($splited_array) > 1) {
                foreach ($splited_array as $single_val) {
                    if ($single_val != '') {
                        $where .= ' OR LOWER(CONCAT(leads.title, " ",leads.first_name, " ", leads.last_name)) LIKE "%' . $single_val . '%" ';
                        $where .= ' OR LOWER(leads.email) LIKE "%' . $single_val . '%" ';
                        $where .= ' OR LOWER(leads.full_name) LIKE "%' . $single_val . '%" ';
                    }
                }
            }
            $where .= ' ) ';
        }

        $leads = Leads::select('leads.*',  \DB::raw('(select name from `projects` WHERE projects.id = leads.project_id) AS project_name'))->whereRaw($where)->orderby('id', 'desc')->get();

        $header = array('id', 'ip_address', 'created_at', 'lead_status', 'title', 'first_name', 'last_name', 'full_name', 'company', 'designation', 'dob_day', 'dob_month', 'dob_year', 'phone', 'fax', 'email', 'address', 'city', 'zip');

        $head_row = array();
        foreach ($header as $head) {
            $head_row[] = strtoupper(str_replace('_', ' ', $head));
        }

        $file = fopen('uploads/leads_exports/export-leads.csv', 'w');
        fputcsv($file, $head_row);
        foreach ($leads as $lead) {
            $new_array = array();
            $new_row = array();
            if ($lead->lead_status == 1) {
                $lead_status = 'Active';
            } else {
                $lead_status = 'Inactive';
            }

            $new_row[0] = $lead->id;
            $new_row[1] = $lead->ip_address;
            $new_row[2] = $lead->created_at;
            $new_row[3] = $lead_status;
            $new_row[4] = $lead->title;
            $new_row[5] = $lead->first_name;
            $new_row[6] = $lead->last_name;
            $new_row[7] = $lead->full_name;
            $new_row[8] = $lead->company;
            $new_row[9] = $lead->designation;
            $new_row[10] = $lead->dob_day;
            $new_row[11] = $lead->dob_month;
            $new_row[12] = $lead->dob_year;
            $new_row[13] = $lead->phone;
            $new_row[14] = $lead->fax;
            $new_row[15] = $lead->email;
            $new_row[16] = $lead->address;
            $new_row[17] = $lead->city;
            $new_row[18] = $lead->zip;
            if ($lead->other_fields_values != '') {
                $other_all_fields = json_decode($lead['other_fields_values']);
                $j = 19;
                foreach ($other_all_fields as $field) {
                    $new_row[$j] = $field;
                    $j++;
                }
            }
            fputcsv($file, $new_row);
        }
        fclose($file);
        echo url('/uploads/leads_exports/export-leads.csv');
        exit();
    }

    public function lead_detail($id) {
        $data['contacts'] = Leads::select('leads.*', \DB::raw('(select name from `projects` WHERE projects.id = leads.project_id) AS project_name'))->where('id', $id)->first();
        //print_r($data['contacts']); exit;
        return view('admin.pandamails.lead_detail')->with($data);
    }

    // loading list view 
    public function email_list($id) {
        $data['last_project'] = \DB::table('projects')
                        ->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')
                        ->leftJoin('domains', 'domains.project_id', '=', 'projects.id')
                        ->leftJoin('package_orders', 'package_orders.user_id', '=', 'users_projects.user_id')
                        ->leftJoin('packages', 'packages.id', '=', 'package_orders.package_id')
                        ->select('projects.*', \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'),'domains.name as domain_name', 'packages.title as package_title')
						->orderBy('projects.id', 'desc')
						->where('users_projects.user_id', Auth::user()->id)
						->where('users_projects.project_id', $id)->limit(1)->get();
        
        Session::put('session_last_project', $data['last_project']);
        
        
        $user = Auth::user();
            $data['user_id'] = $user->id;
        
        if (EmailTemplates::where('user_id', '=', $data['user_id'])->where('email_type','=','auto-responder')->where('project_id','=',$id)->exists()) {
             $data['email_templates'] = EmailTemplates::select('email_templates.*')->where('user_id', '=', $data['user_id'])->where('email_type','=','auto-responder')->where('project_id','=',$id)->get();
        }else{
        $insert_data['id'] = rand(10,10000000).$data['user_id'];
        $insert_data['template_type'] = 3;
        $insert_data['email_type'] = 'auto-responder';
        $insert_data['title'] = 'Auto Responder';
        $insert_data['content'] = '<p>hi admin!</p>';
        $insert_data['subject'] = 'Auto Respond Email';
        $insert_data['user_id'] = $data['user_id'];
        $insert_data['updated_at'] = date('Y-m-d H:i:s');
        $insert_data['created_at'] = date('Y-m-d H:i:s');
        $insert_data['project_id'] = $id;
        \DB::table('email_templates')->insert($insert_data);
        $data['email_templates'] = EmailTemplates::select('email_templates.*')->where('user_id', '=', $data['user_id'])->where('email_type','=','auto-responder')->where('project_id','=',$id)->get();
        }
        $data['id_project'] = \DB::table('projects')
                        ->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')
                        ->leftJoin('domains', 'domains.project_id', '=', 'projects.id')
                        ->leftJoin('package_orders', 'package_orders.user_id', '=', 'users_projects.user_id')
                        ->leftJoin('packages', 'packages.id', '=', 'package_orders.package_id')
                        ->select('projects.*', \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'),'domains.name as domain_name', 'packages.title as package_title')
						->orderBy('projects.id', 'desc')
						->where('users_projects.user_id', Auth::user()->id)
						->where('users_projects.project_id', $id)->get();
 
        $data['package_id'] = \DB::table('package_orders')
                                 ->where('user_id', $data['user_id'])
                                 ->where('free_trial', 1)
                                 ->select('package_id')
                                 ->first();

        $data['all_project'] = \DB::table('projects')
                        ->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')
                        ->leftJoin('domains', 'domains.project_id', '=', 'projects.id')
                        ->leftJoin('package_orders', 'package_orders.user_id', '=', 'users_projects.user_id')
                        ->leftJoin('packages', 'packages.id', '=', 'package_orders.package_id')
                        ->select('projects.*', \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'),'domains.name as domain_name', 'packages.title as package_title')
						->orderBy('projects.id', 'desc')
						->where('users_projects.user_id', Auth::user()->id)->get();
        
						
		$data['domains'] = \DB::table('domains')->select('id','name')->where(['user_id' => Auth::user()->id, 'project_id' => 0])->get();
     
        
        $data['emailsdata'] = \DB::table('email_owners_users')->where('project_id', $id)->where('action_type', 'email')->first();
        
        $response = \DB::table('users_projects')->select('status')->where('project_id',$id)->where('user_id', Auth::user()->id)->first(); 
        $data['project_email_status'] = $response->status;
        
        $response = \DB::table('users_projects')->select('email_respose')->where('project_id',$id)->where('user_id', Auth::user()->id)->first(); 
        $data['project_email_response_status'] = $response->email_respose;
        
        $response = \DB::table('users_projects')->select('linked_website')->where('project_id',$id)->where('user_id', Auth::user()->id)->first(); 
        $data['project_webiste_response_status'] = $response->linked_website;
        
        $actions = \DB::table('projects')
                ->where('id', $id)->select('projects.*')->first();
        
        $forms = explode(",",$actions->forms);
        $formswith = $forms;

        foreach(@$forms as $key => $fm){
            $actions1 = \DB::table('automation_actions')
                ->select('is_active')->where('project_id', $id)->where('form_name',$fm)->first();
            if(!empty($actions1)){
                $formswith[$key] = array($fm,$actions1->is_active);
            }else{
                $formswith[$key] = array($fm);
            }
        }
        $data['all_forms_of_project'] = $formswith;
        $data['ProjectData'] = $actions;
        

       
        
                $data['contacts'] = Leads::select('leads.*', \DB::raw('(select name from `projects` WHERE projects.id = leads.project_id) AS project_name'))->where('leads.project_id',$id)->orderby('id', 'DESC')->paginate(10);
        $data['total'] = Leads::count();
        
        return view('admin.pandamails.list')->with($data);
    }
    public function send_test_email_user(Request $request) {
    $input = $request->all();
        $flag = 0;
        $user = Auth::user();
            $smtp = \DB::table("smtp_settings")->where("user_id", 1)->select('from_name', 'from_email')->first();
            $emailtemp = \DB::table("email_templates")->where("user_id", $user->id)->where('template_type',3)->where('project_id', $input['project_id'])->select('*')->first();
            echo '<pre>';print_r($emailtemp); die();
            if (!empty($smtp)) {
                $to = $input['useremail'];
                $returnpath = "";
                $cc = "";
                $subject = 'Test '.$emailtemp->subject;
                $html_body = $emailtemp->content;
                $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
                $dd = DbModel::SendHTMLMail($to, $subject, $mailContents, $smtp->from_email, $smtp->from_name, $returnpath, $cc);
                echo "Email sent Successfully..!";
                exit();
            }else{
                echo 'Sorry! email not sent';
                exit();
            }
    
    }    
    public function new_owner_user(Request $request) {
    $input = $request->all();

        if (!empty($input['emails']) || !empty($input['owner_name'])) {

            $exist = \DB::table('email_owners_users')->where('project_id', $input['project_id'])->where('action_type', $input['action'])->first();
            $array = [];
            if (empty($exist)) {
                $array['project_id'] = $input['project_id'];
                $array['emails'] = ($input['action'] == 'email') ? $input['owner_name']."?".$input['emails'].',' : '';
                $array['phones'] = ($input['action'] == 'text') ? $input['owner_name']."?".$input['text'].',' : '';
                $array['owner_name'] = $input['owner_name'];
                $array['form_name'] = '';
                $array['action_type'] = $input['action'];
                $array['created_at'] = date('Y-m-d H:i:s');
                $array['updated_at'] = date('Y-m-d H:i:s');

                \DB::table('email_owners_users')->insert($array);
                
                                                                echo '<tr>
                                                                    <td class="">
                                                                    <div class="h6">'. ($input['number'] + 1) .'</div></td>
                                                                    <td class="">'.$input['owner_name'].'</td>
                                                                    <td><span class="flex"><img class="img-fluid" src="'.asset('assets/images/icon-4.jpg').'">'.$input['emails'].'</span></td>
                                                                    
                                                                    <td class="text-center text-primary"><a href="javascript:void(0)" data-useremail="'.$input['emails'].'" data-username="'.$input['owner_name'].'" data-project_id="'.$input['project_id'].'" class="sendtestemailuser"> Send Test Email > </a></td>
                                                                </tr>';
            } else {
                if ($input['action'] == 'email'){
                    $exist = \DB::table('email_owners_users')->select('emails')->where('project_id', $input['project_id'])->where('action_type', $input['action'])->first();

                    if($exist->emails == ''){
                    $array['emails'] = implode(',', array_filter(json_decode(json_encode($exist),true))).$input['owner_name'].'?'.$input['emails'];
                    }else{
                    $array['emails'] = implode(',', array_filter(json_decode(json_encode($exist),true))).','.$input['owner_name'].'?'.$input['emails'];
                    }
                    
                }    
                else{
                    $exist = \DB::table('email_owners_users')->select('phones')->where('project_id', $input['project_id'])->where('action_type', $input['action'])->first();
                    if($exist->phones == ''){
                    $array['phones'] = implode(',', array_filter(json_decode(json_encode($exist),true))).','.$input['owner_name'].'?'.$input['text'];
                    }else{
                    $array['phones'] = implode(',', array_filter(json_decode(json_encode($exist),true))).','.$input['owner_name'].'?'.$input['text'];
                    }  
                }

                $array['updated_at'] = date('Y-m-d H:i:s');
                \DB::table('email_owners_users')->where('project_id', $input['project_id'])->where('action_type', $input['action'])->update($array);
                
                                                        echo '<tr>
                                                                    <td class="">
                                                                    <div class="h6">'. ($input['number'] + 1) .'</div></td>
                                                                    <td class="">'.$input['owner_name'].'</td>
                                                                    <td><span class="flex"><img class="img-fluid" src="'.asset('assets/images/icon-4.jpg').'">'.$input['emails'].'</span></td>
                                                                    
                                                                    <td class="text-center text-primary"><a href="javascript:void(0)" data-useremail="'.$input['emails'].'" data-username="'.$input['owner_name'].'" data-project_id="'.$input['project_id'].'" class="sendtestemailuser"> Send Test Email > </a></td>
                                                                </tr>';
                
            }
        } else
            Alert::error('Error Message', 'User not added!')->autoclose(3000);


    }
    public function change_panda_forms_status(Request $request) {
        $input = $request->all();
       
        
        
        
         if (DB::table('automation_actions')->select('automation_actions.*')->where('project_id',$input['id'])->where('form_name', $input['form_name'])->exists()) {
             
        $response = \DB::table('automation_actions')->select('automation_actions.*')->where('project_id',$input['id'])->where('form_name', $input['form_name'])->first(); 
        if($response->is_active == 0){
        $res = DB::table('automation_actions')->where('project_id' , $input['id'])->where('form_name' , $input['form_name'])->update(['is_active' => 1]);
        echo '1';
        exit();
        }else{
        $res = DB::table('automation_actions')->where('project_id' , $input['id'])->where('form_name' , $input['form_name'])->update(['is_active' => 0]);
        echo '0';
        exit();
        }
        
        }else{ 
        $insert_data['updated_at'] = date('Y-m-d H:i:s');
        $insert_data['created_at'] = date('Y-m-d H:i:s');
        $insert_data['project_id'] = $input['id'];
        $insert_data['is_active'] = 1;
        $insert_data['form_name'] = $input['form_name'];
        \DB::table('automation_actions')->insert($insert_data);
        echo '0';
        exit();
        }
        
        
        
        
        $response = \DB::table('automation_actions')->select('automation_actions.*')->where('project_id',$input['project_id'])->where('id', $input['id'])->first(); 
        if($response->is_active == 0){
        $res = DB::table('automation_actions')->where('project_id' , $input['project_id'])->where('id' , $input['id'])->update(['is_active' => 1]);
        echo '1';
        exit();
        }else{
        $res = DB::table('automation_actions')->where('project_id' , $input['project_id'])->where('id' , $input['id'])->update(['is_active' => 1]);
        echo '0';
        exit();
        }
       
       
    }
    public function change_panda_site_status(Request $request) {
        $input = $request->all();
       
       if($input['types'] == 'statusbtn'){
           
        $response = \DB::table('users_projects')->select('status')->where('project_id',$input['project_id'])->where('user_id', $input['user_id'])->first(); 
        if($response->status == 0){
        $res = DB::table('users_projects')->where('project_id' , $input['project_id'])->where('user_id' , $input['user_id'])->update(['status' => 1]);
        echo '1';
        exit();
        }else{
        $res = DB::table('users_projects')->where('project_id' , $input['project_id'])->where('user_id' , $input['user_id'])->update(['status' => 0]);
        echo '0';
        exit();
        }
       
       }else if($input['types'] == 'emailbtn'){
           
        $response = \DB::table('users_projects')->select('email_respose')->where('project_id',$input['project_id'])->where('user_id', $input['user_id'])->first(); 
        if($response->email_respose == 0){
        $res = DB::table('users_projects')->where('project_id' , $input['project_id'])->where('user_id' , $input['user_id'])->update(['email_respose' => 1]);
        echo '1';
        exit();
        }else{
        $res = DB::table('users_projects')->where('project_id' , $input['project_id'])->where('user_id' , $input['user_id'])->update(['email_respose' => 0]);
        echo '0';
        exit();
        }
       
       }else if($input['types'] == 'websitebtn'){
           
        $response = \DB::table('users_projects')->select('linked_website')->where('project_id',$input['project_id'])->where('user_id', $input['user_id'])->first(); 
        if($response->linked_website == 0){
        $res = DB::table('users_projects')->where('project_id' , $input['project_id'])->where('user_id' , $input['user_id'])->update(['linked_website' => 1]);
        echo '1';
        exit();
        }else{
        $res = DB::table('users_projects')->where('project_id' , $input['project_id'])->where('user_id' , $input['user_id'])->update(['linked_website' => 0]);
        echo '0';
        exit();
        }
       
       }
    }
    
    public function text_list($id) {
       
        
        $data['last_project'] = \DB::table('projects')
                        ->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')
                        ->leftJoin('domains', 'domains.project_id', '=', 'projects.id')
                        ->leftJoin('package_orders', 'package_orders.user_id', '=', 'users_projects.user_id')
                        ->leftJoin('packages', 'packages.id', '=', 'package_orders.package_id')
                        ->select('projects.*', \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'),'domains.name as domain_name', 'packages.title as package_title')
						->orderBy('projects.id', 'desc')
						->where('users_projects.user_id', Auth::user()->id)
						->where('users_projects.project_id', $id)->limit(1)->get();
        
        Session::put('session_last_project', $data['last_project']);
       
        $user = Auth::user();
            $data['user_id'] = $user->id;
        
        if (SmsTemplates::where('user_id', '=', $data['user_id'])->where('sms_type','=','auto-responder')->where('project_id','=',$id)->exists()) {
             $data['sms_templates'] = SmsTemplates::select('sms_templates.*')->where('user_id', '=', $data['user_id'])->where('sms_type','=','auto-responder')->where('project_id','=',$id)->get();
        }else{
        $insert_data['template_type'] = 3;
        $insert_data['sms_type'] = 'auto-responder';
        $insert_data['title'] = 'Auto Responder';
        $insert_data['content'] = '<p>hi admin!</p>';
        $insert_data['user_id'] = $data['user_id'];
        $insert_data['updated_at'] = date('Y-m-d H:i:s');
        $insert_data['created_at'] = date('Y-m-d H:i:s');
        $insert_data['project_id'] = $id;
        \DB::table('sms_templates')->insert($insert_data);
        $data['sms_templates'] = SmsTemplates::select('sms_templates.*')->where('user_id', '=', $data['user_id'])->where('sms_type','=','auto-responder')->where('project_id','=',$id)->get();
        }
          
        $data['id_project'] = \DB::table('projects')
                        ->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')
                        ->leftJoin('domains', 'domains.project_id', '=', 'projects.id')
                        ->leftJoin('package_orders', 'package_orders.user_id', '=', 'users_projects.user_id')
                        ->leftJoin('packages', 'packages.id', '=', 'package_orders.package_id')
                        ->select('projects.*', \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'),'domains.name as domain_name', 'packages.title as package_title')
						->orderBy('projects.id', 'desc')
						->where('users_projects.user_id', Auth::user()->id)
						->where('users_projects.project_id', $id)->get();

        $data['package_id'] = \DB::table('package_orders')
                                 ->where('user_id', $data['user_id'])
                                 ->where('free_trial', 1)
                                 ->select('package_id')
                                 ->first();

        $data['all_project'] = \DB::table('projects')
                        ->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')
                        ->leftJoin('domains', 'domains.project_id', '=', 'projects.id')
                        ->leftJoin('package_orders', 'package_orders.user_id', '=', 'users_projects.user_id')
                        ->leftJoin('packages', 'packages.id', '=', 'package_orders.package_id')
                        ->select('projects.*', \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'),'domains.name as domain_name', 'packages.title as package_title')
						->orderBy('projects.id', 'desc')
						->where('users_projects.user_id', Auth::user()->id)->get();
        
						
		$data['domains'] = \DB::table('domains')->select('id','name')->where(['user_id' => Auth::user()->id, 'project_id' => 0])->get();
        

        $data['emailsdata'] = \DB::table('email_owners_users')->where('project_id', $id)->where('action_type', 'text')->first();

        $response = \DB::table('users_projects')->select('text_status')->where('project_id',$id)->where('user_id', Auth::user()->id)->first(); 
        $data['project_text_status'] = $response->text_status;
        
        $response = \DB::table('users_projects')->select('text_respose')->where('project_id',$id)->where('user_id', Auth::user()->id)->first(); 
        $data['project_text_respose_status'] = $response->text_respose;
        
        $response = \DB::table('users_projects')->select('linked_website_text')->where('project_id',$id)->where('user_id', Auth::user()->id)->first(); 
        $data['project_linked_website_text_status'] = $response->linked_website_text;
        
        $actions = \DB::table('projects')
                ->where('id', $id)->select('projects.*')->first();
        
        $forms = explode(",",$actions->forms);
        $formswith = $forms;
       
        foreach(@$forms as $key => $fm){
            $actions1 = \DB::table('automation_actions')
                ->select('is_active')->where('project_id', $id)->where('form_name',$fm)->first();
            if(!empty($actions1)){
                $formswith[$key] = array($fm,$actions1->is_active);
            }else{
                $formswith[$key] = array($fm);
            }
        }
        $data['all_forms_of_project'] = $formswith;
        $data['ProjectData'] = $actions;

                $data['contacts'] = Leads::select('leads.*', \DB::raw('(select name from `projects` WHERE projects.id = leads.project_id) AS project_name'))->where('leads.project_id',$id)->orderby('id', 'DESC')->paginate(10);
        $data['total'] = Leads::count();
        
        return view('admin.pandamails.listtext')->with($data);
    }
    public function send_test_text_user(Request $request) {
    $input = $request->all();
                        $pattern = "/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/";
    
                        $match = preg_match($pattern,$input['usernumber']);
    
                        if ($match != 1) {
                            echo 'Sorry! Phone number is not valid';
                            exit();
                        } 
                    
                        $sid = "AC4829f80105962964b0388824cc475291"; // Your Account SID from www.twilio.com/console
                        $token = "70c89e9b5a11d2a7417a65d8e048d830"; // Your Auth Token from www.twilio.com/console
                        $client = new Twilio\Rest\Client($sid, $token);
                        
                        if(!$client){
                            echo 'Sorry! Sms is not sent';
                            exit();
                        }
                        $result = \DB::table('sms_templates')->where("project_id",$input['project_id'])->orderby("id","desc")->first();
                        if(count((array)$result)>0){
                            $body_text = $result->content;
                        }else{
                            $body_text = 'Test message from Controlpanda.com';
                        }
                        $message = $client->messages->create(
                            $input['usernumber'], // Text this number
                            array(
                                'from' => '+441163265634',  //'+15005550006', // From a valid Twilio number
                                'body' => $body_text,
                            ));
                        if($message){
                            echo "SMS sent Successfully..!";
                        }else{
                            echo '0';
                        }
                        
                exit();
    
    }    
    public function new_owner_text_user(Request $request) {
        
    $input = $request->all();
     

        if (!empty($input['phones']) || !empty($input['owner_name'])) {

            $exist = \DB::table('email_owners_users')->where('project_id', $input['project_id'])->where('action_type', $input['action'])->first();
            $array = [];
            if (empty($exist)) {
                $array['project_id'] = $input['project_id'];
                $array['emails'] = '';
                $array['phones'] = $input['owner_name']."?".$input['phones'];
                $array['owner_name'] = $input['owner_name'];
                $array['form_name'] = '';
                $array['action_type'] = $input['action'];
                $array['created_at'] = date('Y-m-d H:i:s');
                $array['updated_at'] = date('Y-m-d H:i:s');

                \DB::table('email_owners_users')->insert($array);
               
                
                                                                '<tr>
                                                                    <td class="">
                                                                    <div class="h6">'. ($input['number'] + 1) .'</div></td>
                                                                    <td class="">'.$input['owner_name'].'</td>
                                                                    <td><span class="flex"><img class="img-fluid" src="'.asset('assets/images/icon-4.jpg').'">'.$input['phones'].'</span></td>
                                                                    
                                                                    <td class="text-center text-primary"><a href="javascript:void(0)" data-usernumber="'.$input['phones'].'" data-username="'.$input['owner_name'].'" data-project_id="'.$input['project_id'].'" class="sendtesttextuser"> Send Test SMS > </a></td>
                                                                </tr>';
            } else {
                if ($input['action'] == 'text'){
                    $exist = \DB::table('email_owners_users')->select('phones')->where('project_id', $input['project_id'])->where('action_type', $input['action'])->first();
//                    echo '<pre>';
//                    print_r($exist->emails);
//                    die();
                    if(@$exist->phones == ''){
                    $array['phones'] = implode(',', array_filter(json_decode(json_encode($exist),true))).$input['owner_name'].'?'.$input['phones'];
                    }else{
                    $array['phones'] = implode(',', array_filter(json_decode(json_encode($exist),true))).','.$input['owner_name'].'?'.$input['phones'];
                    }
                    
                }    
                else{
                    $exist = \DB::table('email_owners_users')->select('phones')->where('project_id', $input['project_id'])->where('action_type', $input['action'])->first();
                    if(@$exist->phones == ''){
                    $array['phones'] = implode(',', array_filter(json_decode(json_encode($exist),true))).','.$input['owner_name'].'?'.$input['text'];
                    }else{
                    $array['phones'] = implode(',', array_filter(json_decode(json_encode($exist),true))).','.$input['owner_name'].'?'.$input['text'];
                    }  
                }

                $array['updated_at'] = date('Y-m-d H:i:s');
                \DB::table('email_owners_users')->where('project_id', $input['project_id'])->where('action_type', $input['action'])->update($array);
                
                                                        '<tr>
                                                                    <td class="">
                                                                    <div class="h6">'. ($input['number'] + 1) .'</div></td>
                                                                    <td class="">'.$input['owner_name'].'</td>
                                                                    <td><span class="flex"><img class="img-fluid" src="'.asset('assets/images/icon-4.jpg').'">'.$input['phones'].'</span></td>
                                                                    
                                                                    <td class="text-center text-primary"><a href="javascript:void(0)" data-usernumber="'.$input['phones'].'" data-username="'.$input['owner_name'].'" data-project_id="'.$input['project_id'].'" class="sendtesttextuser"> Send Test SMS > </a></td>
                                                                </tr>';
                
            }
            Alert::success('Success Message', 'SMS Number Successfully Updated')->autoclose(3000);
            return redirect($input['return_url']);

        } else
            Alert::error('Error Message', 'User adding failure!')->autoclose(3000);
            //return redirect($input['return_url']);

    }
    public function change_panda_forms_text_status(Request $request) {
        $input = $request->all();
    
         if (DB::table('automation_actions')->select('automation_actions.*')->where('project_id',$input['id'])->where('form_name', $input['form_name'])->exists()) {
             
        $response = \DB::table('automation_actions')->select('automation_actions.*')->where('project_id',$input['id'])->where('form_name', $input['form_name'])->first(); 

        if($response->is_active == 0){
        $res = DB::table('automation_actions')->where('project_id' , $input['id'])->where('form_name' , $input['form_name'])->update(['is_active' => 1]);
        echo '1';
        exit();
        }else{
        $res = DB::table('automation_actions')->where('project_id' , $input['id'])->where('form_name' , $input['form_name'])->update(['is_active' => 0]);
        echo '0';
        exit();
        }
        
        }else{ 
        $insert_data['updated_at'] = date('Y-m-d H:i:s');
        $insert_data['created_at'] = date('Y-m-d H:i:s');
        $insert_data['project_id'] = $input['id'];
        $insert_data['is_active'] = 1;
        $insert_data['form_name'] = $input['form_name'];
        \DB::table('automation_actions')->insert($insert_data);
        echo '0';
        exit();
        }
        
        $response = \DB::table('automation_actions')->select('automation_actions.*')->where('project_id',$input['project_id'])->where('id', $input['id'])->first(); 
        if($response->is_active == 0){
        $res = DB::table('automation_actions')->where('project_id' , $input['project_id'])->where('id' , $input['id'])->update(['is_active' => 1]);
        echo '1';
        exit();
        }else{
        $res = DB::table('automation_actions')->where('project_id' , $input['project_id'])->where('id' , $input['id'])->update(['is_active' => 1]);
        echo '0';
        exit();
        }
       
       
    }
    public function change_panda_site_text_status(Request $request) {
        $input = $request->all();
       
       if($input['types'] == 'statusbtn'){
           
        $response = \DB::table('users_projects')->select('text_status')->where('project_id',$input['project_id'])->where('user_id', $input['user_id'])->first(); 
        if($response->text_status == 0){
        $res = DB::table('users_projects')->where('project_id' , $input['project_id'])->where('user_id' , $input['user_id'])->update(['text_status' => 1]);
        echo '1';
        exit();
        }else{
        $res = DB::table('users_projects')->where('project_id' , $input['project_id'])->where('user_id' , $input['user_id'])->update(['text_status' => 0]);
        echo '0';
        exit();
        }
       
       }else if($input['types'] == 'textbtn'){
           
        $response = \DB::table('users_projects')->select('text_respose')->where('project_id',$input['project_id'])->where('user_id', $input['user_id'])->first(); 
        if($response->text_respose == 0){
        $res = DB::table('users_projects')->where('project_id' , $input['project_id'])->where('user_id' , $input['user_id'])->update(['text_respose' => 1]);
        echo '1';
        exit();
        }else{
        $res = DB::table('users_projects')->where('project_id' , $input['project_id'])->where('user_id' , $input['user_id'])->update(['text_respose' => 0]);
        echo '0';
        exit();
        }
       
       }else if($input['types'] == 'websitebtn'){
           
        $response = \DB::table('users_projects')->select('linked_website_text')->where('project_id',$input['project_id'])->where('user_id', $input['user_id'])->first(); 
        if($response->linked_website_text == 0){
        $res = DB::table('users_projects')->where('project_id' , $input['project_id'])->where('user_id' , $input['user_id'])->update(['linked_website_text' => 1]);
        echo '1';
        exit();
        }else{
        $res = DB::table('users_projects')->where('project_id' , $input['project_id'])->where('user_id' , $input['user_id'])->update(['linked_website_text' => 0]);
        echo '0';
        exit();
        }
       
       }
    }
    

    public function email_list_edit($id) {
        not_permissions_redirect(have_premission(array(19)));
        $data['email_list'] = \DB::table('email_lists')->where('id', $id)->first();
        
        return view('admin.pandamails.list_edit')->with($data);
    }

    public function email_list_edit_submit(Request $request) {
        not_permissions_redirect(have_premission(array(19)));
        $input = $request->all();
        $id = $input['id'];
        $insert_data['title'] = $input['name'];
        $filter = array();
        if (isset($input['search_key'])) {
            foreach ($input['search_key'] as $key => $sk) {
                $filter[$key] = array('key' => $sk, 'value' => $input['search_value'][$key], 'operator' => $input['comparison_op'][$key]);
            }
        }
        $insert_data['filter'] = json_encode($filter);
        \DB::table('email_lists')->where('id', $id)->update($insert_data);
        Alert::success('Success Message', 'Email list updated successfully!')->autoclose(3000);
        return redirect('admin/contacts');
    }

    public function create_email_list(Request $request) {
        not_permissions_redirect(have_premission(array(18)));
        $input = $request->all();
        $insert_data['title'] = $input['name'];
        $filter = array();
        if (isset($input['search_key'])) {
            foreach ($input['search_key'] as $key => $sk) {
                $filter[$key] = array('key' => $sk, 'value' => $input['search_value'][$key], 'operator' => $input['comparison_op'][$key]);
            }
        }
        $insert_data['filter'] = json_encode($filter);
        $insert_data['created_at'] = date('Y-m-d H:i:s');
        \DB::table('email_lists')->insert($insert_data);
        Alert::success('Success Message', 'Email list added successfully!')->autoclose(3000);
        return redirect('admin/contacts');
    }

    public function emailbroadcast(Request $request) {
        not_permissions_redirect(have_premission(array(21)));

        $where = ' l.id > 0 ';
        if (isset($request['date_period']) && $request['date_period'] != '') {
            $date_range = explode(' - ', $request['date_period']);
            $start_date = date("Y-m-d", strtotime($date_range[0])) . ' 00:00:00';
            $end_date = date("Y-m-d", strtotime($date_range[1])) . ' 23:59:59';
            $where .= ' AND l.created_at >= "' . $start_date . '" AND l.created_at <= "' . $end_date . '" ';
        }

        if (isset($request['keyword']) && $request['keyword'] != '') {

            $where .= ' AND( LOWER(l.email) LIKE "%' . strtolower($request['keyword']) . '%" ';
            $where .= ' OR LOWER(l.subject_line) LIKE "%' . strtolower($request['keyword']) . '%" )';
        }


        $data['email_list'] = \DB::table('email_lists')->select('id', 'title')->get();
        $data['templates'] = \DB::table('email_templates')->select('id','content','subject', 'is_active')->where('is_active', 1)->get();
        $data['contacts_result'] = \DB::table('site_settings')->select('option_value')->where('option_name', "Contact Number")->get();
        $data['broadcast'] = \DB::table('broadcast_followup')->select('id','email_process_name', 'text_name')->where('flag', 1)->get();
        $data['contacts'] = (explode(",",$data['contacts_result'][0]->option_value));

        
        $data['emails'] = \DB::table('broadcast_email_lists as l')
                ->leftJoin('email_templates as t', 't.id', '=', 'l.template_html_message')
                ->whereRaw($where)
                ->select('l.*', 't.subject', 't.title')
                ->paginate(10);
        return view('admin.pandamails.emailbroadcast')->with($data);
    }

    public function emailsequences() {
        not_permissions_redirect(have_premission(array(22)));
        $data['funnels'] = Funnels::paginate(10);
        return view('admin.pandamails.emailsequences')->with($data);
    }

    public function email_sequence_steps($id) {
        $data['steps'] = FunnelSteps::where('funnel_id', $id)->paginate(10);
        $data['emaillist'] = EmailLists::where('status', 1)->get();
        $data['emailTemplates'] = EmailTemplates::where('is_active', 1)->where('template_type', 1)->get();
        $data['smsTemplates'] = EmailTemplates::where('is_active', 1)->where('template_type', 2)->get();
        $data['funnel'] = Funnels::find($id);
        $data['funnel_id'] = $id;

        return view('admin.pandamails.emailsequencesteps')->with($data);
    }

    public function new_email_sequence() {

        $data['emaillist'] = EmailLists::where('status', 1)->get();

        return view('admin.pandamails.emailsequence_create')->with($data);
    }

    public function update_email_sequence(Request $request) {

        $list = Funnels::find($request->funnel_id);
        $list->title = $request->name;
        $list->email_list_id = $request->list_id;
        $list->save();

        Alert::success('Success Message', 'Email Sequence Step update successfully!')->autoclose(3000);
        return redirect('admin/email-sequence-steps/' . $request->funnel_id);
    }

    public function delete_email_sequence($id) {

        Funnels::find($id)->delete();
        FunnelSteps::where('funnel_id', $id)->delete();
        Alert::success('Success Message', 'Email Sequence delete successfully!')->autoclose(3000);
        return redirect('admin/email-sequences');
    }

    public function delete_email_sequence_step($id, $funnel_id, Request $request) {

        FunnelSteps::find($id)->delete();
        Alert::success('Success Message', 'Email Sequence Step delete successfully!')->autoclose(3000);
        return redirect('admin/email-sequence-steps/' . $funnel_id);
    }

    public function new_emailbroadcast() {

        $data['emaillist'] = EmailLists::where('status', 1)->get();
        $data['emailTemplates'] = EmailTemplates::where('is_active', 1)->select('id', 'title')->get();

        return view('admin.pandamails.emailbroadcast_create')->with($data);
    }

    public function save_email_sequence(Request $request) {


        $list = new Funnels();
        $list->email_list_id = $request->list_id;
        $list->title = $request->title;
        $list->is_active = 0;
        $list->save();


        Alert::success('Success Message', 'New Email Sequence created successfully!')->autoclose(4000);
        return redirect('admin/email-sequences');
    }

    public function save_email_sequence_step(Request $request) {


        $list = new FunnelSteps();
        $list->funnel_id = $request->funnel_id;
        $list->step_name = $request->name;
        $list->duration = $request->duration;
        $list->action = $request->action;

        if ($request->trigger == 'email') {
            $list->template_html_message = $request->email_template_id;
            $list->is_email = 1;
        } else {
            $list->is_message = 1;
            $list->template_html_message = $request->sms_template_id;
        }


        $list->is_active = 0;
        $list->save();


        Alert::success('Success Message', 'New Email Sequence Step created successfully!')->autoclose(4000);
        return redirect('admin/email-sequence-steps/' . $request->funnel_id);
    }

    public function update_email_sequence_step(Request $request) {


        $list = FunnelSteps::find($request->funnel_step_id);

        $list->step_name = $request->name;
        $list->duration = $request->duration;
        $list->action = $request->action;

        if ($request->trigger == 'email') {
            $list->is_email = 1;
            $list->is_message = 0;
            $list->template_html_message = $request->email_template_id;
        } else {
            $list->is_email = 0;
            $list->is_message = 1;
            $list->template_html_message = $request->sms_template_id;
        }

        $list->is_active = $request->is_active;
        $list->save();


        Alert::success('Success Message', 'Email Sequence Step update successfully!')->autoclose(3000);
        return redirect('admin/email-sequence-steps/' . $request->funnel_id);
    }

    public function send_emailbroadcast(Request $request) {
        not_permissions_redirect(have_premission(array(21)));

        $leadIds = \DB::table('leads_email_lists')->whereIn('email_list_id', $request->list_ids)->select('lead_id')->get();

        $leadIdsArray = [];

        foreach ($leadIds as $ids) {
            $leadIdsArray[] = $ids->lead_id;
        }

        $emails = \DB::table('leads')->whereIn('id', $leadIdsArray)->select('email')->get();
        
        $send_datetime = date('Y-m-d H:i:s');

        if (isset($request->send_later))
            $send_datetime = date('Y-m-d H:i:s', strtotime($request->datetime));

        $code = DbModel::unqiue_code(6);

        if (!empty($emails)) {
            foreach ($emails as $email) {
                $list = new BroadcastEmailList();
                $list->template_html_message = $request->template_id;
                $list->email = $email->email;
                $list->subject_line = $request->subject;
                $list->code = $code;
                $list->sending_datetime = $send_datetime;
                $list->is_send = 0;
                $list->save();
            }
        }

        Alert::success('Success Message', 'Email will be send as background process!')->autoclose(6000);
        return redirect('admin/email-broadcast');
    }

    public function send_emailbroadcast_by_cron() {

        $flag = 0;
        $user = Auth::user();

        $emaillist = \DB::table('broadcast_email_lists as l')->where('l.is_send', 0)->where('l.flag_bit', 1)->select('l.*')->get();

        if (!empty($emaillist)) {
            $listIds = [];

            $smtp = \DB::table("smtp_settings")->where("user_id", $user->id)->select('from_name', 'from_email')->first();
            foreach ($emaillist as $email) {
                $to = $email->receiver;
                $returnpath = "";
                $cc = "";
                $subject = $email->subject_line;
                $link = url('/');
                $to_replace = ['[EMAIL]', '[LINK]'];
                $with_replace = [$email->receiver, $link];
                $html_body = '';
                $html_body .= str_replace($to_replace, $with_replace, $email->template_html_message);

                $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
                $dd = DbModel::SendHTMLMail($to, $subject, $mailContents, $smtp->from_email, $smtp->from_name, $returnpath, $cc);
                $listIds[] = $email->id;
            }
            $response = BroadcastEmailList::whereIn('id', $listIds)->update(['is_send' => 1]);
            if($response && $flag == 0){
                $flag = 1;
                echo"Email sent Successfully..!";
            }

            $startTime = date('Y-m-d H:i:s');
            $cenvertedTime = date('Y-m-d H:i:s',strtotime('-'. 3 .'day',strtotime($startTime)));

            $data['temp_template'] = \DB::table('temp_templates as tt')
            ->select('tt.*')
            ->get();
            foreach($data['temp_template'] as $dt){
                if($dt->updated_at < $cenvertedTime){
                    \DB::table('temp_templates')->delete();
                }

            }
            
        }
    }

    public function send_textbroadcast_by_cron() {
        $flag = 0;
        $where = 'sms_api';
        $emaillist = \DB::table('broadcast_email_lists as l')->where('l.is_send', 0)->where('l.flag_bit', 2)->select('l.*')->get();

        $sms_api = \DB::table('site_settings as ss')->select('ss.option_name', 'ss.option_value')->where('ss.option_name', $where)->first();

        if (!empty($emaillist)) {
            foreach($emaillist as $el){
                if($sms_api->option_value == 1){
                    try{
                        $pattern = "/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/";
    
                        $match = preg_match($pattern,$el->receiver);
    
                        if ($match != false) {
                            Alert::error('Error Message', 'Enter a valid number')->autoclose(3000);
                            return redirect()->back();
                        } 
                    
                        $sid = "AC2b6c19fce13d3527ae048c7a2d1272f6"; // Your Account SID from www.twilio.com/console
                        $token = "d7fcd4fdc5d1b5a2cd603e719839aeef"; // Your Auth Token from www.twilio.com/console
    
                        $url = url('/').'/call_status/'.$sid;
                        
                        $client = new Twilio\Rest\Client($sid, $token);
                        
                        $message = $client->messages->create(
                            $el->receiver, // Text this number
                            array(
                                'from' => '+441344567267', // From a valid Twilio number
                                'body' => $el->template_html_message,
                            ));
                        }catch (\Exception $ex) {
                            $el->is_send = -1;
                        }   
                }else{
                    // Account details
                    $apiKey = urlencode('Ve7erq1fssg-aBtqzJRpTsGsK0SpJhKtaiOSg7Z9Lc');
                    
                    // Message details
                    $numbers = array($el->receiver);
                    $sender = urlencode('controlpnada');
                    $message = rawurlencode($el->template_html_message);
                
                    $numbers = implode(',', $numbers);
                
                    // Prepare data for POST request
                    $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
                
                    // Send the POST request with cURL
                    $ch = curl_init('https://api.txtlocal.com/send/');
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    
                    // Process your response here
                    //echo $response;
                    $json = json_decode($response, true);

                    if($json['status'] != 'success'){
                        $el->is_send = -1;
                    }

                }
                $listIds[] = $el->id;
                $response = BroadcastEmailList::whereIn('id', $listIds)->update(['is_send' => 1]);
                if($response && $flag == 0){
                    $flag = 1;
                    echo"Sms sent Successfully..!";
                }
            }
        }
        
    }

    public function send_funnel_emails_by_cron() {

        $emaillist = \DB::table('funnel_email_lists as l')
                ->where('l.is_send', 0)
                ->where('l.sending_datetime', '<=', date('Y-m-d H:i:s'))
                ->leftJoin('email_templates as t', 't.id', '=', 'l.template_html_message')
                ->select('l.email', 't.content', 't.subject', 'l.id as list_id', 'l.type')
                ->get();

        if (!empty($emaillist)) {
            $listIds = [];

             $smtp = \DB::table("smtp_settings")->where("user_id", $user->id)->select('from_name', 'from_email')->first();

            foreach ($emaillist as $email) {
                $to = $email->email;
                $returnpath = "";
                $cc = "";
                $subject = $email->subject;
                $link = url('/');
                $to_replace = ['[EMAIL]', '[LINK]'];
                $with_replace = [$email->email, $link];
                $html_body = '';
                $html_body .= str_replace($to_replace, $with_replace, $email->content);

                if ($email->type == 'email') {
                    $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
                     $dd = DbModel::SendHTMLMail($to, $subject, $mailContents, $smtp->from_email, $smtp->from_name, $returnpath, $cc);
                } else {
                    $mailContents = $html_body;
                }

                $listIds[] = $email->list_id;
            }
            FunnelEmailLists::whereIn('id', $listIds)->update(['is_send' => 1]);
        }
    }

    public function automation_actions_by_cron() {

        $emaillist = \DB::table('automation_action_lists')
                ->where('is_send', 0)
                ->where('sending_datetime', '<=', date('Y-m-d H:i:s'))
                ->select('*')
                ->get();

        if (!empty($emaillist)) {
            $listIds = [];

			$from_name  = settingValue('from_name');
			$from_email = settingValue('from_email');
			
			$email_template = \DB::table("email_templates")->where("email_type", "signup")->where("template_type", 1)->first();
			$sms_template   = \DB::table("email_templates")->where("email_type", "signup")->where("template_type", 2)->first();
            
			foreach ($emaillist as $item) {
                
				if($item->action_type == 'email')
				{
					$records = explode(",",$item->emails);
					
					foreach ($records as $email) 
					{
						$subject = $email_template->subject;
						$returnpath = "";
						$cc = "";
						$link = url('/');
						$to_replace = ['[EMAIL]', '[LINK]'];
						$with_replace = [$email, $link];
						$html_body = '';
						$html_body .= str_replace($to_replace, $with_replace, $email_template->content);
		
						$to = $email;
						$mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
						 $dd = DbModel::SendHTMLMail($to, $subject, $mailContents, $from_email, $from_name, $returnpath, $cc);
		
						$listIds[] = $item->id;
					}
					
				}
				elseif($item->action_type == 'text')
				{
					$records = explode(",",$item->phones);
					
					foreach ($records as $rec) 
					{
							$to = $email->phone;
							$mailContents = $html_body;
							// integrate sms here
							
							$listIds[] = $item->id;
					}
				}
            }
            \DB::table('automation_action_lists')->whereIn('id', $listIds)->update(['is_send' => 1]);
        }
    }

    public function save_automation_email(Request $request) {

        $list = new AutomationActions();
        $list->project_id = $request->project_id;
        $list->template_html_message = ($request->action_type == 'email') ? $request->email_template_id : $request->sms_template_id;
        $list->from_name = $request->from_name;
        $list->subject = $request->subject;
        $list->duration = $request->duration;
        $list->action = $request->action;
        $list->action_type = $request->action_type;
        $list->is_active = 1;
        $list->save();

        Alert::success('Success Message', 'New Automation action created successfully!')->autoclose(3000);
        return redirect()->back();
    }

    public function update_automation_email(Request $request) {

        $list = AutomationActions::find($request->action_id);
        $list->project_id = $request->project_id;
        $list->template_html_message = ($request->action_type == 'email') ? $request->email_template_id : 	$request->sms_template_id;
        $list->from_name = $request->from_name;
        $list->subject = $request->subject;
        $list->duration = $request->duration;
        $list->action = $request->action;
        $list->action_type = $request->action_type;
        $list->is_active = 1;
        $list->save();

        Alert::success('Success Message', 'Automation action update successfully!')->autoclose(3000);
        return redirect()->back();
    }

    public function delete_automation($id, Request $request) {

        AutomationActions::find($id)->delete();
        Alert::success('Success Message', 'Automation action delete successfully!')->autoclose(3000);
        return redirect()->back();
    }

    public function create() {
        not_permissions_redirect(have_premission(array(142,143)));
        $data['action'] = "Add";
        return view('admin.emailtemplates.edit')->with($data);
    }

 
    
    public function store(Request $request) {
          $input = $request->all();
          //echo '<pre>'; print_r($input); die();
        if ($input['action'] == 'Edit') {
            not_permissions_redirect(have_premission(array(142,143)));
            $template = SmsTemplates::findOrFail($input['id']);
            $template->update($input);
            Alert::success('Success Message', 'SMS Template updated successfully!')->autoclose(3000);
        } else {
            not_permissions_redirect(have_premission(array(142,143)));
            $user = \Auth::user();
            if ($user->parent_id == 0) {
                $input['user_id'] = $user->id;
            } else {
                $input['user_id'] = $user->parent_id;
            }
            $template = SmsTemplates::create($input);
            Alert::success('Success Message', 'SMS Template added successfully!')->autoclose(3000);
        }
         return redirect('admin/contacts/text/'.@Session::get('session_last_project')[0]->id.'/lists');

    }

    public function show($id) {
        
    }

    public function edit($id) {
        not_permissions_redirect(have_premission(array(142,143)));
        $data['action'] = "Edit";
        $data['template'] = SmsTemplates::findOrFail($id);
        return view('admin.emailtemplates.edit')->with($data);
    }

    public function update(Request $request, $id) {
        
    }

    public function destroy($id) {
        
    }

}
