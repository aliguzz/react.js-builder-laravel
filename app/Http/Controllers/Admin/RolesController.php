<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Roles;
use Illuminate\Http\Request;
use Alert;

class RolesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        not_permissions_redirect(have_premission(array(60)));
        $roles = Roles::get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create() {
        not_permissions_redirect(have_premission(array(61)));
        $data['action'] = "Add";
        $data['rights'] = \DB::table('modules')->join('role_rights', 'modules.id', '=', 'role_rights.module_id')->select('modules.module as module_name', 'role_rights.*')->orderby('role_rights.module_id', 'ASC')->orderby('role_rights.id', 'ASC')->get();
        return view('admin.roles.edit')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        not_permissions_redirect(have_premission(array(58)));
        $data['role'] = Roles::findOrFail($id);
        $data['action'] = "Edit";
        $data['rights'] = \DB::table('modules')->join('role_rights', 'modules.id', '=', 'role_rights.module_id')->select('modules.module as module_name', 'role_rights.*', \DB::raw('(select id from `permission` WHERE permission.right_id = `role_rights`.`id` AND permission.role_id = ' . $id . ') AS is_selected'))->where('role_rights.is_active',1)->orderby('role_rights.module_id', 'ASC')->orderby('role_rights.id', 'ASC')->get();
        $data['role_id'] = $id;
        return view('admin.roles.edit')->with($data);
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
            not_permissions_redirect(have_premission(array(58)));
            $Roles = Roles::findOrFail($input['id']);
            $Roles->update($input);
            Alert::success('Success Message', 'Role updated successfully!')->autoclose(3000);
        } else {
            not_permissions_redirect(have_premission(array(61)));
            $Roles = Roles::create($input);
            Alert::success('Success Message', 'Role created successfully!')->autoclose(3000);
        }
        \DB::table('permission')->where('role_id', $Roles->id)->delete();
        if (isset($input['right_id'])) {
            foreach ($input['right_id'] as $right) {
                \DB::table('permission')->insert(['role_id' => $Roles->id, 'right_id' => $right]);
            }
        }
        return redirect('admin/roles');
    }

    public function get_role_permissions(Request $request) {

        $input = $request->all();
        $rights = \DB::table('role_rights')->join('permission', 'role_rights.id', '=', 'permission.right_id')->select('role_rights.right_name as right_name', 'permission.right_id as right_id', \DB::raw('(select module from `modules` WHERE modules.id = `role_rights`.`module_id`) AS module_name'), \DB::raw('(select id from `user_permissions` WHERE user_permissions.right_id = permission.right_id AND user_permissions.user_id = "' . $input['user_id'] . '") AS is_selected'))->where('permission.role_id', $input["role"])->orderby('role_rights.module_id', 'ASC')->orderby('role_rights.id', 'ASC')->get();

        if (isset($input["is_supper"]) && $input["role"] > 2) {
            $users = \DB::table('users')->where('role', '<', 3)->get();
            echo '<div class="form-group"><label for="parent_id" class="col-sm-2 control-label">Parent</label><div class="col-sm-4"><select name="parent_id" id="parent_id" class="form-control" data-rule-required="true" aria-required="true">';
            foreach ($users as $us) {
                if (isset($input["parent_id"]) && $input["parent_id"] == $us->id) {
                    echo '<option value="' . $us->id . '" selected>' . $us->first_name . ' ' . $us->last_name . '</option>';
                } else {
                    echo '<option value="' . $us->id . '">' . $us->first_name . ' ' . $us->last_name . '</option>';
                }
            }
            echo '</select></div></div>';
        }
        if (isset($input["is_supper"]) && $input["role"] == 2) {
            $package = \DB::table('packages')->where('is_active', 1)->get();

            //$current_package = \App\DbModel::current_package($input['user_id']);

            $note = $input['action'] == 'Edit' ? 'On select package will be upgraded' : '';

            echo '<div class="form-group"><label for="package" class="col-sm-2 control-label">Package </label><div class="col-sm-4"><select name="package" id="package" class="form-control">';
            echo '<option value="" disabled="" selected="" hidden="">Please Select Package</option>';
            foreach ($package as $pack) {
                // $selected = $current_package->package_id == $pack->id ? 'selected' : '';

                echo '<option  value="' . $pack->id . '">' . $pack->title . '</option>';
            }
            echo '</select><span class="text-danger" id="package-error"> <small> ' . $note . ' </small> </span></div></div>';
        }
        $previous_module = '';
        $view_rights = \DB::table('user_permissions')->where('user_id', $input['user_id'])->get();

        foreach ($rights as $right) {

            $count = array();
            if ($right->module_name != $previous_module) {

                if ($previous_module != '') {
                    echo '</div></div>';
                }

                $per = \DB::table('modules')
                        ->join('role_rights', 'role_rights.module_id', '=', 'modules.id')
                        ->join('permission', 'permission.right_id', '=', 'role_rights.id')
                        ->where('modules.is_active', 1)
                        ->where('modules.module', $right->module_name)
                        ->where('permission.role_id', $input["role"])
                        ->get();

                if ($per) {
                    $counter = 0;
                    foreach ($per as $p) {
                        $data = \DB::table('user_permissions')->where('right_id', $p->right_id)->where('user_id', $input['user_id'])->where('is_active', 1)->first();
                        if (isset($data) && $data != '') {
                            $count[] = $counter + 1;
                        }
                    }
                }

                if (count($count) == count($per)) {
                    $all_checked = 'checked';
                } else {
                    $all_checked = '';
                }

                echo '<div class="form-group permissions-checkboxes"><label class="col-sm-2 control-label">' . $right->module_name . '<br><input ' . $all_checked . ' class="check_all" type="checkbox"/> <small>Check All</small></label><div class="col-sm-9">';
            }

            if ($right->is_selected > 0) {
                $checked = 'checked';
            } else {
                $checked = '';
            }

            echo '<div class="col-sm-4"><input class="permission-checkbox" type="checkbox" name="right_id[]" value="' . $right->right_id . '" ' . $checked . '/> ' . $right->right_name . '</div>';

            $checked_view_6 = '';
            $checked_view_7 = '';
            $checked_view_8 = '';
            $checked_view_5 = '';

            if (isset($view_rights) && $view_rights != '' && $input['action'] == 'Edit') {
                foreach ($view_rights as $v) {
                    if ($v->right_id == 6) {
                        $checked_view_6 = 'checked';
                    } else if ($v->right_id == 7) {
                        $checked_view_7 = 'checked';
                    } else if ($v->right_id == 8) {
                        $checked_view_8 = 'checked';
                    } else {
                        $checked_view_5 = 'checked';
                    }
                }
            }

            if ($right->right_id == 4) {

                if ($input['action'] != 'Edit') {
                    $checked_view_5 = 'checked';
                }

                echo '<div class="refrence-selection sub4" style="display:none;"><label><input ' . $checked_view_5 . ' type="radio" name="right_id_4" value="5" > View All Leads Only </label><label><input type="radio" ' . $checked_view_6 . ' name="right_id_4" value="6"> View Self Assigned Leads Only </label><label><input type="radio" ' . $checked_view_7 . '   name="right_id_4" value="7"> View Group Assigned Leads Only </label><label><input type="radio" ' . $checked_view_8 . '  name="right_id_4" value="8"> View Assosiated Partner Leads Only </label></div>';
            }
            $previous_module = $right->module_name;
            //  $count = array();
        }
        echo '</div></div>';
    }
	
	public function destroy($id) {
        not_permissions_redirect(have_premission(array(66)));
		Roles::find($id)->delete();
        Alert::success('Success Message', 'Role delete successfully!')->autoclose(3000);
        return redirect()->back();
    }

}
