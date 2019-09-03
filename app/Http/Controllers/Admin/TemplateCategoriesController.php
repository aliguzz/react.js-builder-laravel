<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TemplateCategories;
use App\DbModel;
use Illuminate\Http\Request;
use Alert;
use App\Industries;
use File;
use DB;

class TemplateCategoriesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        not_permissions_redirect(have_premission(array(98)));
        $data['industries'] = Industries::get();
        $data['templateCategories'] = TemplateCategories::paginate(10);
        $data['total'] = TemplateCategories::count();
        return view('admin.templateCategories.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        not_permissions_redirect(have_premission(array(95)));
        $data['action'] = "Add";
        $data['industries'] = Industries::get();
        return view('admin.templateCategories.edit')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        
        not_permissions_redirect(have_premission(array(96)));
        $data['TemplateCategory'] = TemplateCategories::findOrFail($id);
        $data['industries'] = Industries::get();
        
        $sellected_cats = DB::table('industry_categories')->where('cat_id', '=', $id)->select('ind_id')->get();
        $i = 0;
        $data['sellected_cats'] = array();
        foreach ($sellected_cats as $cat) {
            $data['sellected_cats'][$i] = $cat->ind_id;
            $i++;
        }

        $data['action'] = "Edit";
        return view('admin.templateCategories.edit')->with($data);
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
        $industries = $input['industries'];
        unset($input['industries']);
        if ($input['action'] == 'Edit') {
            not_permissions_redirect(have_premission(array(96)));
            $TemplateCategories = TemplateCategories::findOrFail($input['id']);
            $TemplateCategories->update($input);
            $old_image = $TemplateCategories->thumbnail;
            $slug = DbModel::unique_slug('template_categories', $input['slug'], $input['id']);
            if ($slug) {
                $cat_slug['slug'] = $slug->slug . '-' . $input['id'];
                $cat = TemplateCategories::findOrFail($input['id']);
                $cat->update($cat_slug);
            }

            $photo = "";
            if (isset($_FILES['thumbnail']['name']) && $_FILES['thumbnail']['size'] > 0) {
                $ext = strtolower(pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION));
                $photo = $input['id'] . '-' . uniqid() . '.' . $ext;
                $destinationPath = "uploads/template_categories/" . $photo;
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $destinationPath);
                if ($old_image) {
                    File::delete("uploads/template_categories/" . $old_image);
                }
            } else {
                $photo = $old_image;
            }
            $blog_update['thumbnail'] = $photo;
            $TemplateCategories->update($blog_update);
            
            DB::table('industry_categories')->where('cat_id', '=', $input['id'])->delete();
            foreach ($industries as $ind) {
                $cat_data['cat_id'] = $input['id'];
                $cat_data['ind_id'] = $ind;
                $cat_data['created_at'] = date('Y-m-d H:i:s');
                DB::table('industry_categories')->insert($cat_data);
            }

            Alert::success('Success Message', 'Template Category updated successfully!')->autoclose(3000);
        } else {
            not_permissions_redirect(have_premission(array(95)));
            $TemplateCategories = TemplateCategories::create($input);
            $id = $TemplateCategories->id;
            if (isset($_FILES['thumbnail']['name']) && $_FILES['thumbnail']['size'] > 0) {
                $ext = strtolower(pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION));
                $photo = $input['id'] . '-' . uniqid() . '.' . $ext;
                $destinationPath = "uploads/template_categories/" . $photo;
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $destinationPath);
                $blog_update['thumbnail'] = $photo;
                $TemplateCategories->update($blog_update);
            }
            DB::table('industry_categories')->where('cat_id', '=', $input['id'])->delete();
            foreach ($industries as $ind) {
                $cat_data['cat_id'] = $id;
                $cat_data['ind_id'] = $ind;
                $cat_data['created_at'] = date('Y-m-d H:i:s');
                DB::table('industry_categories')->insert($cat_data);
            }

            Alert::success('Success Message', 'Category added successfully!')->autoclose(3000);
        }

        if (have_premission(array(98))) {
            return redirect('admin/template-categories');
        } else {
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
        not_permissions_redirect(have_premission(array(97)));
        TemplateCategories::destroy($id);
        Alert::success('Success Message', 'Category deleted successfully!')->autoclose(3000);
        return redirect('admin/template-categories');
    }

}
