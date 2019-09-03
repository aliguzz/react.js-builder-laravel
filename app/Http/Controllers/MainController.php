<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Testimonials;
use App\Packages;
use App\HelpArticles;
use App\NewsLetter;
use App\DemoRequest;
use App\DbModel;
use Auth;
use Session;
use Alert;
use View;
use App\Project;
use App\Services\ProjectRepository;
use Storage;

class MainController extends Controller {

    private $project;
    private $projectRepository;

    public function __construct(Project $project, ProjectRepository $projectRepository) {
        $this->project = $project;
        $this->projectRepository = $projectRepository;
        $this->storage = Storage::disk('public');
    }

    public function index() {
        
        $app_name = str_replace("www.", "", str_replace("/", "", str_replace(":", "", str_replace("http", "", str_replace("https", "", env('APP_URL'))))));
        $current_name = str_replace("www.", "", str_replace("/", "", str_replace(":", "", str_replace("http", "", str_replace("https", "", $_SERVER['HTTP_HOST'])))));
       
        if ($app_name == $current_name) {
            
            $testimonials = Testimonials::where('featured', 1)->where('is_active', 1)->get();
            $packages = Packages::where('is_active', 1)->get();
            $output = array(
                'testimonials' => $testimonials,
                'packages' => $packages
            );
            return view('frontend/index')->with($output);
        } else {
            $domain = \DB::table('domains')->where('name', $current_name)->first();
            if ($domain) {
                $project = $this->project->where('id', $domain->project_id)->firstOrFail();
                $user = \DB::table('users_projects')->where('project_id', $domain->project_id)->first();
                try {
                    $html = $this->projectRepository->getPageHtml($project, 'index');
                    return $this->replaceRelativeLinks($_SERVER['HTTP_HOST'], $html);
                } catch (FileNotFoundException $e) {
                    return view('errors/404');
                }
            } else {
                return view('errors/404');
            }
        }
    }

    public function pricing(){
        $data['packages'] = Packages::where('is_active', 1)->get();
        return view('frontend.pricing')->with($data);
    }

    private function replaceRelativeLinks($projectName, $html) {
        preg_match_all('/<a.*?href="(.+?)"/i', $html, $matches);

        //there are no links in html
        if (!isset($matches[1]))
            return $html;
        $base = $projectName;
        $urls = array_unique($matches[1]);
        foreach ($urls as $url) {
            if (ends_with($url, ['html'])) {
                $html = str_replace($url, "http://" . $base . '/' . $url, $html);
            }
        }
        return $html;
    }

    public function allothers($other) {
        $current_name = str_replace("www.", "", str_replace("/", "", str_replace(":", "", str_replace("http", "", str_replace("https", "", $_SERVER['HTTP_HOST'])))));
        $domain = \DB::table('domains')->where('name', $current_name)->first();
        if (count((array)$domain)) {
            $project = $this->project->where('id', $domain->project_id)->firstOrFail();
            $user = \DB::table('users_projects')->where('project_id', $domain->project_id)->first();
            try {
                $html = $this->projectRepository->getPageHtml($project, $other);
                return $this->replaceRelativeLinks($_SERVER['HTTP_HOST'], $html);
            } catch (FileNotFoundException $e) {
                return view('errors/404');
            }
        } else {
            return view('errors/404');
        }
    }

    public function post_news_letter() {
        $input = Input::all();

        $exist = NewsLetter::where('email', '=', $input['email'])->first();

        if (!$exist) {
            Alert::success('You have successfully subscribed')->autoclose(3000);
            $id = NewsLetter::create($input)->id;

            $template = \DB::table('email_templates')->where('template_type', 1)->where('email_type', 'subscribed')->first();

            if ($template != '') {

                $link = url("unsubscribe/$id");
                $subject = $template->subject;
                $to_replace = ['[NAME]', '[LINK]'];
                $with_replace = [$input['name'], $link];
                $html_body = '';
                $html_body .= str_replace($to_replace, $with_replace, $template->content);

                $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
            } else {

                $link = url("unsubscribe/$id");
                $subject = "Account Subscribed";
                $html_body = "Hi " . $input['name'] . "! <br />";
                $html_body .= "Your account has been successfully subscribed for ControlPanda. You will further receive emails.<br> <br>";
                $html_body .= "To unsubscribe your account click here" . '<a href="' . $link . '"> Unsubscribe </a>';

                $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
            }

            $to = $input['email'];
            $fromemail = "noreply@controlpanda.com";
            $fromName = "ControlPanda";
            $returnpath = "";
            $cc = "";
            $bcc = "";
            
            $dd = DbModel::SendHTMLMail($to, $subject, $mailContents, $fromemail, $fromName, $returnpath, $cc, $bcc);
            Alert::success('You subscribed successfully')->autoclose(3000);
        } else {
            Alert::error('You have already subscribed')->autoclose(3000);
        }

        return redirect()->back();
    }

