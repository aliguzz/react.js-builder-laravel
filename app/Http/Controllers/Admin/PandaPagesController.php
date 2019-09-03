<?php

namespace App\Http\Controllers\Admin;

use Alert;
use Analytics;
use App\Domains;
use App\Http\Controllers\Controller;
use App\Leads;
use App\Services\ProjectRepository;
use App\Services\TemplateLoader;
use App\Services\ThemesLoader;
use Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use Illuminate\Filesystem\Filesystem;
use App\Project;
use Storage;
use App\EmailTemplates;
use View;
use App\DbModel;
use Twilio;

class PandaPagesController extends Controller
{

    private $request;
    private $templateLoader;
    private $repository;
    private $project;

    public function __construct(Request $request, TemplateLoader $templateLoader, ThemesLoader $loader, ProjectRepository $repository, Filesystem $filesystem, Project $project)
    {
        $this->templateLoader = $templateLoader;
        $this->request = $request;
        $this->loader = $loader;
        $this->project = $project;
        $this->repository = $repository;
        $this->templatesPath = public_path('builder'.DIRECTORY_SEPARATOR.'templates/');
        $this->filesystem = $filesystem;
        $this->storage = Storage::disk('public');
    }

    public function index(Request $request)
    {
        not_permissions_redirect(have_premission(array(7)));

        $data['Projects'] = \DB::table('projects')
            ->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')
            ->select('projects.*', \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'))->orderBy('projects.id', 'desc')->where('users_projects.user_id', Auth::user()->id)
            ->where('users_projects.notlist', 0)
            ->paginate(200);
        $data['user_id'] = Auth::user()->id;
        return view('admin.pandapages.index')->with($data);
    }

    public function create()
    {
        not_permissions_redirect(have_premission(array(2)));
        if(checkUserProjects()){
            $user_id = Auth::User()->id;
            $package = \DB::table('users as u')
                ->leftJoin('package_orders as o', 'o.user_id', '=', 'u.id')
                ->leftJoin('packages as p', 'p.id', '=', 'o.package_id')
                ->select('p.*')
                ->where('p.is_active', 1)
                ->where('o.user_id', $user_id)
                ->first();
            $no_of_project = \DB::table('users_projects')
                ->where('user_id', $user_id)
                ->where('users_projects.notlist', 0)
                ->count('project_id');
            $data['categories'] = \DB::table('categories')->where('status', 1)->get();
            $data['industries'] = \DB::table('industries')->where('status', 1)->get();
            $data['template_categories'] = \DB::table('template_categories')->select('template_categories.*')->where('status', 1)->get();
            $templates = $this->templateLoader->loadAll();
            foreach($data['industries'] as $k=>$v){
                $sum = 0;
                foreach($templates as $key=>$temps){
                $ind_id = $v->id;
                    if (isset($temps['config']['industries']) && in_array($ind_id, $temps['config']['industries'])) {
                        $sum = $sum + 1;
                    }
                }
                $v->count = $sum;
            }
            return view('admin.pandapages.create')->with($data);
        }else{
            return redirect()->back();
        }
        
    }

    public function edit($id)
    {
        not_permissions_redirect(have_premission(array(3)));

        $user = Auth::user();
        $data['ProjectData'] = \DB::table('projects')->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')->select('projects.*', \DB::raw('(SELECT GROUP_CONCAT(domains.name) FROM domains WHERE domains.project_id = projects.id GROUP BY domains.project_id LIMIT 0,1) AS domain_names'), \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'))
            ->where('projects.id', $id)
            ->where('users_projects.user_id', Auth::user()->id)
            ->where('users_projects.notlist', 0)
            ->first();
        $data['domains'] = Domains::where('user_id', $user->id)->paginate(10);
        $data['user_id'] = $user->id;
        $data['users'] = \DB::table('users')->where('is_active', 1)->select('id', 'first_name', 'last_name')->get();
        $data['project_leads'] = \DB::table('leads')->where('project_id', $id)->count('id');
        $data['pages_email_lists'] = \DB::table('pages_email_lists')->select('pages_email_lists.*', \DB::raw('(SELECT title FROM email_lists WHERE id = pages_email_lists.email_list_id) AS list_title'))->where('project_id', $id)->get();
        $data['email_lists'] = \DB::table('pages_email_lists')->where('project_id', $data['ProjectData']->id)->count('id');
        $data['tracking_codes'] = \DB::table('pages_tracking_codes')->where('project_name', $data['ProjectData']->name)->get();
        $package = \DB::table('users as u')
            ->leftJoin('package_orders as o', 'o.user_id', '=', 'u.id')
            ->leftJoin('packages as p', 'p.id', '=', 'o.package_id')
            ->select('p.cp_page_builder')
            ->where('p.is_active', 1)
            ->where('o.user_id', $user->id)
            ->first();
        $no_of_leads = \DB::table('leads')
            ->where('user_id', $user->id)
            ->count('id');

        if (isset($package->cp_page_builder) && $package->cp_page_builder != 'unlimited' && $no_of_leads >= $package->cp_page_builder) {
            // Alert::warning('Warning Message', 'Your contacts limit reached. Please upgrade your account to create more contacts. ')->persistent('Close');
        }
       
        $data['contacts'] = Leads::select('leads.*', \DB::raw('leads.page AS page_name'), \DB::raw('(select name from `projects` WHERE projects.id = leads.project_id) AS project_name'))->where('project_id', $id)->orderby('id', 'DESC')->paginate(10);

        $pages = array();
        $data['domain_data'] = \DB::table('domains')->where('project_id', $id)->first();
        
        if ($data['domain_data']) {
            $hosting_check = ',ga:hostname' . urlencode('==' . $data['domain_data']->name);
            $page_path_check1 = 'ga:pagePath' . urlencode("==/sites/" . $data['ProjectData']->name);
        } else {
            $hosting_check = '';
            $page_path_check1 = 'ga:pagePath' . urlencode("==/sites/" . $data['ProjectData']->name);
        }
        $data['thankyou'] = 0;
        $data['index'] = 0;
       
        $directory = '../public/storage/projects/' . $user->id . '/' . $data['ProjectData']->uuid . '/desktop/';
        if (glob($directory . "*.html") != false) {

            foreach (glob($directory . "*.html") as $pg) {
                $p = explode("/", $pg);
                $p = end($p);
                $p = explode(".", $p);
                $page = $p[0];
                $pages[] = $page;
                
                if ($page == 'index') {
                    $page_path_check = $page_path_check1 . ',' . $page_path_check1 . '/index.html';
                    if ($hosting_check != '') {
                        $page_path_check .= ',ga:pagePath==/sites/';
                    }
                } else {
                    $page_path_check = $page_path_check1.'/' . $page . '.html';
                    if ($hosting_check != '') {
                        $page_path_check .= ',ga:pagePath==/' . $page . '.html';
                    }
                }
                $analyticsData = Analytics::performQuery(Period::months(1), 'ga:pageviews,ga:uniquePageviews', ['filters' => $page_path_check . $hosting_check,'dimensions'=>'ga:date']);
               
                if (isset($analyticsData['rows'][0])) {
                    $data['analytics'][$page] = $analyticsData['rows'];
                    if ($page == 'thankyou') {
                        $data['thankyou'] = $analyticsData['rows'];
                    }
                    if ($page == 'index') {
                        $data['index'] = $analyticsData['rows'];
                    }
                } else {
                    $data['analytics'][$page] = 0;
                }

            }
        }
        
        $data['pages'] = $pages;

        ///////////////////////////////// Automation ////////////////////////////////////

        $data['emailsdata'] = \DB::table('automation_action_lists')->where('project_id', $id)->where('action_type', 'email')->first();
        //echo '<pre>'; print_r($data['emailsdata']); die();
        $data['textdata'] = \DB::table('automation_action_lists')->where('project_id', $id)->where('action_type', 'text')->first();

        $actions = \DB::table('automation_actions')->where('project_id', $id)->select('form_name')->get();
        $a = [];
        foreach ($actions as $ac) {
            $a[] = $ac->form_name;
        }

        $data['actions'] = $a;

        ///////////////////////////////////////     settings ////////////////////////////////////

        $pages1 = array();
        $project_name = $data['ProjectData']->name;
    

        $directory = '../public/storage/projects/' . $user->id . '/' . $data['ProjectData']->uuid . '/desktop/';

