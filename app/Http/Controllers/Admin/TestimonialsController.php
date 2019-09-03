<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Testimonials;
use Illuminate\Http\Request;
use Alert;
use Image;
use File;

class TestimonialsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        not_permissions_redirect(have_premission(array(39)));
        $data['testimonials'] = Testimonials::paginate(10);
        $data['total'] = Testimonials::count();
        return view('admin.testimonials.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        not_permissions_redirect(have_premission(array(36)));
        $data['action'] = "Add";
        $data['total_featured'] = Testimonials::Where('featured',1)->count();
       
        return view('admin.testimonials.edit')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        not_permissions_redirect(have_premission(array(37)));
        $data['Testimonial'] = Testimonials::findOrFail($id);
        $data['total_featured'] = Testimonials::Where('featured',1)->count();
        $data['action'] = "Edit";
        return view('admin.testimonials.edit')->with($data);
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
            not_permissions_redirect(have_premission(array(37)));
            $Testimonials = Testimonials::findOrFail($input['id']);
            $Testimonials->update($input);
            $old_image = $Testimonials->image;
            $photo = "";
            if (isset($_FILES['image']['name']) && $_FILES['image']['size'] > 0) {
                $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION)); // getting image extension
                $photo = $input['id'] . '-' . uniqid() . '.' . $ext; // renameing image
                $destinationPath = "uploads/testimonials/" . $photo;
                move_uploaded_file($_FILES['image']['tmp_name'], $destinationPath);
                //remove old image
                if ($old_image) {
                    File::delete("uploads/testimonials/" . $old_image);
                }
            } else {
                $photo = $old_image;
            }
            $testimonial_image['image'] = $photo;
            $Testimonials->update($testimonial_image);
            Alert::success('Success Message', 'Testimonial updated successfully!')->autoclose(3000);
        } else {
            not_permissions_redirect(have_premission(array(36)));
            $id = Testimonials::create($input)->id;
            $photo = "";
            if (isset($_FILES['image']['name']) && $_FILES['image']['size'] > 0) {
                $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION)); // getting image extension
                $photo = $id . '-' . uniqid() . '.' . $ext; // renameing image
                $destinationPath = "uploads/testimonials/" . $photo;
                move_uploaded_file($_FILES['image']['tmp_name'], $destinationPath);
            }
            //insert image record   
            $Testimonial = Testimonials::findOrFail($id);
            $testimonial_image['image'] = $photo;
            $Testimonial->update($testimonial_image);
            
            Alert::success('Success Message', 'Testimonial added successfully!')->autoclose(3000);
        }

        if(have_premission(array(39))){
            return redirect('admin/testimonials');
            
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
        not_permissions_redirect(have_premission(array(38)));
        Testimonials::destroy($id);
        Alert::success('Success Message', 'Testimonial deleted successfully!')->autoclose(3000);
        return redirect('admin/testimonials');
    }

}
