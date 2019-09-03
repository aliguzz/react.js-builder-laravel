<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PandaFlow;
use Illuminate\Http\Request;
use Alert;

class PandaFlowPackagesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
      not_permissions_redirect(have_premission(array(123)));
		$FlowPackages = PandaFlow::paginate(10);
		//echo'<pre>';print_r($FlowPackages);exit;
		 return view('admin.PandaFlowPackages.index', compact('FlowPackages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        not_permissions_redirect(have_premission(array(120)));
         $data['action'] = "Add";
		// $data['package'] = null ;
        return view('admin.PandaFlowPackages.edit')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        not_permissions_redirect(have_premission(array(121)));
     $data['package'] = PandaFlow::findOrFail($id);
        $data['action'] = "Edit";
        return view('admin.PandaFlowPackages.edit')->with($data);
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
            not_permissions_redirect(have_premission(array(121)));
            $package =PandaFlow::findOrFail($input['id']);
            $package->update($input);
            Alert::success('Success Message', 'Package updated successfully!')->autoclose(3000);
        } else {
            not_permissions_redirect(have_premission(array(120)));
            PandaFlow::create($input);
            Alert::success('Success Message', 'Package added successfully!')->autoclose(3000);
        }
        return redirect('admin/flow-packages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        not_permissions_redirect(have_premission(array(122)));
         PandaFlow::destroy($id);
        Alert::success('Success Message', 'Package deleted successfully!')->autoclose(3000);
        return redirect('admin/flow-packages');
    }

}
