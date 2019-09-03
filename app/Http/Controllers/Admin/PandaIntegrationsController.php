<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Contact;
use App\PandaSms;
use App\PandaFlow;
use App\PandaCrm;
use App\PandaDial;

use Auth;
use Redirect;
use PayPal;
use Alert;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;

class PandaIntegrationsController extends Controller
{
  
    public function index()
    {
     
		
	
//		return view('admin.pandaintegrations.index');
    }
                                            // loading list view 
	 public function pandamail()
    {
     
		
	  not_permissions_redirect(have_premission(array(23)));
		return view('admin.pandaintegrations.list');
    }
	                              // email broadcast
	
	 public function pandasms()
    {
     	  not_permissions_redirect(have_premission(array(24)));
		  $data['SmsPackages'] = PandaSms::get();
		
	  return view('admin.pandaintegrations.PandaSms')->with($data);
		
    }
	                                    // action funnels 
	
	 public function pandaflow()
    {
     not_permissions_redirect(have_premission(array(25)));
	   $data['FlowPackages'] = PandaFlow::get();
		
		return view('admin.pandaintegrations.PandaFlow')->with($data);
    }
    
	 public function pandacrm()
    {
     not_permissions_redirect(have_premission(array(27)));
		
	     $data['CrmPackages'] = PandaCrm::get();
		//print_r($data['CrmPackages']);exit();
		
		return view('admin.pandaintegrations.pandacrm')->with($data);
    }
    
	 public function pandadial()
    {
		not_permissions_redirect(have_premission(array(26)));
     $data['DialPackages'] = PandaDial::get();
		
	return view('admin.pandaintegrations.PandaDial')->with($data);
    }
    // external integrations 
	
	
	public function external_integrations()
    {
            not_permissions_redirect(have_premission(array(28)));
     
		return view('admin.pandaintegrations.externalIntegrations');
    }
    
	
	public function buy_package($package_id, $type)
	{
        $data    = array();
		$user_id = Auth::User()->id;
		
		
		$data['package'] = \DB::table(str_replace('-', '_', $type))
					 ->where('id', $package_id)
					 ->first();
					 
        return view('admin.pandaintegrations.buyPackage')->with($data);
    }
	
	public function make_package_payment(Request $request)
	{
        $data = array();
		$user_id = Auth::User()->id;
	    
		$package = \DB::table(str_replace('-', '_', $request->package_type))
					 ->where('id', $request->package_id)
					 ->select('price')
					 ->first();
		
		
		$card = \DB::table('users as u')
					 ->leftJoin('payment_gateways as g', 'u.id', '=', 'g.user_id')
					 ->where('g.is_default', 1)
					 ->where('g.user_id', $user_id)
					 ->where('u.is_active', 1)
					 ->select('g.gateway', 'g.creditcard_holder', 'g.creditcard_no', 'g.creditcard_expiry_month', 'g.creditcard_expiry_year', 'g.creditcard_cvv', 'g.paypal_email')
					 ->first();
					 
		if($card->gateway == 'stripe')
		{
			$stripe = Stripe::make(env('STRIPE_SECRET'));
		  
		try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $card->creditcard_no,
                        'exp_month' => $card->creditcard_expiry_month,
                        'exp_year' => $card->creditcard_expiry_year,
                        'cvc' => $card->creditcard_cvv,
                    ],
                ]);

                if (!isset($token['id'])) {
                    echo 'Token Not generated for stripe payment';
                    exit();
                }

                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'USD',
                    'amount' => $package->price,
                    'description' => 'Pay for '.ucwords(str_replace('-', ' ', $request->package_type)).' package',
                ]);

                if ($charge['status'] == 'succeeded') {
					
					$insertion_array = array(
							'user_id' => $user_id,
							'package_id' => $request->package_id,
							'payment_type' => 'Stripe',
							'payment_amount' => $package->price,
							'card_no' => substr_replace($card->creditcard_no, str_repeat("*", 8), 4, 8),
							'paypal_email' => '',
							'payment_status' => 'success',
							'payment_id' => '',
							'payment_datetime' => date('Y-m-d H:i:s'),
							'created_at' => date('Y-m-d H:i:s'),
							'updated_at' => date('Y-m-d H:i:s')
							);
            		
					\DB::table(str_replace('-', '_', $request->package_type).'_payments')->insert($insertion_array);
					
					\DB::table(str_replace('-', '_', $request->package_type).'_orders')->where('user_id', $user_id)->delete();
					
					 $insertion_array = array(
							'user_id' => $user_id,
							'package_id' => $request->package_id,
							'paid' => $package->price,
							'is_active' => 1,
							'start_date' => date('Y-m-d H:i:s'),
							'renew_date' => date('Y-m-d H:i:s', strtotime('+30 days', time())),
							'created_at' => date('Y-m-d H:i:s'),
							'updated_at' => date('Y-m-d H:i:s'),
							'free_trial' => 0
							);
            		
					\DB::table(str_replace('-', '_', $request->package_type).'_orders')->insert($insertion_array);
					
					
					Alert::success('Success Message', 'Your package payment done successfully!')->autoclose(3000);
					
					return redirect('admin/dashboard');
					
                } else {
                    Alert::error('Error Message', 'Sorry! your request not proceed . please try again')->autoclose(3000);
					return redirect('admin/buy-package/'.$request->package_id.'/'.$request->package_type);
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
    }
	
	 /*public function pandazapier()
    {
     
		
	  
		return view('admin.pandaintegrations.emailsequences');
    }
    
	 public function pandawebinar()
    {
     
		
	  
		return view('admin.pandaintegrations.emailsequences');
    }*/
	
	
	public function save_panda_demo_request(Request $request) 
	{
		$input = $request->all();
		$table = 'panda_'.$input['action'].'_demo_requests';
		
		unset($input['action']);
		unset($input['_token']);
		
		$input['user_id']    = Auth::User()->id;
		$input['created_at'] = date('Y-m-d H:i:s');
		$input['updated_at'] = date('Y-m-d H:i:s');
		
		\DB::table($table)->insert($input);
		
		Alert::success('Success Message', 'Your Demo request has been received successfully!')->autoclose(3000);
		
        return redirect()->back();
    }
	
	
	public function panda_demo_requests($type='')
    {
            
	  $table = 'panda_'.$type.'_demo_requests';	
      $data['requests'] = \DB::table($table)->paginate(10);
	  $data['type']      = $type;
		//print_r($data['requests']); exit;
	  return view('admin.pandaintegrations.PandaDemoRequests')->with($data);
    }
	
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
       
		
		
    }

  
    public function show($id)
    {
      
		
		
    }

    
    public function edit($id)
    {
     
    }


    public function update(Request $request, $id)
    {
		
    }

 
    public function destroy($id)
    {
        
	
	
    }
}
