<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;

class ContactUsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        not_permissions_redirect(have_premission(array(89)));
        $data['demos'] = \DB::table('contact_us_log')->Orderby('id', 'DESC')->paginate(10);
        $data['total'] = \DB::table('contact_us_log')->Orderby('id', 'DESC')->count();
        return view('admin.contactUs.index')->with($data);
    }

    public function destroy($id) {
        not_permissions_redirect(have_premission(array(90)));
        \DB::table('contact_us_log')->where('id', $id)->delete();
        Alert::success('Success Message', 'Contact Us deleted successfully!')->autoclose(3000);
        return redirect('admin/contact-us-log');
    }

}
