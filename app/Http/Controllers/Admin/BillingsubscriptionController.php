<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillingsubscriptionController extends Controller {

    /**
     * Display a dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {

        $user_id          = \Auth::User()->id;
        $data['invoices'] = \DB::table('payments')->where('user_id', $user_id)->orderBy('id', 'desc')->paginate(10);
		$data['package'] = \DB::table('packages as p')
							->leftJoin('package_orders as o', 'o.package_id', '=', 'p.id')
							->where('o.user_id', $user_id)
							->select('p.price', 'p.one_year_price', 'p.two_year_price', 'p.title', 'p.connect_domains')
							->first();
							
		$data['domains'] = 	\DB::table('domains')
							->where('user_id', $user_id)
							->count('id');
							
		$data['gateway'] = 	\DB::table('payment_gateways')
							->where('user_id', $user_id)
							->where('is_default', 1)
							->select('gateway')->first();
		
		$data['gateway'] = (isset($data['gateway']))? $data['gateway']->gateway : '';					 
							 
		return view('admin.accountbilling.index')->with($data);
    }

    public function create() {
        $data['action'] = "Add";
        return view('admin.accountbilling.edit')->with($data);
    }

    public function edit($id) {
        $data['action'] = "Edit";
        return view('admin.accountbilling.edit')->with($data);
    }

}