<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;

class PaymentgatewaysController extends Controller {

    /**
     * Display a dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        not_permissions_redirect(have_premission(array(54)));
        $uesr_id = \Auth::user()->id;
        $data['paypal'] = \DB::table("payment_gateways")->where("user_id", $uesr_id)->where("gateway","paypal")->first();
        $data['stripe'] = \DB::table("payment_gateways")->where("user_id", $uesr_id)->where("gateway","stripe")->first();
        $data['applepay'] = \DB::table("payment_gateways")->where("user_id", $uesr_id)->where("gateway","applepay")->first();
        $data['gplay'] = \DB::table("payment_gateways")->where("user_id", $uesr_id)->where("gateway","gplay")->first();
        return view('admin.paymentgateways.index')->with($data);
    }

    public function store(Request $request) {
        $uesr_id = \Auth::user()->id;
        $input = $request->all();
        unset($input["_token"]);
        
        $smtp = \DB::table("payment_gateways")->where("user_id", $uesr_id)->where("gateway",$input["gateway"])->first();
        if (count($smtp) > 0) {
            \DB::table('payment_gateways')->where('id', $smtp->id)->where("gateway",$input["gateway"])->update($input);
        } else {
            $input['user_id'] = $uesr_id;
            \DB::table('payment_gateways')->insert($input);
        }
        Alert::success('Success Message', 'Payment Gateway updated successfully!')->autoclose(3000);

        return redirect('admin/payment-gateways');
    }
	
	public function set_default_gateway(Request $request) {
        $uesr_id = \Auth::user()->id;
        $input = $request->all();
        unset($input["_token"]);
        
        \DB::table('payment_gateways')->where('user_id', $uesr_id)->update(['is_default'=> 0]);
		
		\DB::table('payment_gateways')->where('user_id', $uesr_id)->where("gateway",$input["payment_gateway"])->update(['is_default'=> 1]);
        
        Alert::success('Success Message', 'Payment Gateway updated successfully!')->autoclose(3000);

        return redirect()->back();
    }

}
