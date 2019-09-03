<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Categories;
use App\DbModel;
use Illuminate\Http\Request;
use Alert;
use Image;
use File;

class CategoriesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        not_permissions_redirect(have_premission(array(77)));
        $data['cats'] = \DB::table('categories')->paginate(10);
        return view('admin.categories.index')->with($data);
    }

    public function create() {
        not_permissions_redirect(have_premission(array(74)));
        $data['action'] = "Add";
        return view('admin.categories.edit')->with($data);
    }

    public function edit($id) {
        not_permissions_redirect(have_premission(array(75)));
        $data['category'] = Categories::findOrFail($id);
        $data['action'] = "Edit";
        return view('admin.categories.edit')->with($data);
    }

    public function store(Request $request) {
        $input = $request->all();
        if ($input['action'] == 'Edit') {
            not_permissions_redirect(have_premission(array(75)));
            $Categories = Categories::findOrFail($input['id']);
            $Categories->update($input);

            $slug = DbModel::unique_slug('categories', $input['slug'], $input['id']);
            if ($slug) {
                $blog_update['slug'] = $slug->slug . '-' . $input['id'];
                $Categories->update($blog_update);
            }


            Alert::success('Success Message', 'Categories updated successfully!')->autoclose(3000);
        } else {
            not_permissions_redirect(have_premission(array(74)));
            $id = Categories::create($input)->id;

            $slug = DbModel::unique_slug('categories', $input['slug'], $id);
            if ($slug) {
                $blog_update['slug'] = $slug->slug . '-' . $id;
                $Categories = Categories::findOrFail($id);
                $Categories->update($blog_update);
            }


            Alert::success('Success Message', 'Categories added successfully!')->autoclose(3000);
        }

        if (have_premission(array(74))) {
            return redirect('admin/categories');
        } else {
            return redirect('admin/dashboard');
        }
    }

    public function destroy($id) {
        not_permissions_redirect(have_premission(array(76)));
        Categories::destroy($id);
        Alert::success('Success Message', 'Category deleted successfully!')->autoclose(3000);
        return redirect('admin/categories');
    }

}
