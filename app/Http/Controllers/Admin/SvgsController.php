<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\Images;
use App\ImagesCategories;
use App\Svgs;
use App\SvgsCategories;
use App\Videos;
use App\VideosCategories;
use App\Docs;
use App\Audios;
use Auth;
use Image;


class SvgsController extends Controller {

    
    private $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function index() {
        not_permissions_redirect(have_premission(array(131)));
        
        
        $data['all_images'] = Svgs::select('svgs.*','ic.name')->Join('svgs_categories as ic', 'ic.id', '=', 'svgs.cat_id')->where('svgs.user_id',0)->orderby('svgs.id','desc')->paginate(10);
        $data['destinationPath'] = url('uploads/svgs/');
        $data['destinationPath_thumb'] = url('uploads/svgs/thumbnails/');
        //echo '<pre>'; print_r($data['all_images']); die();
        return view('admin.svgs.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        not_permissions_redirect(have_premission(array(128)));
        $data['action'] = "Add";
        $data['SvgsCategories'] = SvgsCategories::get();
        return view('admin.svgs.edit')->with($data);
    }

    public function edit($id) {
        not_permissions_redirect(have_premission(array(129)));
        
        $data['image'] = Svgs::select('svgs.*','ic.name')->Join('svgs_categories as ic', 'ic.id', '=', 'svgs.cat_id')->where('svgs.user_id',0)->where('svgs.id',$id)->orderby('svgs.id','desc')->first();
        $data['SvgsCategories'] = SvgsCategories::get();
        $data['action'] = "Edit";
        //echo '<pre>'; print_r($data['image']->file_name); die();
        return view('admin.svgs.edit')->with($data);
    }

    public function store(Request $request) {
        
        $input = $request->all();
        $image_id = $input['id'];
        //echo '<pre>'; print_r($input); die();
        if ($input['action'] == 'Add') {
            not_permissions_redirect(have_premission(array(128)));
        $destinationPath = 'uploads/svgs';
        $destinationPath_thumb = 'uploads/svgs/thumbnails';
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
            mkdir($destinationPath_thumb, 0777, true);
        }

        foreach($_FILES as $file){
            $type = $file['type'];
            $img = $file['tmp_name'];
            $name = $file['name'];
            $extention = 'svg';
            $fileName = preg_replace('/[^A-Za-z0-9\-]/', '',trim(microtime())) . '.' . $extention;
            if(move_uploaded_file($img, $destinationPath.'/'.$fileName))
            {
                //copy($destinationPath.'/'.$fileName, $destinationPath_thumb.'/'.$fileName);
                $input = array('cat_id'=>$input['cat_id'], 'user_id'=>0, 'display_name'=>$input['display_name'], 'file_name'=>$fileName, 'created_at' => date('Y-m-d H:i:s'));
                Svgs::create($input);
            }
        }
        $data['all_images'] = Svgs::select('svgs.*','ic.name')->Join('svgs_categories as ic', 'ic.id', '=', 'svgs.cat_id')->where('svgs.user_id',0)->orderby('svgs.id','desc')->get();
        $data['destinationPath'] = url('uploads/svgs/');
        $data['destinationPath_thumb'] = url('uploads/svgs/');
        Alert::success('Success Message', 'Vector image uploaded successfully!')->autoclose(3000);
               
        }else{
               not_permissions_redirect(have_premission(array(129)));
        $destinationPath = 'uploads/svgs';
        $destinationPath_thumb = 'uploads/svgs/thumbnails';
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
            mkdir($destinationPath_thumb, 0777, true);
        }

        
        if(!empty($_FILES['thumbnail']['name'])){
            $type = $_FILES['thumbnail']['type'];
            $img = $_FILES['thumbnail']['tmp_name'];
            $name = $_FILES['thumbnail']['name'];
            $extention = 'svg';
            $fileName = preg_replace('/[^A-Za-z0-9\-]/', '',trim(microtime())) . '.' . $extention;
            if(move_uploaded_file($img, $destinationPath.'/'.$fileName))
            {
                //copy($destinationPath.'/'.$fileName, $destinationPath_thumb.'/'.$fileName);
                $input = array('cat_id'=>$input['cat_id'], 'display_name'=>$input['display_name'], 'file_name'=>$fileName);
                Svgs::find($image_id)->update($input);
            }
        }else{
                $input = array('cat_id'=>$input['cat_id'], 'display_name'=>$input['display_name']);
                Svgs::find($image_id)->update($input);    
        }
        
        $data['all_images'] = Svgs::select('svgs.*','ic.name')->Join('svgs_categories as ic', 'ic.id', '=', 'svgs.cat_id')->where('svgs.user_id',0)->orderby('svgs.id','desc')->get();
        $data['destinationPath'] = url('uploads/svgs/');
        $data['destinationPath_thumb'] = url('uploads/svgs/');
        Alert::success('Success Message', 'Vector image updated successfully!')->autoclose(3000);
                
        
        }
        
        if ((have_premission(array(131)))) {
            return redirect('admin/vector');
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
        
       
        not_permissions_redirect(have_premission(array(130)));
        Svgs::where('id', $id)->delete();
        Svgs::destroy($id);
        Alert::success('Success Message', 'Vector images deleted successfully!')->autoclose(3000);
        return redirect('admin/vector');
    }

}