    public function post_demo_request() {

        $input = Input::all();

        DemoRequest::create($input);

        $template = \DB::table('templates')->where('template_type', 1)->where('lead_group_id', -1)->where('email_type', 'demo_requested')->first();

        if ($template != '') {

            $subject = $template->subject;
            $to_replace = ['[NAME]'];
            $with_replace = [$input['name']];
            $html_body = '';
            $html_body .= str_replace($to_replace, $with_replace, $template->content);

            $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
        } else {

            $subject = "Recieved Demo Request";
            $html_body = "Hi " . $input['name'] . "! <br />";
            $html_body .= "Your ControlPanda demo request has been recieved. We will contact you soon.<br> <br>";

            $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
        }

        $to = $input['email'];
        $fromemail = "noreply@controlpanda.com";
        $fromName = "ControlPanda";
        $returnpath = "";
        $cc = "";
        $bcc = "";

        $smtp = \DB::table("smtp_settings")->where("user_id", 1)->select('smtp_server', 'smtp_port', 'smtp_user', 'smtp_password')->first();

        $dd = DbModel::SendHTMLMail($to, $subject, $mailContents, $fromemail, $fromName, $returnpath, $cc, $smtp, $bcc);

        Alert::success('Your demo request has been submitted')->autoclose(3000);
        return redirect('/');
    }

    public function post_contact_us() {

        $input = Input::all();

        \DB::table('contact_us_log')->insert(['name' => $input['name'], 'email' => $input['email'], 'phone' => $input['phone'], 'message' => $input['message'], 'created_at' => date("Y-m-d H:i:s")]);
        $template = \DB::table('email_templates')->where('template_type', 1)->where('email_type', 'contact_us')->first();

        if ($template != '') {

            $subject = $template->subject;
            $to_replace = ['[NAME]', '[PHONE]', '[EMAIL]', '[MESSAGE]'];
            $with_replace = [$input['name'], $input['phone'], $input['email'], $input['message']];
            $html_body = '';
            $html_body .= str_replace($to_replace, $with_replace, $template->content);

            $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
        } else {

            $subject = 'Contact Us';
            $html_body = '';
            $html_body .= "<b> Name: </b>" . $input['name'] . "<br />";
            $html_body .= "<b> Phone: </b>" . $input['phone'] . "<br />";
            $html_body .= "<b> Email: </b>" . $input['email'] . "<br />";
            $html_body .= '<br><br>';
            $html_body .= "<b> Message: </b>" . "<br />";
            $html_body .= $input['message'];

            $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
        }

        $to = settingValue('email');
        $fromemail = "support@controlpanda.com";
        $fromName = "Control Panda";
        $returnpath = "";
        $cc = "";
        $bcc = "";

//        $smtp = \DB::table("smtp_settings")->where("user_id", 1)->select('*')->first();

        $dd = DbModel::SendHTMLMail($to, $subject, $mailContents, $fromemail, $fromName, $returnpath, $cc, '', '');

        Alert::success('Success', 'You message is successfully submitted')->autoclose(3000);
        return redirect('/');
        //return view('frontend/contact_us');
        return view('frontend/index');
    }

    public function features() {

        return view('frontend/feature');
    }

    public function lead_management() {

        $packages = Packages::where('featured', 1)->where('is_active', 1)->get();

        $output = array(
            'packages' => $packages,
        );

        return view('frontend/lead_management')->with($output);
    }

