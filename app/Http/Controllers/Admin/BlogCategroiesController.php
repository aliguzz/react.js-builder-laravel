<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\BlogCategories;
use App\Blog;
use App\DbModel;
use Illuminate\Http\Request;
use Alert;

class BlogCategroiesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        not_permissions_redirect(have_premission(array(73)));
        $data['blogCategories'] = BlogCategories::paginate(10);
        $data['total'] = BlogCategories::count();
        return view('admin.blogCategories.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        not_permissions_redirect(have_premission(array(70)));
        $data['action'] = "Add";
        return view('admin.blogCategories.edit')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        not_permissions_redirect(have_premission(array(71)));
        $data['BlogCategories'] = BlogCategories::findOrFail($id);
        $data['action'] = "Edit";
        return view('admin.blogCategories.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        $input = $request->all();

        if ($input['action'] == 'Edit') {
            not_permissions_redirect(have_premission(array(71)));
            $BlogCategories = BlogCategories::findOrFail($input['id']);
            $BlogCategories->update($input);
            
            $slug = DbModel::unique_slug('blog_categories', $input['slug'], $input['id']);
            if ($slug) {
                $cat_slug['slug'] = $slug->slug . '-' . $input['id'];
                $cat = BlogCategories::findOrFail($input['id']);
                $cat->update($cat_slug);
            }
            
            Alert::success('Success Message', 'Blog Category updated successfully!')->autoclose(3000);
        } else {
            not_permissions_redirect(have_premission(array(70)));
            $id = BlogCategories::create($input)->id;
           
            $slug = DbModel::unique_slug('blog_categories', $input['slug'], $id);
            if ($slug) {
                $cat_slug['slug'] = $slug->slug . '-' . $id;
                $cat = BlogCategories::findOrFail($id);
                $cat->update($cat_slug);
            }
            
            Alert::success('Success Message', 'Blog Category added successfully!')->autoclose(3000);
        }

        if(have_premission(array(73))){
            return redirect('admin/blog-category');
            
        }else{
            return redirect('admin/dashboard');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        not_permissions_redirect(have_premission(array(72)));
        Blog::where('blog_category_id', $id)->delete();
        BlogCategories::destroy($id);
        Alert::success('Success Message', 'Blog Category deleted successfully!')->autoclose(3000);
        return redirect('admin/blog-category');
    }

}
