<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Contact;
use App\Leads;
use App\EmailLists;
use App\EmailTemplates;
use App\BroadcastEmailList;
use App\DbModel;
use App\Funnels;
use App\FunnelSteps;
use App\FunnelEmailLists;
use App\AutomationActions;
use Alert;
use View;
use DB;

class BroadcastController extends Controller {

    public function index() {
        
       echo"Index function is empty right now by Farhan";
       exit();
    }
    public function broadcast_followup(Request $request) {

        $email_sequence = $request->input('email_sequence');
        $text_sequence = $request->input('text_sequence');
        $call_sequence = $request->input('call_sequence');
        $email_list_id = $request->input('email_array');

        $rand_id = $request->input('rand_id');

        $name_email = $request->input('e_p_name');
        $name_email_pc = $request->input('e_p_name_pc');
        $number_of_emails = $request->input('e_p_email_count');
        $name_text = $request->input('t_p_name');
        $number_of_texts = $request->input('t_p_text_count');
        $phone_number = $request->input('t_p_number');

        $call_process_name = $request->input('c_p_name');
        $dail_status = $request->input('dail_status');
        $call_device = $request->input('device');
        $call_phone_number = $request->input('call_number');
        $call_team_members = $request->input('call_count');


        $insertion = array(
            'email_list_id' => $email_list_id, 
            'email_process_name' => '', 
            'email_name' => '',
            'number_of_email' => '',
            'text_name' => '', 
            'phone_number' => '',
            'number_of_text' => '',
            'call_process_name' => '',
            'dail_status' => '',
            'call_device' => '',
            'call_phone_number' => '',
            'call_team_members' => '',
            'flag' => 0,
            'date' => date("Y-m-d H:i:s")

        );


        if($email_sequence != 0)
        {
            $data['email'] = \DB::table('broadcast_followup as bf')
            ->where('bf.id', $email_sequence)
            ->select('bf.email_process_name', 'bf.email_name', 'bf.number_of_email')
            ->first();

            $data['email_follow'] = \DB::table('email_followup as ef')->
            where('ef.broadcast_followup_id', $email_sequence)
            ->select('ef.email_template_html', 'ef.email_subject', 'ef.days_to_send_email', 'ef.process_status_email'
            )->get();

            $insertion['email_process_name'] = $data['email']->email_process_name;
            $insertion['email_name'] = $data['email']->email_name;
            $insertion['number_of_email'] = $data['email']->number_of_email;

        }else{
            $insertion['email_process_name'] = $name_email_pc;
            $insertion['email_name'] = $name_email;
            $insertion['number_of_email'] = $number_of_emails;
        }

        if($text_sequence != 0)
        {
            $data['text'] = \DB::table('broadcast_followup as bf')
            ->where('bf.id',$text_sequence)
            ->select('bf.text_name', 'bf.phone_number', 'bf.number_of_text')
            ->first();

            $data['text_follow'] = \DB::table('text_followup as tf')->
            where('tf.broadcast_followup_id', $text_sequence)
            ->select('tf.followup_message', 'tf.days_to_send_text', 'tf.process_status_text'
            )->get();

            $insertion['text_name'] = $data['text']->text_name;
            $insertion['phone_number'] = $data['text']->phone_number;
            $insertion['number_of_text'] = $data['text']->number_of_text;

        }else{
            $insertion['text_name'] = $name_text;
            $insertion['phone_number'] = $phone_number;
            $insertion['number_of_text'] = $number_of_texts;
        }

        if($call_sequence != 0)
        {
            $data['call'] = \DB::table('broadcast_followup as bf')
            ->where('bf.id',$call_sequence)
            ->select('bf.call_process_name', 'bf.dail_status', 'bf.call_device', 'bf.call_phone_number', 'bf.call_team_members')
            ->first();

            $data['call_follow'] = \DB::table('call_followup as cf')->
            where('cf.broadcast_followup_id', $call_sequence)
            ->select('cf.member_name', 'cf.member_email', 'cf.personal_phone'
            )->get();

            $insertion['call_process_name'] = $data['call']->call_process_name;
            $insertion['dail_status'] = $data['call']->dail_status;
            $insertion['call_device'] = $data['call']->call_device;
            $insertion['call_phone_number'] = $data['call']->call_phone_number;
            $insertion['call_team_members'] = $data['call']->call_team_members;

        }else{
            $insertion['call_process_name'] = $call_process_name;
            $insertion['dail_status'] = $dail_status;
            $insertion['call_device'] = $call_device;
            $insertion['call_phone_number'] = $call_phone_number;
            $insertion['call_team_members'] = $call_team_members;
        }

        $id = DB::table('broadcast_followup')->insertGetId($insertion);

        $last_row = DB::table('broadcast_followup')->orderBy('id', 'desc')->first();


        $email_insertion = array(
            'broadcast_followup_id' => $id,
            'email_template_html' => '',
            'email_subject' => '',
            'days_to_send_email' => '',
            'process_status_email' => 1,
        );

        $text_insertion = array(
            'broadcast_followup_id' => $id,
            'followup_message' => '',
            'days_to_send_text' => '',
            'process_status_text' => '',
        );
        
        $call_insertion = array(
            'broadcast_followup_id' => $id,
            'member_name' => '',
            'member_email' => '',
            'personal_phone' => '',
        );

        
        if(isset($data['text_follow'])){
            foreach($data['email_follow'] as $follow_email){
                $email_insertion['email_template_html'] = $follow_email->email_template_html;        $email_insertion['email_subject'] = $follow_email->email_subject;
                $email_insertion['days_to_send_email'] = $follow_email->days_to_send_email;
                $email_insertion['process_status_email'] = 1;
            }
        }else{
            for($i = 1; $i<=$last_row->number_of_email; $i++){
                $email_insertion['email_template_html'] = $request->input('template_id_by_name');
                $email_insertion['email_subject'] = $request->input('email_subject'.$i);
                $email_insertion['days_to_send_email'] = $request->input('days_after'.$i);
                $email_insertion['process_status_email'] = 1;
            }
        }
        $email_followup_id = DB::table('email_followup')->insertGetId($email_insertion);
            
        if(isset($data['text_follow'])){
            foreach($data['text_follow'] as $follow_text){
                $text_insertion['followup_message'] = $follow_text->followup_message;
                $text_insertion['days_to_send_text'] = $follow_text->days_to_send_text;
                $text_insertion['process_status_text'] = 1;
            }
        }else{
            for($i = 1; $i<=$last_row->number_of_text; $i++){
                $text_insertion['followup_message'] = $request->input('text_message'.$i);
                $text_insertion['days_to_send_text'] = $request->input('days_text_after'.$i);
                $text_insertion['process_status_text'] = 1;
            }
        }

        $text_followup_id = DB::table('text_followup')->insertGetId($text_insertion);

        if(isset($data['call_follow'])){
            foreach($data['call_follow'] as $follow_call){
                $call_insertion['member_name'] = $follow_call->member_name;
                $call_insertion['member_email'] = $follow_call->member_email;
                $call_insertion['personal_phone'] = $follow_call->personal_phone;
            }
        }else{
            for($i = 1; $i<=$last_row->call_team_members; $i++){
                $call_insertion['member_name'] = $request->input('member_name'.$i);
                $call_insertion['member_email'] = $request->input('member_email'.$i);
                $call_insertion['personal_phone'] = $request->input('member_phone'.$i);
            }
        }

        $call_followup_id = DB::table('call_followup')->insertGetId($call_insertion);

        $this->setBroadcastEmailList($email_list_id, $id, $rand_id);
        Alert::success('Success Message', 'Data insert successfully!')->autoclose(3000);
        return view('admin.dashboard');
    }



