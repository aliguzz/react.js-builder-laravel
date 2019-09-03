<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Blog;
use App\BlogCategories;
use App\DbModel;
use Illuminate\Http\Request;
use Alert;
use Image;
use File;

class BlogController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        not_permissions_redirect(have_premission(array(83)));
        $data['blog'] = Blog::Join('blog_categories', function($join) {
                    $join->on('blogs.blog_category_id', '=', 'blog_categories.id');
                })
                ->select('blog_categories.name', 'blogs.*')
                ->paginate(10); 

        $data['total'] = Blog::Join('blog_categories', function($join) {
                    $join->on('blogs.blog_category_id', '=', 'blog_categories.id');
                })
                ->select('blog_categories.name', 'blogs.*')
                ->count();

        return view('admin.blogs.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        not_permissions_redirect(have_premission(array(84)));
        $data['action'] = "Add";
        $data['categories'] = BlogCategories::where('is_active',1)->orderBy('name', 'ASC')->get();
        return view('admin.blogs.edit')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        not_permissions_redirect(have_premission(array(85)));
        $data['Blog'] = Blog::findOrFail($id);
        $data['categories'] = BlogCategories::where('is_active',1)->orderBy('name', 'ASC')->get();
        $data['action'] = "Edit";
        return view('admin.blogs.edit')->with($data);
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
            not_permissions_redirect(have_premission(array(85)));
            $Blog = Blog::findOrFail($input['id']);
            $Blog->update($input);
            $old_image = $Blog->image;

            $slug = DbModel::unique_slug('blogs', $input['slug'], $input['id']);
            if ($slug) {
                $blog_update['slug'] = $slug->slug . '-' . $input['id'];
            }

            $photo = "";
            if (isset($_FILES['image']['name']) && $_FILES['image']['size'] > 0) {
                $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                $photo = $input['id'] . '-' . uniqid() . '.' . $ext;
                $destinationPath = "uploads/blogs/" . $photo;
                move_uploaded_file($_FILES['image']['tmp_name'], $destinationPath);
                if ($old_image) {
                    File::delete("uploads/blogs/" . $old_image);
                }
            } else {
                $photo = $old_image;
            }
            $blog_update['image'] = $photo;
            $Blog->update($blog_update);
            Alert::success('Success Message', 'Blog updated successfully!')->autoclose(3000);
        } else {
            not_permissions_redirect(have_premission(array(84)));
            $id = Blog::create($input)->id;

            $slug = DbModel::unique_slug('blogs', $input['slug'], $id);
            if ($slug) {
                $blog_update['slug'] = $slug->slug . '-' . $id;
            }
            $photo = "";
            if (isset($_FILES['image']['name']) && $_FILES['image']['size'] > 0) {
                $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                $photo = $id . '-' . uniqid() . '.' . $ext;
                $destinationPath = "uploads/blogs/" . $photo;
                move_uploaded_file($_FILES['image']['tmp_name'], $destinationPath);
            }

            $Blog = Blog::findOrFail($id);
            $blog_update['image'] = $photo;
            $Blog->update($blog_update);

            Alert::success('Success Message', 'Blog added successfully!')->autoclose(3000);
        }

        if(have_premission(array(83))){
            return redirect('admin/blogs');
            
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
        not_permissions_redirect(have_premission(array(86)));
        Blog::destroy($id);
        Alert::success('Success Message', 'Blog deleted successfully!')->autoclose(3000);
        return redirect('admin/blogs');
    }

}