    public function overview() {

        $testimonials = Testimonials::where('is_active', 1)->get();

        $output = array(
            'testimonials' => $testimonials,
        );

        return view('frontend/overview')->with($output);
    }

    public function sector() {

        return view('frontend/sectors');
    }

    public function privacy_policy() {

        return view('frontend/privacy_policy');
    }

    public function security_information() {

        return view('frontend/security_information');
    }

    public function terms_condition() {

        return view('frontend/terms_condition');
    }

    public function anti_spam_policy() {

        return view('frontend/anti_spam_policy');
    }

    public function unsubscribe($id) {

        $exist = \DB::table('news_letters')->where('id', $id)->first();

        if (count($exist) > 0) {

            \DB::table('news_letters')->where('id', $id)->delete();
            Alert::success('Your have successfully unsubsribed. You will not receive further emails.')->autoclose(3000);
        } else {

            Alert::error('You have already unscubscribed')->autoclose(3000);
        }

        return redirect('/');
    }

    public function help($slug) {

        $data['helparticle'] = \DB::table('help_articles')->select('users.profile_image', 'users.first_name', 'users.last_name', 'help_articles.*')
                ->join('users', 'users.id', '=', 'help_articles.user_id')
                ->where('help_articles.status', 1)
                ->where('help_articles.slug', $slug)
                ->get();

        return view('frontend/help')->with($data);
    }

    public function support() {

        if ($input = Input::all()) {
            $input = Input::all();

            $help_articles = \DB::table('help_articles')->select('users.profile_image', 'users.first_name', 'users.last_name', 'help_articles.*')
                    ->join('users', 'users.id', '=', 'help_articles.user_id')
                    ->where('help_articles.status', 1)->where('help_articles.question', 'like', '%' . $input['q'] . '%')->orWhere('help_articles.answer', 'like', '%' . $input['q'] . '%')->orWhere('help_articles.keywords', 'like', '%' . $input['q'] . '%')
                    ->get();

            $output = array(
                'help_articles' => $help_articles,
                'searchstring' => 'Search results for: ' . '<b style="color:#a74fc5;">' . $input['q'] . '</b>',
                'searchtext' => $input['q']
            );
        } else {
            $help_articles = \DB::table('help_articles')->select('users.profile_image', 'users.first_name', 'users.last_name', 'help_articles.*')
                    ->join('users', 'users.id', '=', 'help_articles.user_id')
                    ->where('help_articles.status', 1)
                    ->get();

            $output = array(
                'help_articles' => $help_articles,
            );
        }
        return view('frontend/support')->with($output);
    }

    public function supportreviews() {

        if ($input = Input::all()) {

            $input = Input::all();

            $help_articles = \DB::table('help_articles')->select('users.profile_image', 'users.first_name', 'users.last_name', 'help_articles.*')
                    ->join('users', 'users.id', '=', 'help_articles.user_id')
                    ->where('help_articles.status', 1)->where('help_articles.question', 'like', '%' . $input['q'] . '%')->orWhere('help_articles.answer', 'like', '%' . $input['q'] . '%')->orWhere('help_articles.keywords', 'like', '%' . $input['q'] . '%')
                    ->get();

            $output = array(
                'help_articles' => $help_articles,
                'searchstring' => 'Search results for: ' . '<b style="color:#a74fc5;">' . $input['q'] . '</b>',
                'searchtext' => $input['q']
            );
            return view('frontend/partial_support')->with($output);
        }
    }

    public function privacy() {
        return view('frontend/privacy');
    }

    public function terms() {
        return view('frontend/terms');
    }

