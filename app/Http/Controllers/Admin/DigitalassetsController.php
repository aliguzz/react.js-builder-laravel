<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DigitalAssets;
use Alert;

class DigitalassetsController extends Controller {

    /**
     * Display a dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        $data['digitalassets'] = DigitalAssets::paginate(10);
        return view('admin.digitalassets.index')->with($data);
    }

    public function create() {
        $data['action'] = "Add";
        return view('admin.digitalassets.edit')->with($data);
    }

    public function edit($id) {
        $data['action'] = "Edit";
        $data['DigitalAsset'] = DigitalAssets::findOrFail($id);
        return view('admin.digitalassets.edit')->with($data);
    }

    public function store(Request $request) { 
        $input = $request->all();
        if ($input['action'] == 'Edit') {
            $DigitalAssets = DigitalAssets::findOrFail($input['id']);
            $DigitalAssets->update($input);
            $old_image = $DigitalAssets->file;
            $photo = "";
            if (isset($_FILES['file']['name']) && $_FILES['file']['size'] > 0) {
                $ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
                $photo = "Digital-Asset" . $input['id'] . '-' . uniqid() . '.' . $ext;
                $destinationPath = "uploads/digital_assets/" . $photo;
                move_uploaded_file($_FILES['file']['tmp_name'], $destinationPath);
                if ($old_image) {
                    File::delete("uploads/digital_assets/" . $old_image);
                }
            } else {
                $photo = $old_image;
            }
            $blog_update['file'] = $photo;
            $DigitalAssets->update($blog_update);
            Alert::success('Success Message', 'Digital Asset updated successfully!')->autoclose(3000);
        } else {
            $DigitalAssets = DigitalAssets::create($input);
            if (isset($_FILES['file']['name']) && $_FILES['file']['size'] > 0) {
                $ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
                $photo = "Digital-Asset" . $input['id'] . '-' . uniqid() . '.' . $ext;
                $destinationPath = "uploads/digital_assets/" . $photo;
                move_uploaded_file($_FILES['file']['tmp_name'], $destinationPath);
                $blog_update['file'] = $photo;
                $DigitalAssets->update($blog_update);
            }
            Alert::success('Success Message', 'Digital Asset added successfully!')->autoclose(3000);
        }
            return redirect('admin/assets');
    }

}
