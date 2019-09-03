<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains;

class MytemplatesController extends Controller {

    /**
     * Display a dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        not_permissions_redirect(have_premission(array(65)));
        $data['digitalassets'] = Domains::paginate(10);
        return view('admin.mytemplates.index')->with($data);
    }

    public function create() {
        $data['action'] = "Add";
        return view('admin.mytemplates.templates')->with($data);
    }
    

    public function edit($id) {
        $data['action'] = "Edit";
        return view('admin.mytemplates.edit')->with($data);
    }

}