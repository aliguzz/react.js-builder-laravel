<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\HelpArticles;
use App\DbModel;
use Illuminate\Http\Request;
use Alert;
use Image;
use File;

class HelpArticlesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        not_permissions_redirect(have_premission(array(102)));
        $data['cats'] = HelpArticles::paginate(10);
        return view('admin.helpArticles.index')->with($data);
    }

    public function create() {
        not_permissions_redirect(have_premission(array(99)));
        $data['action'] = "Add";
        return view('admin.helpArticles.edit')->with($data);
    }

    public function edit($id) {
        not_permissions_redirect(have_premission(array(100)));
        $data['category'] = HelpArticles::findOrFail($id);
        $data['action'] = "Edit";
        return view('admin.helpArticles.edit')->with($data);
    }

    public function store(Request $request) {

        $input = $request->all();
		$input['user_id'] = \Auth::user()->id;
			
        if ($input['action'] == 'Edit') {
            not_permissions_redirect(have_premission(array(100)));
            $HelpArticles = HelpArticles::findOrFail($input['id']);
            $HelpArticles->update($input);
            $slug = DbModel::unique_slug('help_articles', $input['slug'], $input['id']);
            if ($slug) {
                $blog_update['slug'] = $slug->slug . '-' . $input['id'];
            }
            Alert::success('Success Message', 'Help Articles updated successfully!')->autoclose(3000);
        } else {
            not_permissions_redirect(have_premission(array(99)));
            
			unset($input['action']);
			unset($input['_token']);
			$input['created_at'] = date('Y-m-d H:i:s');
			$input['updated_at'] = date('Y-m-d H:i:s');
			
			$id = \DB::table('help_articles')->insertGetId($input);

            $slug = DbModel::unique_slug('help_articles', $input['slug'], $id);
            if ($slug) {
                $blog_update['slug'] = $slug->slug . '-' . $id;
            }
            $HelpArticles = HelpArticles::findOrFail($id);


            Alert::success('Success Message', 'Help Articles added successfully!')->autoclose(3000);
        }

        if (have_premission(array(102))) {
            return redirect('admin/help-articles');
        } else {
            return redirect('admin/dashboard');
        }
    }

    public function destroy($id) {
        not_permissions_redirect(have_premission(array(101)));
        HelpArticles::destroy($id);
        Alert::success('Success Message', 'Help Articles deleted successfully!')->autoclose(3000);
        return redirect('admin/help-articles');
    }

}
