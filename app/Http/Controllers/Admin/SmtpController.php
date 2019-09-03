<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains;
use Alert;

class SmtpController extends Controller {

    /**
     * Display a dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        not_permissions_redirect(have_premission(array(53)));
        $uesr_id = \Auth::user()->id;
        $data['smtp'] = \DB::table("smtp_settings")->where("user_id", $uesr_id)->first();
        $data['domains'] = Domains::get();
        $data['countries'] = \DB::table("countries")->get();
        return view('admin.smtpsettings.index')->with($data);
    }

    public function store(Request $request) {
        $uesr_id = \Auth::user()->id;
        $input = $request->all();
        unset($input["_token"]);
       
        $smtp = \DB::table("smtp_settings")->where("user_id", $uesr_id)->first();
        if (count($smtp) > 0) {
            \DB::table('smtp_settings')->where('id', $smtp->id)->update($input);
        } else {
            $input['user_id'] = $uesr_id;
            $input['created_at'] = date("Y-m-d H:i:s");
            \DB::table('smtp_settings')->insert($input);
        }
        Alert::success('Success Message', 'SMTP settings updated successfully!')->autoclose(3000);

        return redirect('admin/smtp');
    }

}
