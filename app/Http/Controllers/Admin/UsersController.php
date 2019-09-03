<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\DbModel;
use App\PackageOrders;
use App\Notifications;
use Illuminate\Http\Request;
use Socialite;
use Illuminate\Support\Facades\Validator;
use Auth;
use Alert;
use Image;
use Hash;
use File;
use View;
use Session;

class UsersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        not_permissions_redirect(have_premission(array(32)));
        $data['users'] = User::join('roles', 'roles.id', '=', 'users.role')->select('roles.title as role_name', 'users.*')->paginate(10);
        $data['total'] = User::join('roles', 'roles.id', '=', 'users.role')->select('roles.title as role_name', 'users.*')->count();
        return view('admin.users.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        not_permissions_redirect(have_premission(array(33)));
        $user = Auth::user();
        $data['action'] = "Add";
        $data['countries'] = \DB::table('countries')->get();
        $data['roles'] = \DB::table('roles')->where('id', '>=', $user->role)->where('is_active', 1)->get();
        return view('admin.users.edit')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        not_permissions_redirect(have_premission(array(34)));
        $data['user'] = User::findOrFail($id);
        
        $data['countries'] = \DB::table('countries')->get();
        $data['action'] = "Edit";
        $data['roles'] = \DB::table('roles')->where('is_active', 1)->get();
        return view('admin.users.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        $input = $request->all();
       
        if (isset($input['new_password'])) {
            $input['password'] = Hash::make($input['new_password']);
            $input['original_password'] = $input['new_password'];
        }
         
        if ($input['action'] == 'Add') {
            $user_data = User::select('id')->where('email', $input['email'])->first();
            if ($user_data) {
                Alert::error('Error Message', 'Email already exist for other user!')->autoclose(3000);
                return redirect('admin/users/create');
            }
        } else {
            $user_data = User::select('id')->where('email', $input['email'])->first();
            if ($input['id'] != $user_data['id']) {
                Alert::error('Error Message', 'Email already exist for other user!')->autoclose(3000);
                return redirect('admin/users/create');
            }
        }
        if ($input['action'] == 'Edit') {
            not_permissions_redirect(have_premission(array(34)));
            $User = User::findOrFail($input['id']);
            $res = $User->update($input);
            if($res){
                Alert::success('Success Message', 'User updated successfully!')->autoclose(3000);
            }else{
                Alert::error('Error Message', 'User cannot updated!')->autoclose(3000);
            }
        } else {
            not_permissions_redirect(have_premission(array(33)));
            $code_length = rand(20, 25);
            $unique_code = DbModel::unqiue_code($code_length);
            $input['unique_code'] = $unique_code;
            unset($input['action']);
            unset($input['new_password']);
            unset($input['confirm_password']);
           $User = User::create($input);
           $package = \DB::table('packages')->where('id', 1)->first();
            if ($package) {
                $input_package_order = array(
                    'package_id' => $package->id,
                    'user_id' => $User['id'],
                    'paid' => $package->price,
                    'package_title' => $package->title,
                    'start_date' => date('Y-m-d H:i:s'),
                    'is_active' => 1,
                    'renew_date' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'free_trial' => 1
                );
                $order_id = PackageOrders::create($input_package_order)->id;
            }
                 
            $template = \DB::table('email_templates')->where('template_type', 1)->where('email_type', 'signup')->first();
    

            if ($template != '') {

                $subject = $template->subject;
                $link = url("login");
                $to_replace = ['[FIRSTNAME]', '[LASTNAME]', '[EMAIL]', '[PASSWORD]', '[LINK]'];
                $with_replace = [$input['first_name'], $input['last_name'], $input['email'], $input['password'], $link];
                $html_body = '';
                $html_body .= str_replace($to_replace, $with_replace, $template->content);

                $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();

            } else {

                // send email
                $subject = 'ControlPanda Credentail Details';
                $link = url("login");
                $html_body = '';
                $html_body .= "Hi " . $input['first_name'] . " " . $input['last_name'] . " ! " . "<br />";
                $html_body .= 'Your account has been created successffuly. Follwing are your credential details:' . "<br />";
                $html_body .= "Email: " . $input['email'] . "<br />";
                $html_body .= "Password: " . $input['original_password'] . "<br />";
                $html_body .= '<br><br>';
                $html_body .= "Please login to continue: " . '<a href="' . $link . '"> ' . $link . ' </a>';
                $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
            }
            //echo $mailContents; exit;
            $to = $input['email'];
           
            $returnpath = "";
            $cc = "";
          // hardcoded 1 instead of $User->id 
            $smtp = \DB::table("smtp_settings")->where("user_id", 1)->select('from_name', 'from_email')->first();
            $dd = DbModel::SendHTMLMail($to, $subject, $mailContents, $smtp->from_email, $smtp->from_name, $returnpath, $cc);

      //      echo $dd;exit;
            Alert::success('Success Message', 'User added successfully!')->autoclose(3000);
        }

        if (have_premission(array(32))) {
            return redirect('admin/users');
        } else {
            return redirect('admin/dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        not_permissions_redirect(have_premission(array(35)));
        \DB::table('notification_users')->where('user_id', $id)->delete();
      //  \DB::table('templates')->where('user_id', $id)->delete();
        User::destroy($id);
        Alert::success('Success Message', 'User deleted!');
        return redirect('admin/users');
    }

    public function create_user() {
        echo Hash::make('123456');
    }

    public function account_details() {
        $user = Auth::user();
        $user_id = \Auth::User()->id;
        $data['user_sub_domain'] = Auth::user()->user_sub_domain;
        $data['user_sub_domain'] = explode('.', $data['user_sub_domain']);
        $data['user_sub_domain'] = $data['user_sub_domain'][0];
        $data['user_time_zone'] = Auth::user()->user_time_zone;
        $data['user_locale'] = Auth::user()->user_locale;
        $data['user_wordpress_api_key'] = Auth::user()->wordpress_api_key;
        $data['invoices'] = \DB::table('payments')->where('user_id', $user_id)->orderBy('id', 'desc')->paginate(10);
        $data['package'] = \DB::table('packages as p')
                ->leftJoin('package_orders as o', 'o.package_id', '=', 'p.id')
                ->where('o.user_id', $user_id)
                ->select('p.price', 'p.one_year_price', 'p.two_year_price', 'p.title', 'p.connect_domains')
                ->first();
        $data['gateway'] = \DB::table('payment_gateways')
                        ->where('user_id', $user_id)
                        ->where('is_default', 1)
                        ->select('gateway')->first();
        $data['user_info'] = \DB::table('users')
                        ->where('id', $user_id)
                        ->select('*')->first();
        $data['user'] = Auth::user();
        if (Auth::user()->role >1) {
            $data['payment'] = DbModel::current_package(Auth::user()->id);
            $data['packages'] = DbModel::user_packages(Auth::user()->id);
        }

        $data['gateway'] = (isset($data['gateway'])) ? $data['gateway']->gateway : '';


        $data['dial_package'] = \DB::table('panda_dials as d')
                ->leftJoin('panda_dials_orders as o', 'd.id', '=', 'o.package_id')
                ->where('o.user_id', $user_id)
                ->where('d.is_active', 1)
                ->where('o.is_active', 1)
                ->select('d.*', 'o.start_date', 'o.renew_date')
                ->first();

        $data['flow_package'] = \DB::table('panda_flows as p')
                ->leftJoin('panda_flows_orders as o', 'p.id', '=', 'o.package_id')
                ->where('o.user_id', $user_id)
                ->where('p.is_active', 1)
                ->where('o.is_active', 1)
                ->select('p.*', 'o.start_date', 'o.renew_date')
                ->first();

        $data['sms_package'] = \DB::table('panda_sms as p')
                ->leftJoin('panda_sms_orders as o', 'p.id', '=', 'o.package_id')
                ->where('o.user_id', $user_id)
                ->where('p.is_active', 1)
                ->where('o.is_active', 1)
                ->select('p.*', 'o.start_date', 'o.renew_date')
                ->first();

        $data['crm_package'] = \DB::table('panda_crms as p')
                ->leftJoin('panda_crms_orders as o', 'p.id', '=', 'o.package_id')
                ->where('o.user_id', $user_id)
                ->where('p.is_active', 1)
                ->where('o.is_active', 1)
                ->select('p.*', 'o.start_date', 'o.renew_date')
                ->first();

        $data['countries'] = \DB::table("countries")->get();
        $data['demos'] = \DB::table('premium_build_requests')->where('user_id',$user_id)->Orderby('id', 'DESC')->paginate(10);
        return view('admin.users.connection')->with($data);
    }

    public function account_details_view($id) {
        $data['demo'] = \DB::table('premium_build_requests')->select("premium_build_requests.*", \DB::raw("(SELECT CONCAT(u.first_name,' ',u.last_name) FROM users AS u WHERE u.id = premium_build_requests.user_id) AS user_name"))->where('id',$id)->first();

        return view('admin.users.connection')->with($data);
    }
    
    public function my_profile() {
        $data['user'] = Auth::user();
        $data['countries'] = \DB::table('countries')->get();
        if (Auth::user()->role >1) {
            $data['payment'] = DbModel::current_package(Auth::user()->id);
            $data['packages'] = DbModel::user_packages(Auth::user()->id);
        }
        return view('admin.users.my_profile')->with($data);
    }

    public function get_auth() {
        $data['user'] = Auth::user();
        echo json_encode($data);
    }

    public function update_wordpressapikey(Request $request) {
        $user = Auth::user();
        $input = $request->all();
        $user->update($input);
        Alert::success('Success Message', 'Your ControlPanda Wordpress API key updated successfully!')->autoclose(3000);
        return redirect('admin/account-details?ref=wordpressapikey');
    }

    public function update_clickfunneldomain(Request $request) {
        $user = Auth::user();
        $input = $request->all();
        $user->update($input);
        Alert::success('Success Message', 'Your ControlPanda SubDomain updated successfully!')->autoclose(3000);
        return redirect('admin/account-details?ref=controlpandasubdomain');
    }

    public function update_timezonelocale(Request $request) {
        $user = Auth::user();
        $input = $request->all();
        $user->update($input);
        Alert::success('Success Message', 'Your ControlPanda Time Zone and Locale updated successfully!')->autoclose(3000);
        return redirect('admin/account-details?ref=TimezoneandLanguageSettings');
    }

    public function update_profile(Request $request) {
        $user = Auth::user();

        $old_image = $user->profile_image;
        $input = $request->all();
        $user->update($input);
        if ($request->hasFile('profile_image')) {
            $destinationPath = 'uploads/users'; // upload path
            $image = $request->file('profile_image'); // file
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $fileName = $user->id . '-' . time() . '.' . $extension; // renameing image
            $image->move($destinationPath, $fileName); // uploading file to given path
            $image = Image::make(sprintf($destinationPath . '/%s', $fileName))->resize(300, 300)->save();
            //remove old image
            if ($old_image) {
                File::delete($destinationPath . '/' . $old_image);
            }
            //insert image record            
            $user_image['profile_image'] = $fileName;
            $user->update($user_image);
        }
        Alert::success('Success Message', 'Your profile information updated successfully!')->autoclose(3000);
        if(isset($_POST['return_url'])){
            return redirect($_POST['return_url']);
        }else{
            return redirect('admin/my-profile');
        }
    }

    public function update_password(Request $request) {
        $input = $request->all();
        $user = Auth::user();
        if ($input['current_password'] != $user['original_password']) {
            Alert::error('Error Message', 'Please enter correct password!')->autoclose(3000);
            if(isset($_POST['return_url'])){
                return redirect($_POST['return_url']);
            }else{
                return redirect('admin/my-profile?action=password');
            }
        } else {
            $insertion_array = array('password' => Hash::make($input['new_password']), 'original_password' => $input['new_password']);
            $user->update($insertion_array);
            Alert::success('Success Message', 'Your password updated successfully!')->autoclose(3000);
            if(isset($_POST['return_url'])){
                return redirect($_POST['return_url']);
            }else{
                return redirect('admin/my-profile?action=password');
            }
            
        }
    }

    public function update_authentication(Request $request) {
        $input = $request->all();
        $user = Auth::user();
        $insertion_array = array('unique_code' => $input['unique_code']);
        $user->update($insertion_array);
        Alert::success('Success Message', 'Your auth key updated successfully!')->autoclose(3000);
        return redirect('admin/my-profile?action=authentication');
    }

    public function set_prefrences(Request $request) {
        $user = Auth::user();
        $input = $request->all();
        $user->update($input);
    }

    public function update_paypal_details(Request $request) {

        $input = $request->only('paypal_email');
        $user = User::find(Auth::user()->id);
        $user->update($input);
        Alert::success('Success Message', 'Your Paypal details have been updated Successfully!')->autoclose(3000);
        return redirect()->back();
    }

    public function update_card_details(Request $request) {

        $input = array(
            'cc_number' => $request->cc_number,
            'cc_exp_year' => $request->cc_exp_year,
            'cc_exp_month' => $request->cc_exp_month,
            'cc_cvv' => $request->cc_cvv,
        );
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $request->cc_number)){
            unset($input['cc_number']);
        }
        $user = User::find(Auth::user()->id);
        $user->update($input);
        Alert::success('Success Message', 'Your credit card details have been updated Successfully!')->autoclose(3000);
        return redirect()->back();
    }

    public function showRegistrationForm(Request $request, $id, $name) {
        

        $user = Auth::user();
        if ($user != '') {
            return redirect('admin/dashboard');
        }
        $data['package_id'] = $id;
        $data['package_name'] = ucwords($name);
        $request->session()->put('package_id', $id);
        return view('auth/register')->with($data);
    }

    public function post_register(Request $request) {

        $input = $request->all();
        $exist = array();

        $exist = User::Where('email', $input['email'])->first();
        if ($exist <> '') {
            $order_email = PackageOrders::Where('user_id', $exist->id)->first();
        }

        if ($exist <> '') {
            $msg = "Email you entered already exist for a user.";
            Session::flash("error", $msg);
            return redirect()->back()->withInput();
        }
        if ($exist <> '') {
            if ($order_email > 0) {
                $msg = "You have already requested for a free trial.";
                Session::flash("error", $msg);
                return redirect('signup')->withInput();
            }
        }
        if (isset($input['formtype']) && $input['formtype'] == 'stripe') {
            $datas = array(
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'original_password' => $input['password'],
                'role' => 2,
                'is_active' => 1,
                'cc_number' => $input['cc_number'],
                'cc_exp_month' => $input['cc_exp_month'],
                'cc_exp_year' => $input['cc_exp_year'],
                'cc_cvv' => $input['cc_cvv']
            );
        } elseif(isset($input['formtype']) && $input['formtype'] == 'paypal') {
            $datas = array(
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'role' => 2,
                'is_active' => 1,
                'original_password' => $input['password'],
                'paypal_email' => $input['paypal_email']
            );
        }else{
            $datas = array(
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'role' => 2,
                'is_active' => 1,
                'original_password' => $input['password']
            );
        }
        $user_id = User::create($datas);
        $user_id = User::Where('email', $input['email'])->first();
        $package = \DB::table('packages')->where('id', $input['package_id'])->first();
        if ($package) {
            $p_input = array(
                'package_id' => $package->id,
                'user_id' => $user_id->id,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'paid' => 0.00,
                'free_trial' => 1
            );{
            $template = \DB::table('email_templates')->where('template_type', 1)->where('email_type', 'signup')->first();
            if ($template != '') {
                $subject = $template->subject;
                $link = url("login");
                $to_replace = ['[FIRSTNAME]', '[LASTNAME]', '[EMAIL]', '[PASSWORD]', '[LINK]'];
                $with_replace = [$input['first_name'], $input['last_name'], $input['email'], $input['password'], $link];
                $html_body = '';
                $html_body .= str_replace($to_replace, $with_replace, $template->content);
                $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
            } else {
                // send email
                $subject = 'ControlPanda Credentail Details';
                $link = url("login");
                $html_body = '';
                $html_body .= "Hi " . $input['first_name'] . " " . $input['last_name'] . " ! " . "<br />";
                $html_body .= 'Your account has been created successffuly. Follwing are your credential details:' . "<br />";
                $html_body .= "Email: " . $input['email'] . "<br />";
                $html_body .= "Password: " . $input['original_password'] . "<br />";
                $html_body .= '<br><br>';
                $html_body .= "Please login to continue: " . '<a href="' . $link . '"> ' . $link . ' </a>';
                $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
            }
            $to = $input['email'];
            $returnpath = "";
            $cc = "";
          // hardcoded 1 instead of $User->id 
            $smtp = \DB::table("smtp_settings")->where("user_id", 1)->select('from_name', 'from_email')->first();
            $dd = DbModel::SendHTMLMail($to, $subject, $mailContents, $smtp->from_email, $smtp->from_name, $returnpath, $cc);
        }
            
            $order_id = \DB::table('package_orders')->insertGetId($p_input);
            if ($order_id != '') {
                $user = User::Where('role', 1)->first();
                // Add Notification
                $notification_details = array(
                    'type' => 'new_signup',
                    'title' => 'New Signup',
                    'user_email' => $_POST['email'],
                    'package_title' => $package->title,
                    'package_id' => $package->id,
                    'order_id' => $order_id,
                );
               
                $notification_id = Notifications::create($notification_details)->id;
                $notification_users = Notifications::add_users($notification_id, $user->id);                
                Auth::login($user_id, true);
                return redirect('admin/dashboard-login');
                exit;
            }
        } else {
            $msg = "You can not signup because there in no free trial available.";
            Session::flash("error", $msg);
            return redirect()->back();
        }
    }
    public function redirectToProvider($type) {
        Session::put("signup_type", $type);
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback(Request $request) {
        $user = Auth::user();
        $user = Socialite::driver('facebook')->stateless()->user();
        $id = $user->getId();
        $name = $user->getName();
        $email = $user->getEmail();
        $avatar_url = $user->avatar;
        $gender = isset($user['gender']) ? $user['gender'] : "male";
        $name_array = explode(" ", $name, 2);
        $firstName = $name_array[0];
        $lastName = $name_array[1];
        $exist = User::Where('email', $email)->first();
        if(isset($exist) || !empty($exist)){
            if($exist->is_active == 1){
                Auth::login($exist, true);
                return redirect('admin/dashboard-login');
                exit;
            }
        }else{
            $user_info = array(
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );
            $insert_user = \DB::table('users')->insertGetId($user_info);
            $package = \DB::table('packages')->where('id', 1)->first();
            if ($package) {
                $input = array(
                    'package_id' => $package->id,
                    'user_id' => $insert_user,
                    'paid' => $package->price,
                    'package_title' => $package->title,
                    'start_date' => date('Y-m-d H:i:s'),
                    'is_active' => 1,
                    'renew_date' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'free_trial' => 1
                );
                $order_id = PackageOrders::create($input)->id;
                if ($order_id != '') {
                    // Add Notification
                    $notification_details = array(
                        'type' => 'new_signup',
                        'title' => 'New Signup',
                        'package_title' => $package->title,
                        'user_email' => $email,
                        'package_id' => $package->id,
                        'order_id' => $order_id,
                    );
                    $notification_id = Notifications::create($notification_details)->id;
                    $notification_users = Notifications::add_users($notification_id, $insert_user);
                }
            }
            if($insert_user) {
                $usr = User::Where('id', $insert_user)->first();
                Auth::login($usr, true);
                return redirect('admin/dashboard-login');
                exit;
            }
            return redirect('signup');
            exit;
        }
    }

    public function redirectToProviderGoogle($type) {
        Session::put("signup_type", $type);
        return Socialite::driver('google')->redirect();
    }
 
    public function handleProviderCallbackGoogle(Request $request) {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            if ($user->getEmail() != null) {
                $email = $user->getEmail();
                $firstName = $user["name"]["givenName"];
                $lastName = $user["name"]["familyName"];
                $gender = isset($user["gender"]) ? $user["gender"] : "male";
                $image = $user->avatar;
                $exist = User::Where('email', $email)->first();
                if(isset($exist) || !empty($exist)){
                    if($exist->is_active == 1){
                        Auth::login($exist, true);
                        return redirect('admin/dashboard-login');
                        exit;
                    }
                }else{
                    $user_info = array(
                        'first_name' => $firstName,
                        'last_name' => $lastName,
                        'email' => $email,
                        'is_active' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    );
                    $insert_user = \DB::table('users')->insertGetId($user_info);
                    $package = \DB::table('packages')->where('id', 1)->first();
                    if ($package) {
                        $input = array(
                            'package_id' => $package->id,
                            'user_id' => $insert_user,
                            'paid' => $package->price,
                            'package_title' => $package->title,
                            'start_date' => date('Y-m-d H:i:s'),
                            'is_active' => 1,
                            'renew_date' => date('Y-m-d H:i:s'),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                            'free_trial' => 1
                        );
                        $order_id = PackageOrders::create($input)->id;
                        if ($order_id != '') {
                            // Add Notification
                            $notification_details = array(
                                'type' => 'new_signup',
                                'title' => 'New Signup',
                                'user_email' => $email,
                                'package_title' => $package->title,
                                'start_date' => date('Y-m-d H:i:s'),
                                'renew_date' => date('Y-m-d H:i:s'),
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                                'package_id' => $package->id,
                                'order_id' => $order_id,
                            );
                            $notification_id = Notifications::create($notification_details)->id;
                            $notification_users = Notifications::add_users($notification_id, $insert_user);
                        }
                    }
                    if($insert_user) {
                        $usr = User::Where('id', $insert_user)->first();
                        Auth::login($usr, true);
                        return redirect('admin/dashboard-login');
                        exit;
                    }
                    return redirect('signup');
                    exit;
                }
            }
        } catch (\Exception $ex) {
            dd($ex);
            return redirect("/");
        }
    }

    public function redirectToProviderLinkedin($type) {
        Session::put("signup_type", $type);
        return Socialite::driver('linkedin')->redirect();
    }

    public function handleProviderCallbackLinkedin(Request $request) {
        try {
            $user = Socialite::driver('linkedin')->stateless()->user();
            if ($user["emailAddress"] != null) {
                $email = $user["emailAddress"];
                $firstName = $user["firstName"];
                $lastName = $user["lastName"];
                $exist = User::Where('email', $email)->first();
                if(isset($exist) || !empty($exist)){
                    if($exist->is_active == 1){
                        Auth::login($exist, true);
                        return redirect('admin/dashboard-login');
                        exit;
                    }
                }else{

                    $user_info = array(
                        'first_name' => $firstName,
                        'last_name' => $lastName,
                        'email' => $email,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    );
                    $insert_user = \DB::table('users')->insertGetId($user_info);
                    $package = \DB::table('packages')->where('id', 1)->first();
                    if ($package) {
                        $input = array(
                            'package_id' => $package->id,
                            'user_id' => $insert_user,
                            'paid' => $package->price,
                            'package_title' => $package->title,
                            'start_date' => date('Y-m-d H:i:s'),
                            'is_active' => 1,
                            'renew_date' => date('Y-m-d H:i:s'),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                            'free_trial' => 1
                        );
                        $order_id = PackageOrders::create($input)->id;
                        if ($order_id != '') {
                            // Add Notification
                            $notification_details = array(
                                'type' => 'new_signup',
                                'title' => 'New Signup',
                                'user_email' => $email,
                                'package_title' => $package->title,
                                'package_id' => $package->id,
                                'order_id' => $order_id,
                            );
                            $notification_id = Notifications::create($notification_details)->id;
                            $notification_users = Notifications::add_users($notification_id, $insert_user);
                        }
                    }
                    if($insert_user) {
                        $usr = User::Where('id', $insert_user)->first();
                        Auth::login($usr, true);
                        return redirect('admin/dashboard-login');
                        exit;
                    }
                    return redirect('signup');
                    exit;
                }
            }
        } catch (Exception $ex) {
            dd($ex);
            return redirect("/");
        }
    }

}
