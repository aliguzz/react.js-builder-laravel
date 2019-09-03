<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PandaCrm;
use Illuminate\Http\Request;
use Alert;

class PandaCrmPackagesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        
      not_permissions_redirect(have_premission(array(115)));
		$CrmPackages = PandaCrm::paginate(10);
		//echo'<pre>';print_r($CrmPackages);exit;
		 return view('admin.PandaCrmPackages.index', compact('CrmPackages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        not_permissions_redirect(have_premission(array(112)));
         $data['action'] = "Add";
		// $data['package'] = null ;
        return view('admin.PandaCrmPackages.edit')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        not_permissions_redirect(have_premission(array(113)));
     $data['package'] = PandaCrm::findOrFail($id);
        $data['action'] = "Edit";
        return view('admin.PandaCrmPackages.edit')->with($data);
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
            not_permissions_redirect(have_premission(array(113)));
            $package =PandaCrm::findOrFail($input['id']);
            $package->update($input);
            Alert::success('Success Message', 'Package updated successfully!')->autoclose(3000);
        } else {
            not_permissions_redirect(have_premission(array(112)));
            PandaCrm::create($input);
            Alert::success('Success Message', 'Package added successfully!')->autoclose(3000);
        }
        return redirect('admin/crm-packages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        not_permissions_redirect(have_premission(array(114)));
          PandaCrm::destroy($id);
        Alert::success('Success Message', 'Package deleted successfully!')->autoclose(3000);
        return redirect('admin/crm-packages');
    }

}
