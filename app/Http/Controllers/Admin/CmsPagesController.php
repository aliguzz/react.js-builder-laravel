<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CmsPages;
use Illuminate\Http\Request;
use Alert;

class CmsPagesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        not_permissions_redirect(have_premission(array(44)));
        $data['cmsPages'] = CmsPages::paginate(10);
        $data['total'] = CmsPages::count();
        return view('admin.cmsPages.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        not_permissions_redirect(have_premission(array(45)));
        $data['action'] = "Add";
        return view('admin.cmsPages.edit')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        not_permissions_redirect(have_premission(array(46)));
        $data['action'] = "Edit";
        $data['cmsPage'] = CmsPages::findOrFail($id);
        return view('admin.cmsPages.edit')->with($data);
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
            not_permissions_redirect(have_premission(array(46)));
            $CmsPages = CmsPages::findOrFail($input['id']);
            if ($CmsPages->is_static == 1) {
                file_put_contents($CmsPages->description, str_replace('textbox', 'textarea', $input['file_content']));
            }
            $CmsPages->update($input);
            Alert::success('Success Message', 'CMS Page updated successfully!')->autoclose(3000);
        } else {
            not_permissions_redirect(have_premission(array(45)));
            CmsPages::create($input);
            Alert::success('Success Message', 'CMS Page added successfully!')->autoclose(3000);
        }

        if(have_premission(array(44))){
            return redirect('admin/cms-pages');
            
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
        not_permissions_redirect(have_premission(array(47)));
        CmsPages::destroy($id);
        Alert::success('Success Message', 'CMS Page deleted successfully!')->autoclose(3000);
        return redirect('admin/cms-pages');
    }

}
