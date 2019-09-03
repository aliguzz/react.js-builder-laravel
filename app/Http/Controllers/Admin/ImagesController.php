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


class ImagesController extends Controller {

    
    private $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function index() {
        not_permissions_redirect(have_premission(array(127)));
        
        
        $data['all_images'] = Images::select('images.*','ic.name')->Join('images_categories as ic', 'ic.id', '=', 'images.cat_id')->where('images.user_id',0)->orderby('images.id','desc')->paginate(10);
        $data['destinationPath'] = url('uploads/images/');
        $data['destinationPath_thumb'] = url('uploads/images/thumbnails/');
        //echo '<pre>'; print_r($data['all_images']); die();
        return view('admin.images.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        not_permissions_redirect(have_premission(array(124)));
        $data['action'] = "Add";
        $data['ImagesCategories'] = ImagesCategories::get();
        return view('admin.images.edit')->with($data);
    }

    public function edit($id) {
        not_permissions_redirect(have_premission(array(125)));
        
        $data['image'] = Images::select('images.*','ic.name')->Join('images_categories as ic', 'ic.id', '=', 'images.cat_id')->where('images.user_id',0)->where('images.id',$id)->orderby('images.id','desc')->first();
        $data['ImagesCategories'] = ImagesCategories::get();
        $data['action'] = "Edit";
        return view('admin.images.edit')->with($data);
    }

    public function store(Request $request) {
        
        $input = $request->all();
        $image_id = $input['id'];
        
        if ($input['action'] == 'Add') {
            not_permissions_redirect(have_premission(array(124)));
        $destinationPath = 'uploads/images';
        $destinationPath_thumb = 'uploads/images/thumbnails';
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
            mkdir($destinationPath_thumb, 0777, true);
        }

        foreach($_FILES as $file){
            $type = $file['type'];
            $img = $file['tmp_name'];
            $name = $file['name'];
            $extention = explode("/",$type);
            $extention = end($extention);
            $fileName = preg_replace('/[^A-Za-z0-9\-]/', '',trim(microtime())) . '.' . $extention;
            if(move_uploaded_file($img, $destinationPath.'/'.$fileName))
            {
                copy($destinationPath.'/'.$fileName, $destinationPath_thumb.'/'.$fileName);
                $image = Image::make($destinationPath_thumb.'/'.$fileName)->resize(300, 300)->save();
                $input = array('cat_id'=>$input['cat_id'], 'user_id'=>0, 'display_name'=>$input['display_name'], 'file_name'=>$fileName, 'created_at' => date('Y-m-d H:i:s'));
                Images::create($input);
            }
        }
        $data['all_images'] = Images::select('images.*','ic.name')->Join('images_categories as ic', 'ic.id', '=', 'images.cat_id')->where('images.user_id',0)->orderby('images.id','desc')->get();
        $data['destinationPath'] = url('uploads/images/');
        $data['destinationPath_thumb'] = url('uploads/images/');
        Alert::success('Success Message', 'Images uploaded successfully!')->autoclose(3000);
               
        }else{
               not_permissions_redirect(have_premission(array(125)));
        $destinationPath = 'uploads/images';
        $destinationPath_thumb = 'uploads/images/thumbnails';
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
            mkdir($destinationPath_thumb, 0777, true);
        }

       
        
        if(!empty($_FILES['thumbnail']['name'])){
            $type = $_FILES['thumbnail']['type'];
            $img = $_FILES['thumbnail']['tmp_name'];
            $name = $_FILES['thumbnail']['name'];
            $extention = explode("/",$type);
            $extention = end($extention);
            $fileName = preg_replace('/[^A-Za-z0-9\-]/', '',trim(microtime())) . '.' . $extention;
            if(move_uploaded_file($img, $destinationPath.'/'.$fileName))
            {
                copy($destinationPath.'/'.$fileName, $destinationPath_thumb.'/'.$fileName);
                $image = Image::make($destinationPath_thumb.'/'.$fileName)->resize(300, 300)->save();
                $input = array('cat_id'=>$input['cat_id'], 'display_name'=>$input['display_name'], 'file_name'=>$fileName);
                Images::find($image_id)->update($input);
            }
        }else{
                $input = array('cat_id'=>$input['cat_id'], 'display_name'=>$input['display_name']);
                Images::find($image_id)->update($input);    
        }
        
        $data['all_images'] = Images::select('images.*','ic.name')->Join('images_categories as ic', 'ic.id', '=', 'images.cat_id')->where('images.user_id',0)->orderby('images.id','desc')->get();
        $data['destinationPath'] = url('uploads/images/');
        $data['destinationPath_thumb'] = url('uploads/images/');
        Alert::success('Success Message', 'Images updated successfully!')->autoclose(3000);
                
        
        }
        
        if (have_premission(array(127))) {
            return redirect('admin/images');
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
        
       
        not_permissions_redirect(have_premission(array(126)));
        Images::where('id', $id)->delete();
        Images::destroy($id);
        Alert::success('Success Message', 'Images deleted successfully!')->autoclose(3000);
        return redirect('admin/images');
    }

}