    public function page($name) {
        $data['project'] = \DB::table('projects')->where('name', $name)->first();

        if (isset($data['project']->id)) {
            //check contacts limit
            $user_id = \DB::table('users_projects')->where('project_id', $data['project']->id)->first();

            $package = \DB::table('users as u')
                    ->leftJoin('package_orders as o', 'o.user_id', '=', 'u.id')
                    ->leftJoin('packages as p', 'p.id', '=', 'o.package_id')
                    ->select('p.cp_page_builder')
                    ->where('p.is_active', 1)
                    ->where('o.user_id', $user_id->user_id)
                    ->first();

            $no_of_leads = \DB::table('leads')
                    ->where('user_id', $user_id->user_id)
                    ->count('id');

            if ($package->cp_page_builder != 'unlimited' && $no_of_leads >= $package->cp_page_builder) {
                return redirect('page-not-found');
            }
            //end
        }


        $data['pages'] = \DB::table('pages')->where('name', 'index')->where('pageable_id', $data['project']->id)->where('pageable_type', 'Project')->first();
        $data['seo_data'] = \DB::table('pages_seo_settings')->where('page_name', 'index')->where('project_name', $name)->first();
        $data['tracking_codes'] = \DB::table('pages_tracking_codes')->where('page_name', 'index')->where('project_name', $name)->first();
        $data['email_lists'] = \DB::table('pages_email_lists')->where('page_name', 'index')->where('project_name', $name)->get();

        //echo'<pre>';print_r($data['email_lists']);exit();

        if (count($data['pages'])) {
            return view('frontend/page')->with($data);
        } else {
            return redirect('page-not-found');
        }
    }

    public function page2($name, $page) {
        $data['project'] = \DB::table('projects')->where('name', $name)->first();
        $data['pages'] = \DB::table('pages')->where('name', $page)->where('pageable_id', $data['project']->id)->where('pageable_type', 'Project')->first();

        $data['seo_data'] = \DB::table('pages_seo_settings')->where('page_name', $page)->where('project_name', $name)->first();
        $data['tracking_codes'] = \DB::table('pages_tracking_codes')->where('page_name', $page)->where('project_name', $name)->first();
        $data['email_lists'] = \DB::table('pages_email_lists')->where('page_name', 'index')->where('project_name', $name)->get();
        if (count($data['pages'])) {
            return view('frontend/page2')->with($data);
        } else {
            return redirect('page-not-found');
        }
    }

