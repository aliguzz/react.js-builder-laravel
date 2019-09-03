<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\NewsLetter;
use Illuminate\Http\Request;
use Alert;

class SubscribersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        not_permissions_redirect(have_premission(array(87)));
        $data['demos'] = NewsLetter::Orderby('id', 'DESC')->paginate(10);
        $data['total'] = NewsLetter::Orderby('id', 'DESC')->count();
        return view('admin.subscribers.index')->with($data);
    }
    public function premium_builds() {
        $data['demos'] = \DB::table('premium_build_requests')->Orderby('id', 'DESC')->paginate(10);
        $data['total'] = \DB::table('premium_build_requests')->Orderby('id', 'DESC')->count();
        return view('admin.premium.index')->with($data);
    }
    public function premium_builds_view($id){
        $data['demo'] = \DB::table('premium_build_requests')->select("premium_build_requests.*", \DB::raw("(SELECT CONCAT(u.first_name,' ',u.last_name) FROM users AS u WHERE u.id = premium_build_requests.user_id) AS user_name"))->where('id',$id)->first();

        return view('admin.premium.view')->with($data);
    }
    public function premium_builds_status(Request $request){
        $input = $request->all();
        \DB::table('premium_build_requests')->where('id',$input['id'])->update(array('status'=>$input['status']));
        Alert::success('Success Message', 'Request status changed successfully!')->autoclose(3000);
        return redirect('admin/premium-build-requests/'.$input['id']);
    }
    public function premium_builds_delete($id){
        \DB::table('premium_build_requests')->where('id',$id)->delete();
        Alert::success('Success Message', 'Request deleted successfully!')->autoclose(3000);
        return redirect('admin/premium-build-requests');
    }

    public function destroy($id) {
        not_permissions_redirect(have_premission(array(88)));
        NewsLetter::destroy($id);
        Alert::success('Success Message', 'Subscriber deleted successfully!')->autoclose(3000);
        return redirect('admin/subscribers');
    }
}