    public function setBroadcastEmailList($emailListId, $lastrow, $rand_id){

        $data = array();
        $where = '';
        foreach(explode(',',$emailListId) as $el){
            if($where == ''){
                $where .= ' el.email_list_id = "'.$el.'" ';
            }else{
                $where .= ' OR el.email_list_id = "'.$el.'" ';
            }
        }

        $data['lead_email_list'] = \DB::table('leads_email_lists as el')
        ->join('leads as l', 'l.id', '=', 'el.lead_id')
        ->select('el.lead_id', 'el.email_list_id', 'l.email', 'l.phone')
        ->whereRaw($where)->get();

        if(!empty($rand_id)){
            $content = \DB::table('temp_templates as tt')->
            where('tt.rand_id',$rand_id)
            ->select('tt.html_content')
            ->first();
        }
       

        if(isset($data['lead_email_list']) && !empty($data['lead_email_list'])){

            $data['broadcast_for_email'] = \DB::table('broadcast_followup as bf')
            ->join('email_followup as ef', 'ef.broadcast_followup_id', '=', 'bf.id')
            ->join('email_templates as et', 'et.id', '=', 'ef.email_template_html')
            ->where('bf.id',$lastrow)
            ->where('ef.process_status_email',1)
            ->select('bf.email_process_name', 'bf.email_name', 'bf.text_name', 'bf.phone_number',
            'ef.email_template_html', 'ef.email_subject', 'ef.days_to_send_email',
            'et.content'
            )->get();

            $data['broadcast_for_text'] = \DB::table('broadcast_followup as bf')
                ->join('text_followup as tf', 'tf.broadcast_followup_id', '=', 'bf.id')
                ->where('bf.id',$lastrow)
                ->where('tf.process_status_text',1)
                ->select('bf.email_process_name', 'bf.email_name', 'bf.text_name', 'bf.phone_number',
                'tf.followup_message', 'tf.days_to_send_text'
                )->get();

                if(isset($data['broadcast_for_email']) && isset( $data['broadcast_for_text']))
                {
                    foreach($data['lead_email_list'] as $lel){
                        foreach($data['broadcast_for_email'] as $bfe){
                            $startTime = date('Y-m-d H:i:s');
                            $cenvertedTime = date('Y-m-d H:i:s',strtotime('+'. $bfe->days_to_send_email .'day',strtotime($startTime)));
                            if(isset($content) && !empty($content)){
                                $insertion_email = array(
                                    'template_html_message'=>$content->html_content,
                                    'receiver'=>$lel->email,
                                    'sender'=>$bfe->email_name,
                                    'subject_line'=>$bfe->email_subject,
                                    'is_send'=>0,
                                    'flag_bit'=>1,
                                    'sending_datetime'=>$cenvertedTime,
                                    'created_at'=>date('Y-m-d H:i:s'),
                                    'updated_at'=>date('Y-m-d H:i:s')
                                );
                            }else{
                                $insertion_email = array(
                                    'template_html_message'=>$bfe->content,
                                    'receiver'=>$lel->email,
                                    'sender'=>$bfe->email_name,
                                    'subject_line'=>$bfe->email_subject,
                                    'is_send'=>0,
                                    'flag_bit'=>1,
                                    'sending_datetime'=>$cenvertedTime,
                                    'created_at'=>date('Y-m-d H:i:s'),
                                    'updated_at'=>date('Y-m-d H:i:s')
                                );
                            }
                            
                            $id = DB::table('broadcast_email_lists')->insertGetId($insertion_email);
                        }
    
                        foreach($data['broadcast_for_text'] as $bfe){
                            $startTime = date('Y-m-d H:i:s');
                            $cenvertedTime = date('Y-m-d H:i:s',strtotime('+'. $bfe->days_to_send_text .'day',strtotime($startTime)));
                            $insertion_email = array(
                                'template_html_message'=>$bfe->followup_message,
                                'receiver'=>$lel->phone,
                                'sender'=>$bfe->phone_number,
                                'is_send'=>0,
                                'flag_bit'=>2,
                                'sending_datetime'=>$cenvertedTime,
                                'created_at'=>date('Y-m-d H:i:s'),
                                'updated_at'=>date('Y-m-d H:i:s')
                            );
                            $id = DB::table('broadcast_email_lists')->insertGetId($insertion_email);
                        }

                        // foreach($data['broadcast_for_call'] as $bfe){
                        //     $startTime = date('Y-m-d H:i:s');
                        //     $cenvertedTime = date('Y-m-d H:i:s',strtotime('+'. $bfe->days_to_send_text .'day',strtotime($startTime)));
                        //     $insertion_email = array(
                        //         'template_html_message'=>$bfe->followup_message,
                        //         'receiver'=>$lel->phone,
                        //         'sender'=>$bfe->phone_number,
                        //         'is_send'=>0,
                        //         'flag_bit'=>2,
                        //         'sending_datetime'=>$cenvertedTime,
                        //         'created_at'=>date('Y-m-d H:i:s'),
                        //         'updated_at'=>date('Y-m-d H:i:s')
                        //     );
                        //     $id = DB::table('broadcast_email_lists')->insertGetId($insertion_email);
                        // }
                    }
                }
        }else{
            echo"No Leads Available";   exit();
        }
    }

    public function update_email_template(Request $request){
        
        $data = array(
            'temp_id'=>$request->input('id'),
            'html_content'=>$request->input('content'),
            'rand_id'=>$request->input('rand_id'),
            'updated_at'=>date('Y-m-d H:i:s')
        );

      //  echo'<pre>'.print_r($data, true).'<pre>'; exit();

        $id = DB::table('temp_templates')->insertGetId($data);
        if($id){
            Alert::success('Success Message', 'Data insert successfully!')->autoclose(3000);
            return redirect()->back();
        }else{
            Alert::error('Error Message', 'Something went wrong')->autoclose(3000);
            return redirect()->back();
        }
    }
}
