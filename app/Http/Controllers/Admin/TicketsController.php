<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\DbModel;
use App\HelpArticles;
use Illuminate\Http\Request;
use Alert;
use Auth;

class TicketsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        not_permissions_redirect(have_premission(array(80)));
        $user = Auth::user();
        if($user['role'] == 1){
            $data['cats'] = \DB::table('tickets')->paginate(10);
        }else{
            $data['cats'] = \DB::table('tickets')->where('user_id',$user['id'])->paginate(10);
        }
        return view('admin.helpArticles.tickets')->with($data);
    }
    
    

    public function view_ticket($id = 0) {
        $data['ticket_id'] = $id;
        $data['replay'] = \DB::select("SELECT tickets.question AS question, tickets_replaies.*, users.first_name, users.last_name, users.profile_image  from tickets
		left join tickets_replaies on tickets.id = tickets_replaies.ticket_id
		left join users on tickets_replaies.user_id = users.id
		WHERE tickets_replaies.ticket_id='" . $id . "' order by  tickets_replaies.id ");
        return view('admin.helpArticles.tickets_view')->with($data);
    }
    public function createticket(Request $request) {
        $data = array();
        $input = $request->all();
        $data['question'] = $input['q'];
        $data['preority'] = 1;
        $data['user_id'] = Auth::id();
        $data['status'] = 1;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $created_ticket_id = \DB::table('tickets')->insertGetId($data);
        $data['ticket_replies_data'] = \DB::table('tickets_replaies')->distinct('ticket_id')->get();
        $data['tickets_data'] = \DB::table('tickets')->get();
        echo json_encode ($data);
    }
    
    public function replyticket(Request $request) {
        $input = $request->all();

        $data['ticket_id'] = $input['ticket_id'];
        $data['replay'] = $input['reply'];
        $data['user_id'] = Auth::id();
        $data['images'] = 0;
        $data['status'] = 1;
        $data['created_at'] = date('Y-m-d H:i:s');
        \DB::table('tickets_replaies')->insert($data);
        Alert::success('Success Message', 'Reply Successfully Submit..')->autoclose(3000);
        return redirect('admin/tickets');
    }

}