    public function walkthrough() {
        return view('frontend.walkthrough');
    }
    public function get_feedback($name){
        $project = $this->project->with('pages', 'users')->where('name', $name)->first();
        $data['project'] = $project;
        $data['name'] = $name;
        return view('frontend.feedback')->with($data);
    }
    public function view_feedbacks($name){
        $project = $this->project->with('pages', 'users')->where('name', $name)->first();
        $data['project'] = $project;
        $data['name'] = $name;
        return view('frontend.feedbacks')->with($data);
    }
    public function post_feedback(Request $request){
        $input = $request->all();
        $project = \DB::table('projects')->where('name', $input['project'])->first();
        $input['project_id'] = $project->id;
        unset($input['project']);
        unset($input['_token']);
        
        $input['updated_at'] = date('Y-m-d H:i:s');
        if($input['id']){
             \DB::table('feedbacks')->where('id', $input['id'])->update($input);
             $feedback = \DB::table('feedbacks')->where('id',$input['id'])->first();
             $input['created_at'] = $feedback->created_at;
             $insert_id =$input['id'];
        }else{
            $input['created_at'] = date('Y-m-d H:i:s');
            $insert_id = \DB::table('feedbacks')->insertGetId($input);
        }
       echo json_encode(array('id'=>$insert_id,'created_at'=>$input['created_at']));
       
    }
    public function remove_feedback(Request $request){
        $input = $request->all();
        \DB::table('feedbacks')->where('id',$input['id'])->delete();
    }
    public function one_feedback(Request $request){
        $input = $request->all();
        $feedback = \DB::table('feedbacks')->where('id',$input['id'])->first();
        echo json_encode($feedback);
    }
    public function getall_feedback(Request $request){
        $input = $request->all();
        $project = \DB::table('projects')->where('name', $input['project'])->first();
        $feedbacks = \DB::table('feedbacks')->where(['page'=>$input['page'],'project_id'=>$project->id,'client_id'=>$input['client_id']])->get();
        echo json_encode($feedbacks);
    }
    public function getall_site_feedback(Request $request){
        $input = $request->all();
        $user = \Auth::user();
        $project = \DB::table('projects')->select('projects.id', \DB::raw('(SELECT user_id FROM users_projects WHERE users_projects.project_id=projects.id LIMIT 1) AS user_id'))->where('name', $input['project'])->first();
        if($user->id == $project->user_id){
        $feedbacks = \DB::table('feedbacks')->where(['page'=>$input['page'],'project_id'=>$project->id])->get();
        echo json_encode($feedbacks);
        }else{
            echo json_encode(array());
        }
    }
    public function update_feedback(Request $request){
        $input = $request->all();
        unset($input['_token']);
        $input['updated_at'] = date('Y-m-d H:i:s');
        if($input['id']){
             \DB::table('feedbacks')->where('id', $input['id'])->update($input);
        }
       
    }
    public function resolve_feedback(Request $request){
        $input = $request->all();
        if($input['id']){
             \DB::table('feedbacks')->where('id', $input['id'])->update(['status'=>1,'updated_at'=>date('Y-m-d H:i:s')]);
        }
    }
    public function tempSupport(){
        $pathm = 'changer/chiropratic3/mobile/services.html';
        $pathd = 'changer/chiropratic3/desktop/services.html';
        $mHtml = $this->storage->get($pathm);
        $dHtml = $this->storage->get($pathd);


        $domm = new \DOMDocument();
        @$domm->loadHTML($mHtml);
        $xm = new \DOMXPath($domm);
        $i = 0;

        foreach($xm->query("//a|//abbr|//address|//area|//article|//aside|//audio|//b|//base|//bdi|//bdo|//blockquote|//body|//br|//button|//canvas|//caption|//cite|//code|//col|//colgroup|//command|//datalist|//dd|//del|//details|//dfn|//div|//dl|//dt|//em|//embed|//fieldset|//figcaption|//figure|//footer|//form|//h1|//h2|//h3|//h4|//h5|//h6|//head|//header|//hgroup|//hr|//html|//i|//iframe|//img|//input|//ins|//kbd|//keygen|//label|//legend|//li|//map|//mark|//menu|//meter|//nav|//noscript|//object|//ol|//optgroup|//option|//output|//p|//param|//pre|//progress|//q|//rp|//rt|//ruby|//s|//samp|//main|//section|//select|//small|//source|//span|//strong|//sub|//summary|//sup|//table|//tbody|//td|//textarea|//tfoot|//th|//thead|//time|//title|//tr|//track|//u|//ul|//var|//video|//wbr|//style|//script|//link|//meta") as $nodem)
        {   
            $nodem->setAttribute("data-item", $i);
            $i++;
        }
        $newHtml = $domm->saveHtml();
        $this->storage->put($pathm, $newHtml);


        $domd = new \DOMDocument();
        @$domd->loadHTML($dHtml);
        $xd = new \DOMXPath($domd);
        $i = 0;

        foreach($xm->query("//a|//abbr|//address|//area|//article|//aside|//audio|//b|//base|//bdi|//bdo|//blockquote|//body|//br|//button|//canvas|//caption|//cite|//code|//col|//colgroup|//command|//datalist|//dd|//del|//details|//dfn|//div|//dl|//dt|//em|//embed|//fieldset|//figcaption|//figure|//footer|//form|//h1|//h2|//h3|//h4|//h5|//h6|//head|//header|//hgroup|//hr|//html|//i|//iframe|//img|//input|//ins|//kbd|//keygen|//label|//legend|//li|//map|//mark|//menu|//meter|//nav|//noscript|//object|//ol|//optgroup|//option|//output|//p|//param|//pre|//progress|//q|//rp|//rt|//ruby|//s|//samp|//main|//section|//select|//small|//source|//span|//strong|//sub|//summary|//sup|//table|//tbody|//td|//textarea|//tfoot|//th|//thead|//time|//title|//tr|//track|//u|//ul|//var|//video|//wbr|//style|//script|//link|//meta") as $noded)
        {   
            $noded->setAttribute("data-item", $i);
            $i++;
        }
        $newHtml = $domd->saveHtml();
        $this->storage->put($pathd, $newHtml);
        $data_item = 27;
        
        preg_match_all('/<.*?data-item="'.$data_item.'".*?>(.*)<\/.*?>/i', $newHtml, $matches);
        echo '<pre>';
        header("Content-Type:text/plain");
        
        print_r($matches);
        exit;
       
    }

}
