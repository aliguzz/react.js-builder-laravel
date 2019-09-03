<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\EmailTemplates;
use App\SmsTemplates;
use Illuminate\Http\Request;
use Session;
use Alert;
use Hash;
use File;

class EmailTemplatesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        not_permissions_redirect(have_premission(array(103)));
        $data['templates'] = EmailTemplates::Orderby('id', 'DESC')->paginate(10);
        $data['total'] = EmailTemplates::count();
        return view('admin.emailtemplates.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        not_permissions_redirect(have_premission(array(29)));
        $data['action'] = "Add";
        return view('admin.emailtemplates.edit')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        not_permissions_redirect(have_premission(array(30)));
        $data['action'] = "Edit";
        $data['template'] = EmailTemplates::findOrFail($id);
        return view('admin.emailtemplates.edit')->with($data);
    }
    public function advance_builder($id) {
        $data['action'] = "Edit";
        $data['template'] = EmailTemplates::findOrFail($id);
        return view('admin.emailtemplates.advance_builder')->with($data);
    }
    
    public function advance_builder_text($id) {
        $data['action'] = "Edit";
        $data['template'] = SmsTemplates::findOrFail($id);
        return view('admin.emailtemplates.advance_builder_text')->with($data);
    }

    public function advance_builder_EditPreviewEmail($id, $rand_id) {

        $data['rand_id'] = $rand_id;
        $data['action'] = "Edit";
        $data['template'] = EmailTemplates::findOrFail($id);
        return view('admin.emailtemplates.edit_preview_email_template')->with($data);
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
            not_permissions_redirect(have_premission(array(30)));
            $template = EmailTemplates::findOrFail($input['id']);
            $template->update($input);
            Alert::success('Success Message', 'Template updated successfully!')->autoclose(3000);
        } else {
            not_permissions_redirect(have_premission(array(29)));
            $user = \Auth::user();
            if ($user->parent_id == 0) {
                $input['user_id'] = $user->id;
            } else {
                $input['user_id'] = $user->parent_id;
            }
            $template = EmailTemplates::create($input);
            Alert::success('Success Message', 'Template added successfully!')->autoclose(3000);
        }
        if ($request->hasFile('attachment')) {
            $old_attachment = $input['old_attachment'];
            $destinationPath = 'uploads/emailtemplates'; // upload path
            $attachment = $request->file('attachment'); // file
            $extension = $attachment->getClientOriginalExtension(); // getting image extension
            $fileName = $template->id . '-' . time() . '.' . $extension; // renameing image
            $attachment->move($destinationPath, $fileName); // uploading file to given path
            //remove old image
            if ($old_attachment) {
                File::delete($destinationPath . '/' . $old_attachment);
            }
            //insert image record            
            $temp_attachment['attachment'] = $fileName;
            $template->update($temp_attachment);
        }
        if(isset($input['refer']) && $input['refer'] == 1){
        $data['templates'] = EmailTemplates::Orderby('id', 'DESC')->paginate(10);
        $data['total'] = EmailTemplates::count();
        return view('admin.emailtemplates.index')->with($data);
        }else{
         return redirect('admin/contacts/emails/'.@Session::get('session_last_project')[0]->id.'/lists');
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
        not_permissions_redirect(have_premission(array(31)));
        EmailTemplates::destroy($id);

        Alert::success('Success Message', 'Template deleted!');

        return redirect('admin/email-templates');
    }

    public function del_file(Request $request) {
        $input = $request->all();
        $template = EmailTemplates::findOrFail($input['id']);

        if ($template->attachment != '') {
            File::delete('uploads/emailtemplates' . '/' . $template->attachment);

            $temp_attachment['attachment'] = '';
            $template->update($temp_attachment);
        }

        return 1;
    }

}
