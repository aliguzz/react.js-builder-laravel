<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Packages;
use Illuminate\Http\Request;
use Alert;

class PackagesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        not_permissions_redirect(have_premission(array(107)));
        $packages = Packages::paginate(10);
        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        not_permissions_redirect(have_premission(array(104)));
        $data['action'] = "Add";
        return view('admin.packages.edit')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        not_permissions_redirect(have_premission(array(105)));
        $data['package'] = Packages::findOrFail($id);
        $data['action'] = "Edit";
        return view('admin.packages.edit')->with($data);
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
            not_permissions_redirect(have_premission(array(105)));
            $package = Packages::findOrFail($input['id']);
            $package->update($input);
            Alert::success('Success Message', 'Package updated successfully!')->autoclose(3000);
        } else {
            not_permissions_redirect(have_premission(array(104)));
            Packages::create($input);
            Alert::success('Success Message', 'Package added successfully!')->autoclose(3000);
        }
        return redirect('admin/packages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        not_permissions_redirect(have_premission(array(106)));
        Packages::destroy($id);
        Alert::success('Success Message', 'Package deleted successfully!')->autoclose(3000);
        return redirect('admin/packages');
    }

}