        if (glob($directory . "*.html") != false) {
            
            foreach (glob($directory . "*.html") as $pg) {
                $p = explode("/", $pg);
                $p = end($p);
                $p = explode(".", $p);
                $page = $p[0];
                $pages1[] = array("name" => $page, "tc" => \DB::table('pages_tracking_codes')->select('footer_code', 'header_code')->where('project_name', $project_name)->where("page_name", $page)->first());
            }
        }

        $data['paged'] = $pages1;

        
        return view('admin.pandapages.connection')->with($data);
    }
    
        public function send_test_email_user(Request $request) {
    $input = $request->all();
        $flag = 0;
        $user = Auth::user();
            $smtp = \DB::table("smtp_settings")->where("user_id", 1)->select('from_name', 'from_email')->first();
            
            if (!empty($smtp)) {
                $to = $input['useremail'];
                $returnpath = "";
                $cc = "";
                $subject = 'Test email sent from your Control Panda dashboard';
                $html_body = 'Hi ControlPanda user, this is a test email sent from your Control Panda dashboard. <br>

You are now going to be notified when a site visitor submits an enquiry on your website: <br>
<br><br>'.$input['username'].' <br><br>
    If this is not the right website please click on the link below to change your settings: <br>
    '.$input['return_url'].' <br><br>
        Not the website owner? Contact the site owner now to edit the settings:<br><br>
        '.url('/support').'
';
                $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
                $dd = DbModel::SendHTMLMail($to, $subject, $mailContents, $smtp->from_email, $smtp->from_name, $returnpath, $cc);
                echo "Email sent Successfully..!";
                exit();
            }else{
                echo 'Sorry! email not sent';
                exit();
            }
    
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
                            echo '0';
                            exit();
                        }
                        $result = \DB::table('sms_templates')->where("project_id",$input['project_id'])->orderby("id","desc")->first();
                        if(count((array)$result)>0){
                            $body_text = $result->content;
                        }else{
                            $body_text = 'Test message from Controlpanda.com for your site '.$input['username'];
                        }
                        $message = $client->messages->create(
                            $input['usernumber'], // Text this number
                            array(
                                'from' => '+441163265634',  //'+15005550006', // From a valid Twilio number
                                'body' => $body_text,
                            ));
                        if($message){
                            echo '1';
                        }else{
                            echo '0';
                        }
                        
                exit();
    
    }  

    public function promote_seo($id)
    {
        not_permissions_redirect(have_premission(array(11)));
        $data['user_id'] = Auth::user()->id;
        $data['ProjectData'] = \DB::table('projects')->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')->select('projects.*', \DB::raw('(SELECT GROUP_CONCAT(domains.name) FROM domains WHERE domains.project_id = projects.id GROUP BY domains.project_id LIMIT 0,1) AS domain_names'), \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'))->where('projects.id', $id)->where('users_projects.notlist', 0)->where('users_projects.user_id', $data['user_id'])->first();

        $data['project_id'] = $id;
        $data['site_seo_settings'] = \DB::table('site_seo_settings')->select('site_seo_settings.*')->where('project_id', $id)->where('user_id', $data['user_id'])->first();

        $pages1 = array();
        $project_name = $data['ProjectData']->name;
        $directory = '../public/storage/projects/' . $data['user_id'] . '/' . $data['ProjectData']->uuid . '/desktop/';

        if (glob($directory . "*.html") != false) {
            foreach (glob($directory . "*.html") as $pg) {
                $p = explode("/", $pg);
                $p = end($p);
                $p = explode(".", $p);
                $page = $p[0];
                $pages1[] = array("name" => $page, "tc" => \DB::table('pages_seo_settings')->where('project_id', $id)->where("page_name", $page)->first());
            }
        }

        $data['paged'] = $pages1;
        //echo '<pre>';print_r($data['paged']); die();

        return view('admin.pandapages.promote_seo')->with($data);
    }
    public function promote_seo_submit(Request $request)
    {
        
        
        $input = $request->all();
        //echo '<pre>';print_r($input);die();
        $project_id = $input['project_id'];
        $user_id = $input['user_id'];
        $data['site_seo_settings'] = \DB::table('site_seo_settings')->select('site_seo_settings.*')->where('project_id', $project_id)->where('user_id', $user_id)->first();
        foreach($input['page_name'] as $key=>$val){
            $data['pages_seo_settings'] = \DB::table('pages_seo_settings')->select('pages_seo_settings.*')->where('project_id', $project_id)->where('page_name', $val)->first();
            
            if ($data['pages_seo_settings'] === null) {
            $pu_data = array(
                'project_id' => $project_id,
                'page_name' => $val,
                'title' => $input['title'][$key],
                'keywords' => $input['keywords'][$key],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'description' => $input['description'][$key]
            );
            \DB::table('pages_seo_settings')->insert($pu_data);
            
        } else {
            $update_array = array(
                'project_id' => $project_id,
                'page_name' => $val,
                'title' => $input['title'][$key],
                'keywords' => $input['keywords'][$key],
                'updated_at' => date('Y-m-d H:i:s'),
                'description' => $input['description'][$key]
            );
            \DB::table('pages_seo_settings')->where('project_id', $project_id)->where('page_name', $val)->update($update_array);
            
        }

        
        }
        

        if ($data['site_seo_settings'] === null) {
            $pu_data = array(
                'project_id' => $project_id,
                'site_name' => $input['site_name'],
                'address' => $input['address'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'user_id' => $user_id,
            );
            \DB::table('site_seo_settings')->insert($pu_data);
            Alert::success('Success Message', 'Your SEO settings added successfully!')->autoclose(3000);
        } else {
            $update_array = array(
                'site_name' => $input['site_name'],
                'address' => $input['address'],
                'updated_at' => date('Y-m-d H:i:s'),
            );
            \DB::table('site_seo_settings')->where('project_id', $project_id)->where('user_id', $user_id)->update($update_array);
            Alert::success('Success Message', 'Your SEO settings updated successfully!')->autoclose(3000);
        }

        return redirect('admin/panda-pages/' . $project_id . '/promote-seo');
    }

    public function panda_seo_satus(Request $request)
    {
        $input = $request->all();
        if ($input['seo_status'] == 'false') {
            $user = Auth::user();
            $data['ProjectData'] = \DB::table('projects')->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')->select('projects.*', \DB::raw('(SELECT GROUP_CONCAT(domains.name) FROM domains WHERE domains.project_id = projects.id GROUP BY domains.project_id LIMIT 0,1) AS domain_names'), \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'))->where('projects.id', $input['project_id'])->where('users_projects.user_id', $user->id)
            ->where('users_projects.notlist', 0)->first();
            $project_name = $data['ProjectData']->name;
            $data['domains'] = \App\Domains::where('user_id', \Auth::user()->id)->get();
            $directory = '../public/storage/projects/' . $user->id . '/' . $data['ProjectData']->uuid . '/';
            $myfile = unlink($directory . "robot.txt");
            echo '0';
        } else {
            $user = Auth::user();
            $data['ProjectData'] = \DB::table('projects')->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')->select('projects.*', \DB::raw('(SELECT GROUP_CONCAT(domains.name) FROM domains WHERE domains.project_id = projects.id GROUP BY domains.project_id LIMIT 0,1) AS domain_names'), \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'))->where('projects.id', $input['project_id'])->where('users_projects.user_id', $user->id)->where('users_projects.notlist', 0)->first();
            
            $project_name = $data['ProjectData']->name;
            $data['domains'] = \App\Domains::where('user_id', \Auth::user()->id)->get();
            $directory = '../public/storage/projects/' . $user->id . '/' . $data['ProjectData']->uuid . '/';
           
            $myfile = fopen($directory . "robot.txt", "w") or die("Unable to open file!");
            $txt = "User-agent: * \nAllow: /";
            fwrite($myfile, $txt);
            fclose($myfile);
            echo '1';
        }
        exit();
    }

    public function store(Request $request)
    {

    }

    public function destroy($id)
    {

    }

    public function get_industry_templates(Request $request)
    {
        $input = $request->all();
        $templates = $this->templateLoader->loadAll();
        $total = count($templates);
        $perPage = 1000;
        $page = $input['start'];
        $_SESSION['industry_id'] = $input['industry_id'];
        $templates = $templates->filter(function ($template) {
            if (isset($template['config']['industries']) && in_array($_SESSION['industry_id'], $template['config']['industries'])) {
                return 1;
            }
        });

        $paginator = new LengthAwarePaginator(
            $templates->slice($page, $perPage)->values(), count($templates), $perPage, $page
        );

        foreach($templates as $key => $temps){
            $indtemp = $this->templateLoader->load($temps['name']);
            $count = count($indtemp['pages']['desktop']);
            $counter[]   =   $count;
           
        }
        
        foreach ($paginator as $key=>$temp) {

            echo '<div class="col-lg-4 col-md-6 col-sm-12"><div class="home-img-as"><img src="' . asset($temp['thumbnail']) . '" alt="img-01" class="img-fluid"><div class="footer-img-home"><div class="img-mane">' . $temp['name'] . '</div><div class="page-number"><span>'.$counter[$key].'</span>pages</div></div><div class="overlay1"><a target="_blank" href="' . url('admin/view-template/' . $temp['name'].'/'.$input['industry_id']) . '"><div class="text"><span><img src="' . url('assets/images/vision-icon.png') . '" class="svg-tool"></span> <i>Preview</i></div></a></div><div class="overlay"><a href="' . url('admin/create-project/' . $temp['name'] . '/' . $input['industry_id']) . '"><div class="text"><span><img src="' . url('assets/images/setting.svg') . '" class="svg-tool"></span> <i>Edit Site</i></div></a></div></div></div>';
        }
        if ($total > count($paginator) + $input['start']) {
            $new_start = $input['start'] + 10;
             '<div class="clear30 should_remove"></div><div class="col-md-12 should_remove text-center"><a data-start="' . $new_start . '" class="load_more_temp btn btn-info" style="margin: 20px 0px;" href="javascript:void(0)"> Load More </a> <div class="clear30"></div></div>';
        }
    }

    public function get_themes(Request $request)
    {
        $themes = $this->loader->loadAll();
        foreach ($themes as $theme) {
            echo '<div class="col-md-4 tiles-tc"><div class="ui card"><div class="dimmable image"><div class="ui dimmer"><div class="content"><div class="center"><a data-value="' . $theme['name'] . '" class="ui inverted button select-theme" href="javascript:void(0)">' . ucfirst($theme['name']) . '</a></div></div></div><img src="' . asset($theme['thumbnail']) . '" alt="#"></div></div></div>';
        }
        echo '<div class="col-md-4 tiles-tc should_remove"><div class="ui card"><div class="dimmable image"><div class="ui dimmer"><div class="content"><div class="center"><a data-value="let-us-choose" class="ui inverted button select-theme" href="javascript:void(0)">Let us choose the best for you</a></div></div></div><img src="' . asset('images/default-theme.png') . '" alt="#"></div></div></div>';
    }

    public function get_industry_categories(Request $request)
    {
        $input = $request->all();
        $templates = \DB::table('template_categories')->whereRaw('id IN (SELECT cat_id FROM industry_categories WHERE ind_id = ' . $input['industry_id'] . ')')->get();
        $output = '<select class="form-control" name="category_id" id="category_id"><option  value="">Select Purpose</option>';
        foreach ($templates as $templ) {
            $output .= '<option  value="' . $templ->id . '">' . $templ->title . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

    public function ChooseTemplate($id)
    {
        $data['template_category'] = \DB::table('template_categories')->where('id', $id)->first();
        $data['templates'] = \DB::table('templates')->get();
        $data['templates_free'] = \DB::table('templates')->where('price', '<=', 0)->get();
        $data['templates_paid'] = \DB::table('templates')->where('price', '>', 0)->get();

        return view('admin.pandapages.ChooseTemplate')->with($data);
    }

    public function stats($id)
    {
        //$data = array();
        $pages = array();
        not_permissions_redirect(have_premission(array(8)));
        $user = Auth::user();
        $data['ProjectData'] = \DB::table('projects')->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')->select('projects.*', \DB::raw('(SELECT GROUP_CONCAT(domains.name) FROM domains WHERE domains.project_id = projects.id GROUP BY domains.project_id LIMIT 0,1) AS domain_names'), \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'))->where('projects.id', $id)->where('users_projects.user_id', $user->id)->where('users_projects.notlist', 0)->first();
        $data['domain_data'] = \DB::table('domains')->where('project_id', $id)->first();
        
        if ($data['domain_data']) {
            $hosting_check = ',ga:hostname' . urlencode('==' . $data['domain_data']->name);
            $page_path_check = 'ga:pagePath' . urlencode("==/sites/" . $data['ProjectData']->name);
        } else {
            $hosting_check = '';
            $page_path_check = 'ga:pagePath' . urlencode("==/sites/" . $data['ProjectData']->name);
        }
        $data['thankyou'] = 0;
        $data['index'] = 0;

        $directory = '../public/storage/projects/' . $user->id . '/' . $data['ProjectData']->uuid . '/desktop/';
        if (glob($directory . "*.html") != false) {
            foreach (glob($directory . "*.html") as $pg) {
                $p = explode("/", $pg);
                $p = end($p);
                $p = explode(".", $p);
                $page = $p[0];
                $pages[] = $page;
                if ($page == 'index') {
                    $page_path_check = $page_path_check . ',' . $page_path_check . 'index/';
                    if ($hosting_check != '') {
                        $page_path_check .= ',ga:pagePath==/sites/';
                    }
                } else {
                    $page_path_check = $page_path_check . $page . '/';
                    if ($hosting_check != '') {
                        $page_path_check .= ',ga:pagePath==/' . $page . '/';
                    }
                }
                $analyticsData = Analytics::performQuery(Period::months(1), 'ga:pageviews,ga:uniquePageviews', ['filters' => $page_path_check . $hosting_check]);
                if (isset($analyticsData['rows'][0])) {
                    $data['pages_views'][$page] = $analyticsData['rows'][0][0];
                    $data['pages_unique_views'][$page] = $analyticsData['rows'][0][1];
                    if ($page == 'thankyou') {
                        $data['thankyou'] = $analyticsData['rows'][0][0];
                    }
                    if ($page == 'index') {
                        $data['index'] = $analyticsData['rows'][0][0];
                    }
                } else {
                    $data['pages_views'][$page] = 0;
                    $data['pages_unique_views'][$page] = 0;
                }
            }
        }
        $data['pages'] = $pages;
        return view('admin.pandapages.stats')->with($data);
    }

    public function stats_ajax($id, Request $request)
    {
        $input = $request->all();

        $project = \DB::table('projects')->select('projects.*', \DB::raw('(SELECT templates.name FROM templates WHERE templates.id = projects.template_id) AS temp_name'), \DB::raw('(SELECT templates.thumbnail FROM templates WHERE templates.id = projects.template_id) AS temp_thumbnail'), \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'))->where('projects.id', $id)->first();
        $domain_ = \DB::table('domains')->where('project_id', $id)->first();
        if (count($domain_)) {
            $hosting_check = ',ga:hostname' . urlencode('==' . $domain_->name);
            $page_path_check = 'ga:pagePath' . urlencode("==/page/" . $project->name);
        } else {
            $hosting_check = '';
            $page_path_check = 'ga:pagePath' . urlencode("==/page/" . $project->name);
        }
        $pages_ = \DB::table('pages')->where('pageable_id', $project->id)->where('pageable_type', 'Project')->get();
        $thankyou = 0;
        $index = 0;
        foreach ($pages_ as $key => $pro) {
            if ($pro->name == 'index') {
                $page_path_check = $page_path_check . ',' . $page_path_check . 'index/';
                if ($hosting_check != '') {
                    $page_path_check .= ',ga:pagePath==/index/';
                }
            } else {
                $page_path_check = $page_path_check . $pro->name . '/';
                if ($hosting_check != '') {
                    $page_path_check .= ',ga:pagePath==/' . $pro->name . '/';
                }
            }
            if ($input["device_category"]) {
                $device_check = ';ga:deviceCategory==' . $input["device_category"];
            } else {
                $device_check = '';
            }

            $start_date = $input["start_date"];
            $start_date = explode("/", $start_date);
            $start_date = $start_date[2] . '-' . $start_date[1] . '-' . $start_date[0];
            $end_date = $input["end_date"];
            $end_date = explode("/", $end_date);
            $end_date = $end_date[2] . '-' . $end_date[1] . '-' . $end_date[0];
            $period = Period::create(new \DateTime($start_date), new \DateTime($end_date));
            $analyticsData = Analytics::performQuery($period, 'ga:pageviews,ga:uniquePageviews', ['filters' => $page_path_check . $hosting_check . $device_check]);

            if (isset($analyticsData['rows'][0])) {
                $pages_views[$pro->id] = $analyticsData['rows'][0][0];
                $pages_unique_views[$pro->id] = $analyticsData['rows'][0][1];
                if ($pro->name == 'thankyou') {
                    $thankyou = $analyticsData['rows'][0][0];
                }
                if ($pro->name == 'index') {
                    $index = $analyticsData['rows'][0][0];
                }
            } else {
                $pages_views[$pro->id] = 0;
                $pages_unique_views[$pro->id] = 0;
            }
        }
        foreach ($pages_ as $page) {
            if ($index == 0) {
                $p_val = '0.00';
            } else {
                $p_val = number_format(($thankyou / $index) * 100, 2);
            }
            echo '<tr class="funnelstep"><td class="opt_ins"><i class="fa fa-fw fa-envelope"></i>' . $page->name . '</td><td class="pageviews">' . $pages_views[$page->id] . '</td><td class="pageviews">' . $pages_unique_views[$page->id] . '</td><td class="opt_ins">' . $thankyou . '</td><td class="opt_ins">' . $p_val . ' %</td></tr>';
        }
    }

    public function contacts($id)
    {
        not_permissions_redirect(have_premission(array(9)));
        $user = Auth::user();
        $data['ProjectData'] = \DB::table('projects')->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')->select('projects.*', \DB::raw('(SELECT GROUP_CONCAT(domains.name) FROM domains WHERE domains.project_id = projects.id GROUP BY domains.project_id LIMIT 0,1) AS domain_names'), \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'))->where('projects.id', $id)->where('users_projects.user_id', $user->id)->where('users_projects.notlist', 0)->first();
        $data['user_id'] = $user->id;
        $data['contacts'] = Leads::select('leads.*', \DB::raw('leads.page AS page_name'), \DB::raw('(select name from `projects` WHERE projects.id = leads.project_id) AS project_name'))->where('project_id', $id)->orderby('id', 'DESC')->paginate(10);

        return view('admin.pandapages.contacts')->with($data);
    }

    public function contacts_ajax($id, Request $request)
    {
        $input = $request->all();
        $where = ' leads.project_id = ' . $id . ' ';
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
        if (isset($input['page']) && $input['page'] != '') {
            $where .= ' AND leads.page = "' . $input['page'] . '" ';
        }

        $leads = Leads::select('leads.*', \DB::raw('(select name from `projects` WHERE projects.id = leads.project_id) AS project_name'))->whereRaw($where)->orderby('id', 'desc')->paginate(10);

        $output = '<div class="clear40"></div><table class="table table-hover table-nomargin no-margin table-bordered table-striped"><thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>IP Address</th><th>Page</th><th>Status</th><th>Actions</th></tr></thead><tbody>';
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
            $output .= '<tr><td>' . $name . '</td><td>' . $cont->email . '</td><td>' . $cont->phone . '</td><td>' . $cont->ip_address . '</td><td>' . $cont->page . '</td><td>' . $status . '</td><td><a href="' . url('admin/contacts/' . $cont->id) . '"><i class="fa fa-edit fa-fw"></i></a><a target="_blank" href="' . url('page/' . $cont->project_name) . '"><i class="fa fa-eye fa-fw"></i></a></td></tr>';
        }
        $output .= '</tbody></table></div><nav class = "pull-right">' . $leads->render() . '</nav>';
        if (count($leads) == 0) {
            $output = '<div class="contact_cnt text-center"><h3>No Contacts Found</h3><p><em>Looks like you have not collected any contacts for this panda page in the selected date range.</em><br><br>Start by sending traffic to the beginning of this panda page or any opt-in page within this panda page. All your contacts will appear here to manage and view.</p></div>';
        }
        echo $output;
    }

    public function contacts_export($id, Request $request)
    {
        $input = $request->all();
        $where = ' leads.project_id = ' . $id . ' ';
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
        if (isset($input['page']) && $input['page'] != '') {
            $where .= ' AND leads.page = "' . $input['page'] . '" ';
        }

        $leads = Leads::select('leads.*', \DB::raw('(select name from `projects` WHERE projects.id = leads.project_id) AS project_name'))->whereRaw($where)->orderby('id', 'desc')->get();
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

    public function settings($id)
    {
        not_permissions_redirect(have_premission(array(10)));
        $user = Auth::user();
        $data['ProjectData'] = \DB::table('projects')->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')->select('projects.*', \DB::raw('(SELECT GROUP_CONCAT(domains.name) FROM domains WHERE domains.project_id = projects.id GROUP BY domains.project_id LIMIT 0,1) AS domain_names'), \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'))->where('projects.id', $id)->where('users_projects.user_id', $user->id)->where('users_projects.notlist', 0)->first();
        $data['user_id'] = $user->id;
        $project_name = $data['ProjectData']->name;
        $data['domains'] = \App\Domains::where('user_id', \Auth::user()->id)->get();
        $directory = '../public/storage/projects/' . $user->id . '/' . $data['ProjectData']->uuid . '/desktop/';
        if (glob($directory . "*.html") != false) {
            foreach (glob($directory . "*.html") as $pg) {
                $p = explode("/", $pg);
                $p = end($p);
                $p = explode(".", $p);
                $page = $p[0];
                $pages[] = array("name" => $page, "tc" => \DB::table('pages_tracking_codes')->select('footer_code', 'header_code')->where('project_name', $project_name)->where("page_name", $page)->first());
            }
        }
        $data['pages'] = $pages;

        return view('admin.pandapages.settings')->with($data);
    }

    public function add_action_leads(Request $request)
    {
                    $emailmessage = '';
                    $emailmessageerr = '';
        $input = $request->all();
        if (!empty($request->email) || !empty($request->text)) {

            $exist = \DB::table('automation_action_lists')->where('project_id', $request->project_id)->where('action_type', $request->action)->first();
            $array = [];
            if (empty($exist)) {
                $array['project_id'] = $request->project_id;
                $array['emails'] = ($request->action == 'email') ? implode(',', array_filter($request->email)) : '';
                $array['phones'] = ($request->action == 'text') ? implode(',', array_filter($request->text)) : '';
                $array['form_name'] = '';
                $array['action_type'] = $request->action;
                $array['created_at'] = date('Y-m-d H:i:s');
                $array['updated_at'] = date('Y-m-d H:i:s');

                \DB::table('automation_action_lists')->insert($array);
            } else {
                if ($request->action == 'email') {
                    $array['emails'] = implode(',', array_filter($request->email));
                    $emailmessage = 'Email list updated successfully!';
                    $emailmessageerr = 'Email list not updated!';
                } else {
                    $array['phones'] = implode(',', array_filter($request->text));
                    $emailmessage = 'SMS list updated successfully!';
                    $emailmessageerr = 'SMS list not updated!';
                }

                $array['updated_at'] = date('Y-m-d H:i:s');
                \DB::table('automation_action_lists')->where('project_id', $request->project_id)->where('action_type', $request->action)->update($array);
            }
           

            Alert::success('Success Message', $emailmessage)->autoclose(3000);
        } else {
            Alert::error('Error Message', $emailmessageerr)->autoclose(3000);
        }

        if(isset($request->return_url)){
            return redirect($request->return_url);
        }else{
            return redirect()->back();
        }
    }

    public function save_settings(Request $request)
    {
        $user = Auth::user();
        $project_name = $request['project_name'];

        $project = \DB::table('projects')->where('projects.name', $project_name)->first();
        $directory = '../public/storage/projects/' . $user->id . '/' . $project->uuid . '/desktop/';
        if (glob($directory . "*.html") != false) {
            $i = 0;
            foreach (glob($directory . "*.html") as $pg) {
                $pg_content = file_get_contents($pg);
                $p = explode("/", $pg);
                $p = end($p);
                $p = explode(".", $p);
                $page = $p[0];
                $pages = \DB::table('pages_tracking_codes')->select('footer_code', 'header_code')->where('project_name', $project_name)->where("page_name", $page)->first();
                if (count($pages) > 0) {
                    \DB::table('pages_tracking_codes')->where('project_name', $project_name)->where("page_name", $page)->update(['header_code' => $request['header_code'][$i], 'footer_code' => $request['footer_code'][$i]]);
                    $new_pg_content = str_replace($pages->header_code, '', str_replace($pages->footer_code, '', $pg_content));
                } else {
                    \DB::table('pages_tracking_codes')->insert(['page_name' => $request['page_name'][$i], 'project_name' => $project_name, 'header_code' => $request['header_code'][$i], 'footer_code' => $request['footer_code'][$i], 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
                    $new_pg_content = $pg_content;
                }
                $new_pg_content = str_replace('</body>', $request['footer_code'][$i] . '</body>', str_replace('</head>', $request['header_code'][$i] . '</head>', $new_pg_content));
                file_put_contents($pg, $new_pg_content);
                $i++;
            }
        }
        Alert::success('Success Message', 'Your settings updated successfully!')->autoclose(3000);
        return redirect()->back();
    }

    public function save_trackingcode(Request $request)
    {
        $user = Auth::user();
        $project_name = $request['project_name'];

        $project = \DB::table('projects')->where('projects.name', $project_name)->first();
        $directory = '../public/storage/projects/' . $user->id . '/' . $project->uuid . '/desktop/';
        if (glob($directory . "*.html") != false) {
            $i = 0;
            foreach (glob($directory . "*.html") as $pg) {
                $pg_content = file_get_contents($pg);
                $p = explode("/", $pg);
                $p = end($p);
                $p = explode(".", $p);
                $page = $p[0];
                $pages = \DB::table('pages_tracking_codes')->select('footer_code', 'header_code')->where('project_name', $project_name)->where("page_name", $page)->first();
                if ($pages != "") {
                    \DB::table('pages_tracking_codes')->where('project_name', $project_name)->where("page_name", $page)->update(['header_code' => $request['header_code'][$i], 'footer_code' => $request['footer_code'][$i]]);
                    $new_pg_content = str_replace($pages->header_code, '', str_replace($pages->footer_code, '', $pg_content));
                } else {
                    \DB::table('pages_tracking_codes')->insert(['page_name' => $request['page_name'][$i], 'project_name' => $project_name, 'header_code' => $request['header_code'][$i], 'footer_code' => $request['footer_code'][$i], 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
                    $new_pg_content = $pg_content;
                }
                $new_pg_content = str_replace('</body>', $request['footer_code'][$i] . '</body>', str_replace('</head>', $request['header_code'][$i] . '</head>', $new_pg_content));
                file_put_contents($pg, $new_pg_content);
                $i++;
            }
        }
        Alert::success('Success Message', 'Your settings updated successfully!')->autoclose(3000);
        return redirect()->back();
    }

    public function checklist($id)
    {
        not_permissions_redirect(have_premission(array(1)));
        $data['ProjectData'] = \DB::table('projects')->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')->select('projects.*', \DB::raw('(SELECT GROUP_CONCAT(domains.name) FROM domains WHERE domains.project_id = projects.id GROUP BY domains.project_id LIMIT 0,1) AS domain_names'), \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'))->where('projects.id', $id)->where('users_projects.notlist', 0)->where('users_projects.user_id', Auth::user()->id)->first();
        $data['domains'] = \App\Domains::where('user_id', \Auth::user()->id)->where('status', 1)->get();
        $data['emaillists'] = \App\EmailLists::where('status', 1)->get();
        $data['user_id'] = \Auth::user()->id;
        return view('admin.pandapages.checklist')->with($data);
    }

    public function overview($id)
    {
        $data['ProjectData'] = \DB::table('projects')->select('projects.*', \DB::raw('(SELECT templates.name FROM templates WHERE templates.id = projects.template_id) AS temp_name'), \DB::raw('(SELECT templates.thumbnail FROM templates WHERE templates.id = projects.template_id) AS temp_thumbnail'), \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'))->where('projects.id', $id)->first();
        return view('admin.pandapages.overview')->with($data);
    }

    public function automation($id)
    {
        not_permissions_redirect(have_premission(array(1)));
        $user = Auth::user();
        $data['ProjectData'] = \DB::table('projects')->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')->select('projects.*', \DB::raw('(SELECT GROUP_CONCAT(domains.name) FROM domains WHERE domains.project_id = projects.id GROUP BY domains.project_id LIMIT 0,1) AS domain_names'), \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'))->where('projects.id', $id)->where('users_projects.notlist', 0)->where('users_projects.user_id', $user->id)->first();
        $data['user_id'] = $user->id;

        $data['emailsdata'] = \DB::table('automation_action_lists')->where('project_id', $id)->where('action_type', 'email')->first();
        $data['textdata'] = \DB::table('automation_action_lists')->where('project_id', $id)->where('action_type', 'text')->first();

        $actions = \DB::table('automation_actions')->where('project_id', $id)->select('form_name')->get();
        $a = [];
        foreach ($actions as $ac) {
            $a[] = $ac->form_name;
        }

        $data['actions'] = $a;
        //echo '<pre>';print_r($a);die;
        return view('admin.pandapages.automation')->with($data);
    }

    public function change_contacting_status($proj_id, $form, $action)
    {
        if ($action == 'add') {
            $array = array('project_id' => $proj_id, 'form_name' => str_replace('-', ' ', $form), 'is_active' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'));

            \DB::table('automation_actions')->insert($array);
        } else {
            \DB::table('automation_actions')->where('project_id', $proj_id)->where('form_name', str_replace('-', ' ', $form))->delete();
        }

        Alert::success('Success Message', 'Your form status updated successfully!')->autoclose(3000);

        return redirect()->back();
    }

    public function get_project_form(Request $request)
    {
        $input = $request->all();
        $pages_forms = \DB::table('pages')->select('forms')->where('pages.pageable_id', $input['project_id'])->where('pages.pageable_type', 'Project')->get();
        foreach ($pages_forms as $form) {
            $forms = explode(",", $form->forms);
            foreach ($forms as $fo) {
                if ($fo != "") {
                    echo '<p class="text-left"><i class="fa fa-caret-right"></i> ' . $fo . ' <span class="btn btn-success pull-right"> Confirm <i class="fa fa-check"></i></span></p><div class="clear5"></div>';
                }
            }
        }
        echo '<div class="clear10"></div><h3>Note this form? Please select the form from the dropdown below:</h3><div class="clear10"></div><select name="form_name" id="form_name" class="form-control required" ><option value="">Select Form</option>';
        foreach ($pages_forms as $form) {
            $forms = explode(",", $form->forms);
            foreach ($forms as $fo) {
                if ($fo != "") {
                    echo '<option  value="' . $fo . '">' . $fo . '</option>';
                }
            }
        }
        echo '</select>';
    }

    public function publishing($id)
    {
        $data['ProjectData'] = \DB::table('projects')->select('projects.*', \DB::raw('(SELECT templates.name FROM templates WHERE templates.id = projects.template_id) AS temp_name'), \DB::raw('(SELECT templates.thumbnail FROM templates WHERE templates.id = projects.template_id) AS temp_thumbnail'), \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'))->where('projects.id', $id)->first();
        return view('admin.pandapages.publishing')->with($data);
    }

    public function get_temp_cat(Request $request)
    {
        $input = $request->all();
        $where = " template_categories.status = 1 ";
        if (isset($input['industries'])) {
            $where .= " AND template_categories.id IN (SELECT industory_template_categories.t_cat_id FROM industory_template_categories WHERE industory_template_categories.ind_id IN (" . implode(', ', $input['industries']) . ")) ";
        }
        if (isset($input['categories'])) {
            $where .= " AND template_categories.id IN (SELECT category_template_categories.t_cat_id FROM category_template_categories WHERE category_template_categories.cat_id IN (" . implode(', ', $input['categories']) . ")) ";
        }
        $data['template_categories'] = \DB::table('template_categories')->select('template_categories.*')->whereRaw($where)->get();
        return view('admin.pandapages.partial_tc')->with($data);
    }

    public function PreviewTemplate($p_name,$ind_id)
    {
        $data['display_name'] = $p_name;
        $data['create_project_link'] = url('admin/create-project/' . $p_name . '/' . $ind_id);
        $data['project_link'] = url('sites/' . $p_name);
        return view('admin.pandapages.GetPandaPage')->with($data);
    }

    public function create_new_project($id, $id2)
    {

        $user = \Auth::user();

        $unique_code = $user['unique_code'];
        if ($user['facebook_page_id'] != '') {
            $contect_messenger = 'http://m.me/' . $user['facebook_page_id'];
        } else {
            $contect_messenger = '[MESSAGEUSFBMESSENGER]';
        }
        $temp = $this->templateLoader->load($id);

        $project_last = \DB::table('projects')->orderby('id', 'desc')->first();
        
        if (isset($project_last)) {
            $project_last = json_decode(json_encode($project_last), true);
            $project_ref = $project_last['id'] + 1;
        } else {
            $project_ref = 1;
        }

        $pages = array();
        $p_name = generateRandomString(10);
        $uuid = generateRandomString(36);
        $base = '<head><base id="base" href="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/"><link rel="stylesheet" href="' . url('/') . '/css/elementsstyle.min.css">';

        $links_js = '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGDM9ZnErXnV7WGbsE7tgXFw39o8d-43Y"></script><script src="' . url('/') . '/assets/js/ninjaVideoPlugin.js"></script><script src="' . url('/') . '/assets/js/ninja-slider.js"></script><script src="' . url('/') . '/assets/js/triggerVideoPlayer.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.0.13/howler.min.js"></script><script src="' . url('/') . '/assets/js/tinyPlayer.js"></script><script src="' . url('/') . '/assets/js/musicplayer.js"></script><script>var top_location = top.location.href;var arr=top_location.split("/");if ( self !== top && (arr[3] && arr[3]!="get-feedback" && arr[3]!="view-feedbacks" && arr[3]!="admin")) {$.getScript("' . url('/') . '/js/jquery.notebook.min.js", function(){$("head").append(\'<link rel="stylesheet" href="' . url('/') . '/css/jquery.notebook.min.css">\');$("body").notebook({autoFocus: true,placeholder: "Type something awesome..."});});$.getScript("' . url('/') . '/js/avairy-live.js", function(){$.getScript("' . url('/') . '/js/aviary.js", function(){});});}$.getScript("https://www.googletagmanager.com/gtag/js?id=UA-115314865-1", function(){window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag("js", new Date());gtag("config", "UA-115314865-1");});</script></body>';
           
        foreach ($temp['pages']['mobile'] as $key => $value) {

            $pages['mobile'][$key]['name'] = $value['name'];
            $pages['mobile'][$key]['html'] = str_replace('[SUBMIT_URL]', url('post-lead'),str_replace("<head>", $base, str_replace('</body>', $links_js, str_replace('[PAGE_NAME]', $value['name'], str_replace('[MESSAGEUSFBMESSENGER]', $contect_messenger, str_replace('#TWITTER#', $user['twitter'], str_replace('#GOOGLEPLUS#', $user['googleplus'], str_replace('#INSTAGRAM#', $user['instagram'], str_replace('#LINKEDIN#', $user['linkedin'], str_replace('#YOUTUBE#', $user['youtube'], str_replace('#PINTEREST#', $user['pinterest'], str_replace('#FACEBOOK#', $user['facebook'], str_replace('[PROJECT_ID]', $project_ref, str_replace("href='css/", "href='" . url('/') . "/storage/projects/" . $user['id'] . "/" . $uuid . "/css/", str_replace('href="css/', 'href="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/css/', str_replace('src="images/', 'src="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace("src='images/", "src='" . url('/') . "/storage/projects/" . $user['id'] . "/" . $uuid . "/images/", str_replace('src="js/', 'src="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/js/', str_replace("src='js/", "src='" . url('/') . "/storage/projects/" . $user['id'] . "/" . $uuid . "/js/", str_replace('data-url="images/', 'data-url="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace("data-url='images/", "data-url='" . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace('data-slide-bg="images/', 'data-slide-bg="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace("data-slide-bg='images/", "data-slide-bg='" . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace('[UNIQUE_CODE]', $unique_code, $temp['pages']['mobile'][$key]['html']))))))))))))))))))))))));

            $domm = new \DOMDocument();
            @$domm->loadHTML($pages['mobile'][$key]['html']);
            $xm = new \DOMXPath($domm);
            $i = 0;

            foreach ($xm->query("//a|//abbr|//address|//area|//article|//aside|//audio|//b|//base|//bdi|//bdo|//blockquote|//body|//br|//button|//canvas|//caption|//cite|//code|//col|//colgroup|//command|//datalist|//dd|//del|//details|//dfn|//div|//dl|//dt|//em|//embed|//fieldset|//figcaption|//figure|//footer|//form|//h1|//h2|//h3|//h4|//h5|//h6|//head|//header|//hgroup|//hr|//html|//i|//iframe|//img|//input|//ins|//kbd|//keygen|//label|//legend|//li|//map|//mark|//menu|//meter|//nav|//noscript|//object|//ol|//optgroup|//option|//output|//p|//param|//pre|//progress|//q|//rp|//rt|//ruby|//s|//samp|//main|//section|//select|//small|//source|//span|//strong|//sub|//summary|//sup|//table|//tbody|//td|//textarea|//tfoot|//th|//thead|//time|//title|//tr|//track|//u|//ul|//var|//video|//wbr|//style|//script|//link|//meta") as $nodem) {
                $nodem->setAttribute("data-item", $i);
                $i++;
            }
            $pages['mobile'][$key]['html'] = $domm->saveHtml();

            $pages['desktop'][$key]['name'] = $value['name'];
            $pages['desktop'][$key]['html'] = str_replace('[SUBMIT_URL]', url('post-lead'),str_replace("<head>", $base, str_replace('</body>', $links_js, str_replace('[PAGE_NAME]', $value['name'], str_replace('[MESSAGEUSFBMESSENGER]', $contect_messenger, str_replace('#TWITTER#', $user['twitter'], str_replace('#GOOGLEPLUS#', $user['googleplus'], str_replace('#INSTAGRAM#', $user['instagram'], str_replace('#LINKEDIN#', $user['linkedin'], str_replace('#YOUTUBE#', $user['youtube'], str_replace('#PINTEREST#', $user['pinterest'], str_replace('#FACEBOOK#', $user['facebook'], str_replace('[PROJECT_ID]', $project_ref, str_replace("href='css/", "href='" . url('/') . "/storage/projects/" . $user['id'] . "/" . $uuid . "/css/", str_replace('href="css/', 'href="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/css/', str_replace('src="images/', 'src="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace("src='images/", "src='" . url('/') . "/storage/projects/" . $user['id'] . "/" . $uuid . "/images/", str_replace('src="js/', 'src="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/js/', str_replace("src='js/", "src='" . url('/') . "/storage/projects/" . $user['id'] . "/" . $uuid . "/js/", str_replace('data-url="images/', 'data-url="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace("data-url='images/", "data-url='" . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace('data-slide-bg="images/', 'data-slide-bg="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace("data-slide-bg='images/", "data-slide-bg='" . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace('[UNIQUE_CODE]', $unique_code, $temp['pages']['desktop'][$key]['html']))))))))))))))))))))))));

            $domd = new \DOMDocument();
            @$domd->loadHTML($pages['desktop'][$key]['html']);
            $xd = new \DOMXPath($domd);
            $i = 0;

            foreach ($xd->query("//a|//abbr|//address|//area|//article|//aside|//audio|//b|//base|//bdi|//bdo|//blockquote|//body|//br|//button|//canvas|//caption|//cite|//code|//col|//colgroup|//command|//datalist|//dd|//del|//details|//dfn|//div|//dl|//dt|//em|//embed|//fieldset|//figcaption|//figure|//footer|//form|//h1|//h2|//h3|//h4|//h5|//h6|//head|//header|//hgroup|//hr|//html|//i|//iframe|//img|//input|//ins|//kbd|//keygen|//label|//legend|//li|//map|//mark|//menu|//meter|//nav|//noscript|//object|//ol|//optgroup|//option|//output|//p|//param|//pre|//progress|//q|//rp|//rt|//ruby|//s|//samp|//main|//section|//select|//small|//source|//span|//strong|//sub|//summary|//sup|//table|//tbody|//td|//textarea|//tfoot|//th|//thead|//time|//title|//tr|//track|//u|//ul|//var|//video|//wbr|//style|//script|//link|//meta") as $noded) {
                $noded->setAttribute("data-item", $i);
                $i++;
            }
            
            $pages['desktop'][$key]['html'] = $domd->saveHtml();
           
        }
       
        $temp['pages'] = $pages;
        $project = array(
            'uuid' => $uuid,
            'name' => $p_name,
            'framework' => $temp['config']['framework'],
            'pages' => $temp['pages'],
            'template' => $temp,
            'ind_id' => $id2,
            'id' => $project_ref,
            'forms' => $temp['config']['forms'],
        );
      $lastInsrtID = $this->repository->create($project)->id;
      \DB::table('projects')->where('id', $lastInsrtID)->update(array('id'=>$project_ref));
      \DB::table('users_projects')->where('project_id', $lastInsrtID)->update(array('project_id'=>$project_ref));
      
      $project_log = array(
            'message' => 'created the project',
            'user_id' => $user['id'],
            'project_id' => $project_ref
        );
      
       \DB::table('project_log')->insert($project_log);
      
        return redirect('builder/' . $project_ref);
    }

    public function add_seo_meta_data(Request $request)
    {
        
        $input = $request->all();
        unset($input['social_image']);
        if (isset($_FILES['social_image']['name'])) {
            $sourcePath = $_FILES['social_image']['tmp_name'];
            $temp_name = $_FILES['social_image']['name'];
            $temp_name_array = explode('.', $temp_name);
            $extention = end($temp_name_array);
            $file_name = 'socialImage-' . uniqid() . '.' . $extention;
            $path = 'uploads/social_images/' . $file_name;
            move_uploaded_file($sourcePath, $path);
            $input['social_image'] = $file_name;
        }
        $data = \DB::table('pages_seo_settings')->where('page_name', $input['page_name'])->where('project_id', $input['id'])->first();
        if (count($data)) {
            \DB::table('pages_seo_settings')->where('id', $data->id)->update($input);
        } else {
            $input['created_at'] = date('Y-m-d H:i:s');
            \DB::table('pages_seo_settings')->insert($input);
        }
        $user = Auth::user();
        $user_id = $user->id;
        $project_log = array(
            'message' => 'added SEO meta data',
            'user_id' => $user_id,
            'project_id' => $input['id']
        );
      
       \DB::table('project_log')->insert($project_log);
        
        
        exit;
    }

    public function add_tracking_codes(Request $request)
    {
        $input = $request->all();
        $data = \DB::table('pages_tracking_codes')->where('page_name', $input['page_name'])->where('project_name', $input['project_name'])->first();
        if (count($data)) {
            \DB::table('pages_tracking_codes')->where('id', $data->id)->update($input);
        } else {
            $input['created_at'] = date('Y-m-d H:i:s');
            \DB::table('pages_tracking_codes')->insert($input);
        }
        
        $data = \DB::table('projects')->where('name', $input['project_name'])->select('id')->first();
        
        $user = Auth::user();
        $user_id = $user->id;
        $project_log = array(
            'message' => 'added Tracking Code',
            'user_id' => $user_id,
            'project_id' => $data->id
        );
      
       \DB::table('project_log')->insert($project_log);
        
        exit;
    }

    public function add_integrations(Request $request)
    {
        $input = $request->all();
        $input['created_at'] = date('Y-m-d H:i:s');
        \DB::table('pages_email_lists')->insert($input);
        exit;
    }

    public function get_tracking_codes(Request $request)
    {
        $input = $request->all();
        $data = \DB::table('pages_tracking_codes')->where('page_name', $input['page_name'])->where('project_name', $input['project_name'])->first();
        echo json_encode($data);
        exit;
    }

    public function get_integrations(Request $request)
    {
        $input = $request->all();
        $data = \DB::table('pages_email_lists')->select('pages_email_lists.*', \DB::raw('(SELECT title FROM email_lists WHERE id = pages_email_lists.email_list_id) AS list_title'))->where('project_id', $input['project_id'])->get();
        echo json_encode($data);
        exit;
    }

    public function get_seo_meta_data(Request $request)
    {
        $input = $request->all();
        $data = \DB::table('pages_seo_settings')->where('page_name', $input['page_name'])->where('project_name', $input['project_name'])->first();
        echo json_encode($data);
        exit;
    }

    public function get_email_lists()
    {
        $email_lists = \DB::table('email_lists')->orderby('title', 'ASC')->get();
        foreach ($email_lists as $el) {
            echo '<option value="' . $el->id . '">' . $el->title . '</option>';
        }
        exit;
    }

    public function remove_integrations(Request $request)
    {
        $input = $request->all();
        \DB::table('pages_email_lists')->where('id', $input['id'])->delete();
    }

    public function build_site(Request $request)
    {
        $input = $request->all();

        $templates = $this->templateLoader->loadAll();

        $_SESSION['industry_id'] = $input['industry_id'];
        $_SESSION['category_id'] = $input['category_id'];
        $_SESSION['featured_value'] = $input['featured_value'];
        $templates = $templates->filter(function ($template) {
            if (isset($template['config']['industries']) && in_array($_SESSION['industry_id'], $template['config']['industries']) && isset($template['config']['t_cat_id']) && in_array($_SESSION['category_id'], $template['config']['t_cat_id']) && isset($template['config']['features'])) {
                $features_values = explode(",", $_SESSION['featured_value']);
                foreach ($features_values as $fv) {
                    if (in_array($fv, $template['config']['features'])) {
                        return 1;
                    }
                }
            }
        });

        if (count($templates)) {
            $user = \Auth::user();
            $unique_code = $user['unique_code'];
            if ($user['facebook_page_id'] != '') {
                $contect_messenger = '<a href="http://m.me/' . $user['facebook_page_id'] . '" style="font-size: 24px;color: #448AFF;text-decoration: none;background-color: transparent;padding: 4px 12px 8px 12px; border: 2px solid;border-radius: 8px;" class=""><img src="' . asset('public/frontend/images/messanger-icon.png') . '" style="height: 30px;width: 30px;"> Messenger</a>';
            } else {
                $contect_messenger = '';
            }
            $template = $templates[0];
            $temp = $this->templateLoader->load($template['name']);
            $project_last = \DB::table('projects')->orderby('id', 'desc')->first();
            if (count($project_last)) {
                $project_ref = $project_last->id + 1;
            } else {
                $project_ref = 1;
            }
            $pages = array();
            $p_name = generateRandomString(10);
            $uuid = generateRandomString(36);
            $base = '<head><base id="base" href="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/">';

            $links_js = '<script src="https://maps.googleapis.com/maps/api/jskey=AIzaSyAGDM9ZnErXnV7WGbsE7tgXFw39o8d-43Y"></script><script src="' . url('/') . '/assets/js/triggerVideoPlayer.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.0.13/howler.min.js"></script><script src="' . url('/') . '/assets/js/tinyPlayer.js"></script><script src="' . url('/') . '/assets/js/musicplayer.js"></script><script>if ( self !== top ) {$.getScript("' . url('/') . '/js/jquery.notebook.min.js", function(){$("body").notebook({autoFocus: true,placeholder: "Type something awesome..."});});$.getScript("http://feather.aviary.com/imaging/v3/editor.js", function(){$.getScript("' . url('/') . '/js/aviary.js", function(){});});$.getScript("https://www.googletagmanager.com/gtag/js?id=UA-115314865-1", function(){window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.pus(arguments);}gtag("js", new Date());gtag("config", "UA-115314865-1");});}</script></body>';
            foreach ($temp['pages']['mobile'] as $key => $value) {
                $pages['mobile'][$key]['name'] = $value['name'];
                $pages['mobile'][$key]['html'] = str_replace('<head>', $base, str_replace('</body>', $links_js, str_replace('[PAGE_NAME]', $value['name'], str_replace('[MESSAGEUSFBMESSENGER]', $contect_messenger, str_replace('#TWITTER#', $user['twitter'], str_replace('#GOOGLEPLUS#', $user['googleplus'], str_replace('#INSTAGRAM#', $user['instagram'], str_replace('#LINKEDIN#', $user['linkedin'], str_replace('#YOUTUBE#', $user['youtube'], str_replace('#PINTEREST#', $user['pinterest'], str_replace('#FACEBOOK#', $user['facebook'], str_replace('[PROJECT_ID]', $project_ref, str_replace("href='css/", "href='" . url('/') . "/storage/projects/" . $user['id'] . "/" . $uuid . "/css/", str_replace('href="css/', 'href="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/css/', str_replace('src="images/', 'src="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace("src='images/", "src='" . url('/') . "/storage/projects/" . $user['id'] . "/" . $uuid . "/images/", str_replace('src="js/', 'src="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/js/', str_replace("src='js/", "src='" . url('/') . "/storage/projects/" . $user['id'] . "/" . $uuid . "/js/", str_replace('data-url="images/', 'data-url="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace("data-url='images/", "data-url='" . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace('data-slide-bg="images/', 'data-slide-bg="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace("data-slide-bg='images/", "data-slide-bg='" . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace('[UNIQUE_CODE]', $unique_code, $temp['pages']['mobile'][$key]['html'])))))))))))))))))))))));

                $pages['desktop'][$key]['name'] = $value['name'];
                $pages['desktop'][$key]['html'] = str_replace('<head>', $base, str_replace('</body>', $links_js, str_replace('[PAGE_NAME]', $value['name'], str_replace('[MESSAGEUSFBMESSENGER]', $contect_messenger, str_replace('#TWITTER#', $user['twitter'], str_replace('#GOOGLEPLUS#', $user['googleplus'], str_replace('#INSTAGRAM#', $user['instagram'], str_replace('#LINKEDIN#', $user['linkedin'], str_replace('#YOUTUBE#', $user['youtube'], str_replace('#PINTEREST#', $user['pinterest'], str_replace('#FACEBOOK#', $user['facebook'], str_replace('[PROJECT_ID]', $project_ref, str_replace("href='css/", "href='" . url('/') . "/storage/projects/" . $user['id'] . "/" . $uuid . "/css/", str_replace('href="css/', 'href="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/css/', str_replace('src="images/', 'src="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace("src='images/", "src='" . url('/') . "/storage/projects/" . $user['id'] . "/" . $uuid . "/images/", str_replace('src="js/', 'src="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/js/', str_replace("src='js/", "src='" . url('/') . "/storage/projects/" . $user['id'] . "/" . $uuid . "/js/", str_replace('data-url="images/', 'data-url="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace("data-url='images/", "data-url='" . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace('data-slide-bg="images/', 'data-slide-bg="' . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace("data-slide-bg='images/", "data-slide-bg='" . url('/') . '/storage/projects/' . $user['id'] . '/' . $uuid . '/images/', str_replace('[UNIQUE_CODE]', $unique_code, $temp['pages']['desktop'][$key]['html'])))))))))))))))))))))));
            }
            $temp['pages'] = $pages;

            $project = array(
                'uuid' => $uuid,
                'name' => $p_name,
                'framework' => $temp['config']['framework'],
                'pages' => $temp['pages'],
                'template' => $temp,
                'ind_id' => $id2,
                'id' => $project_ref,
                'forms' => $temp['config']['forms'],
            );
            $this->repository->create($project);
            echo url('builder/' . $project_ref);
        } else {
            echo '0';
            exit;
        }
        exit;
    }
    public function update_site_data(Request $request) {
        $user = \Auth::user();
        $dat = $request->action;
        if ($request->action == 'rename') {
            $ur = \DB::table('projects')->where('id', $request->project_id)->update(['site_name' => $request->site_name]);
            if($ur){
                $request->session()->put('act', $dat);
            }
            Alert::success('Site Renamed Successfully!!')->autoclose(2000);
            if(isset($request->return_url)){
                return redirect($request->return_url);
            }else{
                return redirect('admin/panda-pages');
            }
            
        }
        if ($request->action == 'transfer') {
            list($transfer_user_id, $transfer_user_name) = explode('|-|', $request->user_id);
            $ur = \DB::table('users_projects')->where('project_id', $request->project_id)->update(['user_id' => $transfer_user_id]);
            if($ur){
                $request->session()->put('act', $dat);
            }
            Alert::success('Your Site has been transfered to ' . $transfer_user_name . ' Successfully!!')->autoclose(3000);
            return redirect('admin/panda-pages');
        }

        if ($request->action == 'duplicate') {
            $id = $request->template;
            $id2 = $request->ind_id;
            $user = \Auth::user();
            $temp = $this->templateLoader->load($id);
    
            $project_last = \DB::table('projects')->orderby('id', 'desc')->first();
            
            if (isset($project_last)) {
                $project_last = json_decode(json_encode($project_last), true);
                $project_ref = $project_last['id'] + 1;
            } else {
                $project_ref = 1;
            }
    
            $pages = array();
            $p_name = generateRandomString(10);
            $uuid = generateRandomString(36);

            $project = array(
                'uuid' => $uuid,
                'name' => $p_name,
                'framework' => $temp['config']['framework'],
                'pages' => $temp['pages'],
                'template' => $temp,
                'ind_id' => $id2,
                'id' => $project_ref,
                'forms' => $temp['config']['forms'],
            );
          $lastInsrtID = $this->repository->create($project)->id;
          \DB::table('projects')->where('id', $lastInsrtID)->update(array('id'=>$project_ref, 'site_name'=>$request->site_name));
          \DB::table('users_projects')->where('project_id', $lastInsrtID)->update(array('project_id'=>$project_ref));

          $old_project  = $this->project->with('users')->find($request->project_id);
          $new_project  = $this->project->with('users')->find($project_ref);

          $directory = '../public/storage/projects/' . $user->id . '/' . $uuid. '/desktop/';
            if (glob($directory . "*.html") != false) {
                foreach (glob($directory . "*.html") as $pg) {
                    $pg = str_replace('../public/storage/','',$pg);
                    $pg2 = str_replace('desktop','mobile',$pg);
                    $this->storage->delete($pg);
                    $this->storage->delete($pg2);
                }
            }

            $directory = '../public/storage/projects/' . $old_project->users->first()->id . '/' . $old_project->uuid. '/desktop/';
            if (glob($directory . "*.html") != false) {
                foreach (glob($directory . "*.html") as $pg) {
                    $pg = str_replace('../public/storage/','',$pg);
                    $pg2 = str_replace('desktop','mobile',$pg);
                    $newPageHtmld = $this->storage->get($pg);
                    $newPageHtmlm = $this->storage->get($pg2);


                    $newPageHtmld = str_replace('/' . $old_project->uuid. '/','/' . $uuid. '/',$newPageHtmld);
                    $newPageHtmld = str_replace('/' . $old_project->users->first()->id. '/','/' . $user->id. '/',$newPageHtmld);
                    $newPageHtmld = str_replace('/' . $old_project->uuid. '/','/' . $uuid. '/',$newPageHtmld);
                    $newPageHtmld = str_replace('"' .$request->project_id. '"','"' . $project_ref. '"',$newPageHtmld);
                    $newPageHtmld = str_replace("'" .$request->project_id. "'","'" . $project_ref. "'",$newPageHtmld);

                    $newPageHtmlm = str_replace('/' . $old_project->uuid. '/','/' . $uuid. '/',$newPageHtmlm);
                    $newPageHtmlm = str_replace('/' . $old_project->users->first()->id. '/','/' . $user->id. '/',$newPageHtmlm);
                    $newPageHtmlm = str_replace('/' . $old_project->uuid. '/','/' . $uuid. '/',$newPageHtmlm);
                    $newPageHtmlm = str_replace('"' .$request->project_id. '"','"' . $project_ref. '"',$newPageHtmlm);
                    $newPageHtmlm = str_replace("'" .$request->project_id. "'","'" . $project_ref. "'",$newPageHtmlm);

                    $pg = str_replace('/' . $old_project->uuid. '/','/' . $uuid. '/',$pg);
                    $pg = str_replace('/' . $old_project->users->first()->id. '/','/' . $user->id. '/',$pg);

                    $pg2 = str_replace('/' . $old_project->uuid. '/','/' . $uuid. '/',$pg2);
                    $pg2 = str_replace('/' . $old_project->users->first()->id. '/','/' . $user->id. '/',$pg2);

                    $this->storage->put($pg, $newPageHtmld);
                    $this->storage->put($pg2, $newPageHtmlm);
                }
            }
            Alert::success('Your Site Duplicated Successfully!!')->autoclose(3000);
        }
        return redirect()->back();
    }
    public function premium_build_requests(Request $request)
    {
        $user = \Auth::user();
        $input = $request->all();
        //echo '<pre>';print_r($input);die();
        unset($input['_token']);
        unset($input['submit']);
//        if(isset($input['pages'])){
//            $input['pages'] = implode(',',$input['pages']);
//        }
//        if(isset($input['features'])){
//             $input['features'] = implode(',',$input['features']);
//        }
        if (isset($_FILES['logo']['name']) && $_FILES['logo']['size'] > 0) {
            $ext = strtolower(pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION));
            $photo = 'logo-'.preg_replace('/[^A-Za-z0-9\-]/', '',trim(microtime())) . '.' . $ext;
            $destinationPath = "uploads/premium/" . $photo;
            move_uploaded_file($_FILES['logo']['tmp_name'], $destinationPath);
            $input['logo'] = $photo;
        }
        $input["user_id"] = $user->id;
        $input["created_at"] = date("Y-m-d H:i:s");
        \DB::table('premium_build_requests')->insert($input);
        Alert::success('A member of our team will be in touch within the next 24 hours with your custom quotation  IMPORTANT! You can select a site template and build a website in the meantime as your premium site build will be an addon to your current Control Panda Plan.
We look forward to building your perfect website.
')->autoclose(5000);
        return redirect()->back();
    }
}
