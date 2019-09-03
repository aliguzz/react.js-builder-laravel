<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DbModel;
use Session;
use Auth;
use Redirect;
use PayPal;
use Alert;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;

class DashboardController extends Controller {

    /**
     * Display a dashboard.
     *
     * @return \Illuminate\View\View
     */
	 
    private $_apiContext;

    public function __construct() {
        $paypal = new \Netshell\Paypal\Paypal;
        $this->_apiContext = $paypal->ApiContext(
                config('services.paypal.client_id'), config('services.paypal.secret'));

        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'service.EndPoint' => 'https://api.sandbox.paypal.com',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE'
        ));
    }
	
	
    public function index(Request $request) {
		//echo 'hello'; exit;
                $data = array();
		$id = Auth::User()->id;
		
        $data['package_id'] = \DB::table('package_orders')
                                 ->where('user_id', $id)
                                 ->where('free_trial', 1)
                                 ->select('package_id')
                                 ->first();

        $data['last_project'] = \DB::table('projects')
                        ->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')
                        ->leftJoin('domains', 'domains.project_id', '=', 'projects.id')
                        ->leftJoin('package_orders', 'package_orders.user_id', '=', 'users_projects.user_id')
                        ->leftJoin('packages', 'packages.id', '=', 'package_orders.package_id')
                        ->select('projects.*', \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'),'domains.name as domain_name', 'packages.title as package_title')
						->orderBy('projects.id', 'desc')
						->where('users_projects.user_id', Auth::user()->id)
						->where('users_projects.notlist', 0)
						->limit(1)->get();
        
        
        //$_SESSION['session_last_project'] = $data['last_project'];
        Session::put('session_last_project', $data['last_project']);
		$data['user'] = Auth::User();			
		$data['domains'] = \DB::table('domains')->select('id','name')->where(['user_id' => Auth::user()->id, 'project_id' => 0])->get();
		
        return view('admin.dashboard')->with($data);
    }
	
	public function my_packages() {
        $data    = array();
		$user_id = Auth::User()->id;   
		
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
					 
        return view('admin.my_packages')->with($data);
    }
	
	public function payment_history($type='') {
        $data    = array();
		$user_id = Auth::User()->id;
		
		$data['rows'] = \DB::table(str_replace('-', '_', $type).'_payments')
					 ->where('user_id', $user_id)
					 ->orderBy('id', 'DESC')
					 ->paginate(10);
					 
		 
        return view('admin.payment_history')->with($data);
    }
	
	public function upgrade_account() {
        $data = array();
		$id = Auth::User()->id;
		$data['package_id'] = \DB::table('package_orders')
			->where('user_id', $id)
			->where('free_trial', 1)
			->select('package_id')
			->first();
		$data['packages'] = \DB::table('packages')
			->where('is_active', 1)
			->get();
			
        return view('admin.upgrade_account')->with($data);
    }
	
	public function renew_account_membership_by_cron(Request $request) {
     
	    $data = array();
		
		ini_set('max_execution_time', 0);
		//ini_set('memory_limit','-1');
		
		$userlist = \DB::table('users as u')
					 ->leftJoin('package_orders as o', 'o.user_id', '=', 'u.id')
					 ->leftJoin('packages as p', 'p.id', '=', 'o.package_id')
					 ->leftJoin('payment_gateways as g', 'u.id', '=', 'g.user_id')
					 ->where('g.is_default', 1)
					 ->where('u.is_active', 1)
					 ->where('p.is_active', 1)
					 ->where('o.is_active', 1)
					 ->where('o.renew_date', '<=', date('Y-m-d H:i:s'))
					 ->select('u.email', 'u.id as user_id', 'u.first_name', 'u.last_name', 'g.gateway', 'g.creditcard_holder', 'g.creditcard_no', 'g.creditcard_expiry_month', 'g.creditcard_expiry_year', 'g.creditcard_cvv', 'p.id as package_id', 'p.price', 'p.one_year_price', 'p.two_year_price')
					 ->get();
					 
		
	 	//echo date('Y-m-d H:i:s')."<pre>";print_r($userlist);die;
	    
		foreach ($userlist as $list) 
		{
	
			   if($list->creditcard_no == '' || $list->creditcard_no == "''" )
			   	   continue;	
			   
			   if($list->gateway == 'stripe')
			   {
				   $stripe = Stripe::make(env('STRIPE_SECRET'));
			   	
				   $token = '';
					
					try {
					$token = $stripe->tokens()->create([
						'card' => [
							'number' => $list->creditcard_no,
							'exp_month' => $list->creditcard_expiry_month,
							'exp_year' => $list->creditcard_expiry_year,
							'cvc' => $list->creditcard_cvv,
						],
					]);
		
					if (!isset($token['id'])) {
						echo 'Token Not generated for stripe payment';
						exit();
					}
		
					$charge = $stripe->charges()->create([
						'card' => $token['id'],
						'currency' => 'USD',
						'amount' => $list->price,
						'description' => 'Pay for membership package',
					]);
		
					if ($charge['status'] == 'succeeded') {
						
						$insertion_array = array(
								'user_id' => $list->user_id,
								'package_id' => $list->package_id,
								'payment_type' => 'Stripe',
								'amount_paid' =>$list->price,
								'card_no' => substr_replace($list->creditcard_no, str_repeat("*", 8), 4, 8),
								'paypal_email' => '',
								'payment_status' => 'success',
								'payment_id' => '',
								'payment_datetime' => date('Y-m-d H:i:s'),
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
								);
						
						\DB::table('payments')->insert($insertion_array);
						
						$cur_time = time();
						
						 \DB::table('package_orders')
						 ->where('user_id', $list->user_id)
						 ->update([
								'package_id'=>$list->package_id,
								'paid'=>$list->price,
								'start_date' => date('Y-m-d H:i:s'),
								'renew_date' => date('Y-m-d H:i:s', strtotime('+30 days', $cur_time)),
								]);
								
						\DB::table('users')
						 ->where('id', $list->user_id)
						 ->update([
								'pkg_renew_date' => date('Y-m-d H:i:s', strtotime('+30 days', $cur_time)),
								]);
						
						echo 'Success';die;
						
					} else {
						
					}
					} catch (Exception $e) {
						echo ($e);die;
					} catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
						echo ($e);die;
					} catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
						echo ($e);die;
					}
			   }
			   
			   
		}
			
					
		

    }
	
	public function renew_panda_dials_membership_by_cron(Request $request) {
     
	    $data = array();
		
		ini_set('max_execution_time', 0);
		
		$userlist = \DB::table('users as u')
					 ->leftJoin('panda_dials_orders as o', 'o.user_id', '=', 'u.id')
					 ->leftJoin('panda_dials as p', 'p.id', '=', 'o.package_id')
					  ->leftJoin('payment_gateways as g', 'u.id', '=', 'g.user_id')
					 ->where('g.is_default', 1)
					 ->where('u.is_active', 1)
					 ->where('p.is_active', 1)
					 ->where('o.is_active', 1)
					 ->where('o.renew_date', '<=', date('Y-m-d H:i:s'))
					 ->select('u.email', 'u.id as user_id', 'u.first_name', 'u.last_name', 'g.gateway', 'g.creditcard_holder', 'g.creditcard_no', 'g.creditcard_expiry_month', 'g.creditcard_expiry_year', 'g.creditcard_cvv', 'p.id as package_id', 'p.price', 'p.one_year_price', 'p.two_year_price')
					 ->get();
			
		
	    //echo date('Y-m-d H:i:s')."<pre>";print_r($userlist);die;
	    
		foreach ($userlist as $list) 
		{
			
			   if($list->creditcard_no == '' || $list->creditcard_no == "''")
			   	   continue;	
			   
			   if($list->gateway == 'stripe')
			   {
				   $stripe = Stripe::make(env('STRIPE_SECRET'));
				   
				   $token = '';
				
					try {
					$token = $stripe->tokens()->create([
						'card' => [
							'number' => $list->creditcard_no,
							'exp_month' => $list->creditcard_expiry_month,
							'exp_year' => $list->creditcard_expiry_year,
							'cvc' => $list->creditcard_cvv,
						],
					]);
		
					if (!isset($token['id'])) {
						echo 'Token Not generated for stripe payment';
						exit();
					}
		
					$charge = $stripe->charges()->create([
						'card' => $token['id'],
						'currency' => 'USD',
						'amount' => $list->price,
						'description' => 'Pay for membership package',
					]);
		
					if ($charge['status'] == 'succeeded') {
						
						$insertion_array = array(
								'user_id' => $list->user_id,
								'package_id' => $list->package_id,
								'payment_type' => 'Stripe',
								'payment_amount' => $list->price,
								'card_no' => substr_replace($list->creditcard_no, str_repeat("*", 8), 4, 8),
								'paypal_email' => '',
								'payment_status' => 'success',
								'payment_id' => '',
								'payment_datetime' => date('Y-m-d H:i:s'),
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
								);
						
						\DB::table('panda_dials_payments')->insert($insertion_array);
						
						$cur_time = time();
						
						 \DB::table('panda_dials_orders')
						 ->where('user_id', $list->user_id)
						 ->update([
								'package_id'=>$list->package_id,
								'paid'=>$list->price,
								'start_date' => date('Y-m-d H:i:s'),
								'renew_date' => date('Y-m-d H:i:s', strtotime('+30 days', $cur_time)),
								]);
								
						
						echo 'Success';die;
						
					} else {
						
					}
					} catch (Exception $e) {
						echo ($e);die;
					} catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
						echo ($e);die;
					} catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
						echo ($e);die;
					}
			   }
			   			
			    
		}
			
					
		

    }
	
	public function renew_panda_sms_membership_by_cron(Request $request) {
     
	    $data = array();
		
		ini_set('max_execution_time', 0);
		
		$userlist = \DB::table('users as u')
					 ->leftJoin('panda_sms_orders as o', 'o.user_id', '=', 'u.id')
					 ->leftJoin('panda_sms as p', 'p.id', '=', 'o.package_id')
					 ->leftJoin('payment_gateways as g', 'u.id', '=', 'g.user_id')
					 ->where('g.is_default', 1)
					 ->where('u.is_active', 1)
					 ->where('p.is_active', 1)
					 ->where('o.is_active', 1)
					 ->where('o.renew_date', '<=', date('Y-m-d H:i:s'))
					 ->select('u.email', 'u.id as user_id', 'u.first_name', 'u.last_name', 'g.gateway', 'g.creditcard_holder', 'g.creditcard_no', 'g.creditcard_expiry_month', 'g.creditcard_expiry_year', 'g.creditcard_cvv', 'p.id as package_id', 'p.price', 'p.one_year_price', 'p.two_year_price')
					 ->get();
	 
	    //echo date('Y-m-d H:i:s')."<pre>";print_r($userlist);die;
	    
		foreach ($userlist as $list) 
		{
			
			   if($list->creditcard_no == '' || $list->creditcard_no == "''")
			   	   continue;	
				
			   if($list->gateway == 'stripe')
			   {
				   $stripe = Stripe::make(env('STRIPE_SECRET'));
				   
				   $token = '';
				
					try {
					$token = $stripe->tokens()->create([
						'card' => [
							'number' => $list->creditcard_no,
							'exp_month' => $list->creditcard_expiry_month,
							'exp_year' => $list->creditcard_expiry_year,
							'cvc' => $list->creditcard_cvv,
						],
					]);
		
					if (!isset($token['id'])) {
						echo 'Token Not generated for stripe payment';
						exit();
					}
		
					$charge = $stripe->charges()->create([
						'card' => $token['id'],
						'currency' => 'USD',
						'amount' => $list->price,
						'description' => 'Pay for membership package',
					]);
		
					if ($charge['status'] == 'succeeded') {
						
						$insertion_array = array(
								'user_id' => $list->user_id,
								'package_id' => $list->package_id,
								'payment_type' => 'Stripe',
								'payment_amount' => $list->price,
								'card_no' => substr_replace($list->creditcard_no, str_repeat("*", 8), 4, 8),
								'paypal_email' => '',
								'payment_status' => 'success',
								'payment_id' => '',
								'payment_datetime' => date('Y-m-d H:i:s'),
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
								);
						
						\DB::table('panda_sms_payments')->insert($insertion_array);
						
						$cur_time = time();
						
						 \DB::table('panda_sms_orders')
						 ->where('user_id', $list->user_id)
						 ->update([
								'package_id'=>$list->package_id,
								'paid'=>$list->price,
								'start_date' => date('Y-m-d H:i:s'),
								'renew_date' => date('Y-m-d H:i:s', strtotime('+30 days', $cur_time)),
								]);
								
						
						echo 'Success';die;
						
					} else {
						
					}
					} catch (Exception $e) {
						echo ($e);die;
					} catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
						echo ($e);die;
					} catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
						echo ($e);die;
					}
			   }
			    
		}
			
					
		

    }
	
	public function renew_panda_crm_membership_by_cron(Request $request) {
     
	    $data = array();
		
		ini_set('max_execution_time', 0);
		
		$userlist = \DB::table('users as u')
					 ->leftJoin('panda_crms_orders as o', 'o.user_id', '=', 'u.id')
					 ->leftJoin('panda_crms as p', 'p.id', '=', 'o.package_id')
					 ->leftJoin('payment_gateways as g', 'u.id', '=', 'g.user_id')
					 ->where('g.is_default', 1)
					 ->where('u.is_active', 1)
					 ->where('p.is_active', 1)
					 ->where('o.is_active', 1)
					 ->where('o.renew_date', '<=', date('Y-m-d H:i:s'))
					 ->select('u.email', 'u.id as user_id', 'u.first_name', 'u.last_name', 'g.gateway', 'g.creditcard_holder', 'g.creditcard_no', 'g.creditcard_expiry_month', 'g.creditcard_expiry_year', 'g.creditcard_cvv', 'p.id as package_id', 'p.price', 'p.one_year_price', 'p.two_year_price')
					 ->get();
			
	 
	    //echo date('Y-m-d H:i:s')."<pre>";print_r($userlist);die;
	    
		foreach ($userlist as $list) 
		{
			
			   if($list->creditcard_no == '' || $list->creditcard_no == "''")
			   	   continue;	
			   
			   if($list->gateway == 'stripe')
			   {
				   $stripe = Stripe::make(env('STRIPE_SECRET'));
				   
				    $token = '';
				
					try {
					$token = $stripe->tokens()->create([
						'card' => [
							'number' => $list->creditcard_no,
							'exp_month' => $list->creditcard_expiry_month,
							'exp_year' => $list->creditcard_expiry_year,
							'cvc' => $list->creditcard_cvv,
						],
					]);
		
					if (!isset($token['id'])) {
						echo 'Token Not generated for stripe payment';
						exit();
					}
		
					$charge = $stripe->charges()->create([
						'card' => $token['id'],
						'currency' => 'USD',
						'amount' => $list->price,
						'description' => 'Pay for membership package',
					]);
		
					if ($charge['status'] == 'succeeded') {
						
						$insertion_array = array(
								'user_id' => $list->user_id,
								'package_id' => $list->package_id,
								'payment_type' => 'Stripe',
								'payment_amount' => $list->price,
								'card_no' => substr_replace($list->creditcard_no, str_repeat("*", 8), 4, 8),
								'paypal_email' => '',
								'payment_status' => 'success',
								'payment_id' => '',
								'payment_datetime' => date('Y-m-d H:i:s'),
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
								);
						
						\DB::table('panda_crms_payments')->insert($insertion_array);
						
						$cur_time = time();
						
						 \DB::table('panda_crms_orders')
						 ->where('user_id', $list->user_id)
						 ->update([
								'package_id'=>$list->package_id,
								'paid'=>$list->price,
								'start_date' => date('Y-m-d H:i:s'),
								'renew_date' => date('Y-m-d H:i:s', strtotime('+30 days', $cur_time)),
								]);
								
						
						echo 'Success';die;
						
					} else {
						
					}
					} catch (Exception $e) {
						echo ($e);die;
					} catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
						echo ($e);die;
					} catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
						echo ($e);die;
					}
			   }
			    	
			   
		}
			
					
		

    }
	
	public function renew_panda_flow_membership_by_cron(Request $request) {
     
	    $data = array();
		
		ini_set('max_execution_time', 0);
		
		$userlist = \DB::table('users as u')
					 ->leftJoin('panda_flows_orders as o', 'o.user_id', '=', 'u.id')
					 ->leftJoin('panda_flows as p', 'p.id', '=', 'o.package_id')
					 ->leftJoin('payment_gateways as g', 'u.id', '=', 'g.user_id')
					 ->where('g.is_default', 1)
					 ->where('u.is_active', 1)
					 ->where('p.is_active', 1)
					 ->where('o.is_active', 1)
					 ->where('o.renew_date', '<=', date('Y-m-d H:i:s'))
					 ->select('u.email', 'u.id as user_id', 'u.first_name', 'u.last_name', 'g.gateway', 'g.creditcard_holder', 'g.creditcard_no', 'g.creditcard_expiry_month', 'g.creditcard_expiry_year', 'g.creditcard_cvv', 'p.id as package_id', 'p.price', 'p.one_year_price', 'p.two_year_price')
					 ->get();
			
		
	    //echo date('Y-m-d H:i:s')."<pre>";print_r($userlist);die;
	    
		foreach ($userlist as $list) 
		{
			
			   if($list->creditcard_no == '' || $list->creditcard_no == "''")
			   	   continue;	
				
			   if($list->gateway == 'stripe')
			   {
				   $stripe = Stripe::make(env('STRIPE_SECRET'));
				   
				    $token = '';
				
					try {
					$token = $stripe->tokens()->create([
						'card' => [
							'number' => $list->creditcard_no,
							'exp_month' => $list->creditcard_expiry_month,
							'exp_year' => $list->creditcard_expiry_year,
							'cvc' => $list->creditcard_cvv,
						],
					]);
		
					if (!isset($token['id'])) {
						echo 'Token Not generated for stripe payment';
						exit();
					}
		
					$charge = $stripe->charges()->create([
						'card' => $token['id'],
						'currency' => 'USD',
						'amount' => $list->price,
						'description' => 'Pay for membership package',
					]);
		
					if ($charge['status'] == 'succeeded') {
						
						$insertion_array = array(
							'user_id' => $list->user_id,
							'package_id' => $list->package_id,
							'payment_type' => 'Stripe',
							'payment_amount' => $list->price,
							'card_no' => substr_replace($list->creditcard_no, str_repeat("*", 8), 4, 8),
							'paypal_email' => '',
							'payment_status' => 'success',
							'payment_id' => '',
							'payment_datetime' => date('Y-m-d H:i:s'),
							'created_at' => date('Y-m-d H:i:s'),
							'updated_at' => date('Y-m-d H:i:s')
							);
						
						\DB::table('panda_flows_payments')->insert($insertion_array);
						
						$cur_time = time();
						
						 \DB::table('panda_flows_orders')
						 ->where('user_id', $list->user_id)
						 ->update([
								'package_id'=>$list->package_id,
								'paid'=>$list->price,
								'start_date' => date('Y-m-d H:i:s'),
								'renew_date' => date('Y-m-d H:i:s', strtotime('+30 days', $cur_time)),
								]);
								
						
						echo 'Success';die;
						
					} else {
						
					}
					} catch (Exception $e) {
						echo ($e);die;
					} catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
						echo ($e);die;
					} catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
						echo ($e);die;
					}
			   }
		}
    }
	
    
    public function payment_method($id) {
                $data = array();
		$user_id = Auth::User()->id;	    
		$data['packagedata'] = \DB::table('packages')
					 ->where('id', $id)
					 ->select('*')
					 ->first();
                $data['package_id'] = $id;
                return view('admin.my_packages')->with($data);
    }
    public function checkout(Request $request) {
        $input = $request->all();
		$data = array();
		$user_id = Auth::User()->id;
                
                $data['packagedata'] = \DB::table('packages')
				->where('id', $_POST['package_id'])
				->select('*')
				->first();
			$data['countries'] = \DB::table('countries')
				->select('*')
				->get();
			$data['post_data']  = $input;
                
		if($_POST['payment_method'] == 'stripe'){
			
			return view('admin.stripe')->with($data);

		}else if($_POST['payment_method'] == 'paypal'){
		
			$data['price'] = $_POST['packagetotal'];
			$data['user_id'] = $user_id;
			$data['package_id'] = $_POST['package_id'];
			$data['paid'] = $_POST['packagetotal'];
			$data['start_date'] = date("Y-m-d H:i:s");
			$data['is_active'] = 1;
			$data['renew_date'] = date('Y-m-d H:i:s', strtotime('+1 year'));
			$data['created_at'] = date("Y-m-d H:i:s");
			$data['updated_at'] = date("Y-m-d H:i:s");
			\Session::put('paypal_package_values', $data);
                        //echo '<pre>'; print_r($_POST); die();
			
			try {
				$paypal = new \Netshell\Paypal\Paypal;
				$payer = $paypal->Payer();
				$payer->setPaymentMethod('paypal');
				
				$amount = $paypal->Amount();
				$amount->setCurrency('USD');
				$amount->setTotal($data['price']); // This is the simple way,
				// you can alternatively describe everything in the order separately;
				// Reference the PayPal PHP REST SDK for details.
				$transaction = $paypal->Transaction();
				$transaction->setAmount($amount);
				$transaction->setDescription(' Membership upgration amount');
				$baseUrl = \URL::to('/');
				$redirectUrls = $paypal->RedirectUrls();
				$redirectUrls->setReturnUrl($baseUrl . '/admin/upgrade-account/thank-you');
				$redirectUrls->setCancelUrl($baseUrl . '/admin/upgrade-account');
				$payment = $paypal->Payment();
				$payment->setIntent('Sale');
				$payment->setPayer($payer);
				$payment->setRedirectUrls($redirectUrls);
				$payment->setTransactions(array($transaction));
				$response = $payment->create($this->_apiContext);
				$redirectUrl = $response->links[1]->href;
				
                                //echo '<pre>'; print_r($redirectUrl); die();
				return Redirect::to($redirectUrl);
			} catch (PayPal\Exception\PayPalConnectionException $ex) {
				echo $ex->getCode(); // Prints the Error Code
				echo $ex->getData();
				die($ex);
			} catch (Exception $ex) {
				die($ex);
			}
		}
    }
    
    
	public function thankyou(Request $request) {
            $paymenttable = array();
            $paymenttable = \Session::get('paypal_package_values');

					$insertion_array = array(
							'user_id' => $paymenttable['user_id'],
							'package_id' => $paymenttable['package_id'],
							'payment_type' => 'Paypal',
							'amount_paid' => $paymenttable['paid'],
							'card_no' => '',
							'paypal_email' => '',
							'payment_status' => 'success',
							'payment_id' => $_GET['paymentId'],
							'payment_datetime' => date('Y-m-d H:i:s'),
							'created_at' => date('Y-m-d H:i:s'),
							'updated_at' => date('Y-m-d H:i:s')
							);
            		
					\DB::table('payments')->insert($insertion_array);
					
					$cur_time = time();
                                        
                                        $isPackageOrderExsist = \DB::table('package_orders')->where('user_id', $paymenttable['user_id'])->first();
				if(isset($isPackageOrderExsist) && count(array($isPackageOrderExsist)) > 0){
					\DB::table('package_orders')
					->where('user_id', $paymenttable['user_id'])
					->update([
						'package_id'=>$paymenttable['package_id'],
						'paid'=>$paymenttable['paid'],
						'start_date' => date('Y-m-d H:i:s'),
						'renew_date' => date('Y-m-d H:i:s', strtotime('+30 days', $cur_time)),
					]);
				}else{
					$data=array(
						'user_id' => $paymenttable['user_id'],
						'package_id' => $paymenttable['package_id'],
						'paid' => $paymenttable['paid'],
						'start_date'=> date('Y-m-d H:i:s'),
						'is_active' => 1,
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s'),
						'free_trial' => 1
					);
					\DB::table('package_orders')->insert($data);
				}
                                        
					
					 \DB::table('package_orders')
					 ->where('user_id', $paymenttable['user_id'])
					 ->update([
					 		'package_id'=>$paymenttable['package_id'],
							'paid'=>$paymenttable['paid'],
							'start_date' => date('Y-m-d H:i:s'),
							'renew_date' => date('Y-m-d H:i:s', strtotime('+30 days', $cur_time)),
							]);
                                    if(@$paymenttable['payment_time'] == '24'){
					\DB::table('users')
					 ->where('id', $paymenttable['user_id'])
					 ->update([
							'pkg_renew_date' => date('Y-m-d H:i:s', strtotime('+24 months', $cur_time)),
							]);
                                    }else if(@$paymenttable['payment_time'] == '12'){
                                       \DB::table('users')
					 ->where('id', $paymenttable['user_id'])
					 ->update([
							'pkg_renew_date' => date('Y-m-d H:i:s', strtotime('+12 months', $cur_time)),
							]); 
                                    }else if(@$paymenttable['payment_time'] == '1'){
                                       \DB::table('users')
					 ->where('id', $paymenttable['user_id'])
					 ->update([
							'pkg_renew_date' => date('Y-m-d H:i:s', strtotime('+1 month', $cur_time)),
							]); 
                                    }
					
					
					Alert::success('Success Message', 'Your membership updated successfully!')->autoclose(3000);
					
					return redirect('admin/dashboard');
					
                
            
            
           
        }
	public function update_membership(Request $request) {
        $data = array();
		$user_id = Auth::User()->id;
        $input = $request->all();
		$price = \DB::table('packages as p')
					->where('id', $input['package_id'])
					->select('p.price', 'p.one_year_price', 'p.two_year_price')
					->first();

		$card = \DB::table('payment_gateways')
					->where('user_id', $user_id)
					->where('is_default', 1)
					->select('gateway', 'creditcard_holder', 'creditcard_no', 'creditcard_expiry_month', 'creditcard_expiry_year', 'creditcard_cvv', 'paypal_email')
					->first();

		$stripe = new Stripe();
		$stripe = Stripe::make(env('STRIPE_SECRET'));
		$don = explode("/", $input['creditcard_expiry_date']);
		$expt_month = (int)$don[0];
		$expt_year = (int)$don[1];

		try {
			$token = $stripe->tokens()->create([
				'card' => [
					'number' => $input['creditcard_no'],
					'exp_month' => $expt_month,
					'exp_year' => $expt_year,
					'cvc' => $input['creditcard_cvv'],
				],
			]);
			if (!isset($token['id'])) {
				echo 'Token Not generated for stripe payment';
				exit();
			}
			$charge = $stripe->charges()->create([
				'card' => $token['id'],
				'currency' => 'USD',
				'amount' => $input['packagetotal'],
				'description' => 'Pay for membership package',
			]);
                        if(!isset($input['auto_renew'])){
                            $input['auto_renew'] =0;
                        }
			if ($charge['status'] == 'succeeded') {
				$insertion_array = array(
					'user_id' => $user_id,
					'package_id' => $input['package_id'],
					'payment_type' => 'Stripe',
					'amount_paid' => $input['packagetotal'],
					'card_no' => substr_replace($input['creditcard_no'], str_repeat("*", 8), 4, 8),
					'paypal_email' => '',
					'payment_status' => 'success',
                                         'auto_renew' => $input['auto_renew'],
					'payment_id' => '',
					'payment_datetime' => date('Y-m-d H:i:s'),
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s')
				);
				
				\DB::table('payments')->insert($insertion_array);
				$cur_time = time();
				$isPackageOrderExsist = \DB::table('package_orders')->where('user_id', $user_id)->first();
				if(isset($isPackageOrderExsist) && count(array($isPackageOrderExsist)) > 0){
					\DB::table('package_orders')
					->where('user_id', $user_id)
					->update([
						'package_id'=>$input['package_id'],
						'paid'=>$input['packagetotal'],
						'start_date' => date('Y-m-d H:i:s'),
						'renew_date' => date('Y-m-d H:i:s', strtotime('+30 days', $cur_time)),
					]);
				}else{
					$data=array(
						'user_id' => $user_id,
						'package_id' => $input['package_id'],
						'paid' => $input['packagetotal'],
						'start_date'=> date('Y-m-d H:i:s'),
						'is_active' => 1,
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s'),
						'free_trial' => 1
					);
					\DB::table('package_orders')->insert($data);
				}
				if($input['payment_time'] == '24'){
				\DB::table('users')->where('id', $user_id)->update(['pkg_renew_date' => date('Y-m-d H:i:s', strtotime('+24 months', $cur_time)),]);
				}else if($input['payment_time'] == '12'){
					\DB::table('users')->where('id', $user_id)->update(['pkg_renew_date' => date('Y-m-d H:i:s', strtotime('+12 months', $cur_time)),]); 
					}else if($input['payment_time'] == '1'){
					\DB::table('users')->where('id', $user_id)->update(['pkg_renew_date' => date('Y-m-d H:i:s', strtotime('+1 month', $cur_time)),]); 
				}
				Alert::success('Success Message', 'Your membership update successfully!')->autoclose(3000);
				return redirect('admin/dashboard');
			} else {
				Alert::error('Error Message', 'Sorry! your request not proceed . please try again')->autoclose(3000);
				return redirect('admin/upgrade_account');
			}
		} catch (Exception $e) {
			Alert::error('Error Message', $e->getMessage())->autoclose(3000);
			return redirect('admin/upgrade-account');
			exit();
		} catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
			Alert::error('Error Message', $e->getMessage())->autoclose(3000);
			return redirect('admin/upgrade-account');
			exit();
		} catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
			Alert::error('Error Message', $e->getMessage())->autoclose(3000);
			return redirect('admin/upgrade-account');
			exit();
		}

    }
	
	
	public function delete_account(Request $request)
	{
//            echo '<pre>';print_r($_POST); die();
        
		$user_id = Auth::user()->id;
		
		if($request->action == 'cancel')
		{
                    $insertarray = array(
                        'step1' => $_POST['step1'],
                        'step2' => $_POST['step2'],
                        'step3' => $_POST['step3'],
                        'user_id' => $user_id
                    );
			\DB::table('reasons')->insert($insertarray);
                        
			\DB::beginTransaction();
			
			\DB::table('users')->where('id', $user_id)->delete();
			
			$flag = true;
	
			$projects = \DB::table('projects as p')
							->leftjoin('users_projects as u', 'p.id', '=', 'u.project_id')
							->where('u.user_id', $user_id)
							->where('u.notlist', 0)
							->select('p.name', 'p.id')
							->get();
		
            foreach ($projects as $project) {
                $pro = \DB::table('projects')->where('id', $project->id)->delete();

                if (!$pro)
                    $flag = false;
                
                $seo = \DB::table('pages_seo_settings')->where('project_id', $project->id)->delete();
                $codes = \DB::table('pages_tracking_codes')->where('project_name', $project->name)->delete();
                if ($flag == false) {
                    \DB::rollBack();
                    Alert::error('Something went wrong. please try agian!!')->autoclose(3000);
                    return redirect()->back();
                }
            }

            \DB::commit();
	
			Alert::success('Your account has been deleted successfully!!')->autoclose(3000);
			
		}
		else
		{
			\DB::table('users')->where('id', $user_id)->update(['is_active'=> 0]);
			\DB::table('package_orders')->where('user_id', $user_id)->update(['is_active'=> 0]);
			\DB::table('users_projects')->where('user_id', $user_id)->update(['is_active'=> 0]);
			
			\DB::table('panda_sms_orders')->where('user_id', $user_id)->update(['is_active'=> 0]);
			\DB::table('panda_crms_orders')->where('user_id', $user_id)->update(['is_active'=> 0]);
			\DB::table('panda_dials_orders')->where('user_id', $user_id)->update(['is_active'=> 0]);
			\DB::table('panda_flows_orders')->where('user_id', $user_id)->update(['is_active'=> 0]);
			
			
			Alert::success('Your account has been paused until you active agian!!')->autoclose(3000);
		}
		
		return redirect('logout');
		
        
    }
	
	public function getDone(Request $request) {
		
		$paypal = new \Netshell\Paypal\Paypal;
        $user = Auth::user();
        $id = $request->get('paymentId');
        $token = $request->get('token');
        $payer_id = $request->get('PayerID');

        $payment = $paypal->getById($id, $this->_apiContext);

        $paymentExecution = $paypal->PaymentExecution();

        $paymentExecution->setPayerId($payer_id);
        $executePayment = $payment->execute($paymentExecution, $this->_apiContext);
		
		
		$sessiondata = \Session::get('paypal_package_values');
		
		\Session::forget('paypal_package_values');
		
		$insertion_array = array(
							'user_id' => $user->id,
							'package_id' => $sessiondata['package'],
							'payment_type' => 'Paypal',
							'amount_paid' => $sessiondata['price'],
							'card_no' => '',
							'paypal_email' => '',
							'payment_status' => 'success',
							'payment_id' => $id,
							'payment_datetime' => date('Y-m-d H:i:s'),
							'created_at' => date('Y-m-d H:i:s'),
							'updated_at' => date('Y-m-d H:i:s')
							);
            		
		\DB::table('payments')->insert($insertion_array);
		
		 \DB::table('package_orders')
		 ->where('user_id', $user->id)
		 ->update(['package_id'=>$sessiondata['package']]);
		
		
		Alert::success('Success Message', 'Your membership update successfully!')->autoclose(3000);
		
		return redirect('admin/dashboard');
					
        
    }
	
    public function getCancel() {
        Alert::error('Error Message', 'Response: Payment not successfull')->autoclose(3000);
        return redirect('admin/upgrade-account');
    }
    
    public static function getProjects()
    {
        $projects = \DB::table('projects')
                        ->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')
                        ->select('projects.*', \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'))->orderBy('projects.id', 'desc')->where('users_projects.user_id', Auth::user()->id)->where('users_projects.notlist', 0)->limit(1)->get();
        return $projects; 
    }

}
