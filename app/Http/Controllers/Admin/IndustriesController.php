<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Industries;
use App\DbModel;
use Illuminate\Http\Request;
use Alert;
use Image;
use File;

class IndustriesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        not_permissions_redirect(have_premission(array(94)));
		$data['cats'] = \DB::table('industries')->paginate(10);			
        return view('admin.industries.index')->with($data);
    }
	
	
	 public function create() {
        not_permissions_redirect(have_premission(array(91)));
        $data['action'] = "Add";
		$data['industries'] = Industries::get();	
        return view('admin.industries.edit')->with($data);
    }
	
	 public function edit($id) {
        not_permissions_redirect(have_premission(array(92)));
        $data['industry'] = Industries::findOrFail($id);
        $data['industries'] = Industries::where('status',1)->orderBy('title', 'ASC')->get();
        $data['action'] = "Edit";
        return view('admin.industries.edit')->with($data);
    }
	
	
	  public function store(Request $request) {
        $input = $request->all();

        if ($input['action'] == 'Edit') {
            not_permissions_redirect(have_premission(array(92)));
            $Industries = Industries::findOrFail($input['id']);
            $Industries->update($input);

            $slug = DbModel::unique_slug('industries', $input['slug'], $input['id']);
            if ($slug) {
                $blog_update['slug'] = $slug->slug . '-' . $input['id'];
				$Industries->update($blog_update);
            }
			
            
            Alert::success('Success Message', 'Industries updated successfully!')->autoclose(3000);
        } else {
            not_permissions_redirect(have_premission(array(91)));
            $id = Industries::create($input)->id;

            $slug = DbModel::unique_slug('industries', $input['slug'], $id);
            if ($slug) {
                $blog_update['slug'] = $slug->slug . '-' . $id;
				$Industries = Industries::findOrFail($id);
				$Industries->update($blog_update);
            }
          

            Alert::success('Success Message', 'Industry added successfully!')->autoclose(3000);
        }

        if(have_premission(array(94))){
            return redirect('admin/industries');
            
        }else{
            return redirect('admin/dashboard');
        }
       
    }
	
	
	 public function destroy($id) {
        not_permissions_redirect(have_premission(array(93)));
        Industries::destroy($id);
        Alert::success('Success Message', 'Industry deleted successfully!')->autoclose(3000);
        return redirect('admin/industries');
    }

   

}
