<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;

use App\Videos;
use App\VideosCategories;
use App\Docs;
use App\Audios;
use Auth;
use Image;


class VideosController extends Controller {

    
    private $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function index() {
        not_permissions_redirect(have_premission(array(135)));
        
        
        $data['all_images'] = Videos::select('videos.*','ic.name')->Join('videos_categories as ic', 'ic.id', '=', 'videos.cat_id')->where('videos.user_id',0)->orderby('videos.id','desc')->paginate(10);
        $data['destinationPath'] = url('uploads/videos/');
        $data['destinationPath_thumb'] = url('uploads/videos/thumbnails/');
        //echo '<pre>'; print_r($data['all_images']); die();
        return view('admin.videos.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        not_permissions_redirect(have_premission(array(132)));
        $data['action'] = "Add";
        $data['VideosCategories'] = VideosCategories::get();
        return view('admin.videos.edit')->with($data);
    }

    public function edit($id) {
        not_permissions_redirect(have_premission(array(133)));
        
        $data['image'] = Videos::select('videos.*','ic.name')->Join('videos_categories as ic', 'ic.id', '=', 'videos.cat_id')->where('videos.user_id',0)->where('videos.id',$id)->orderby('videos.id','desc')->first();
        $data['VideosCategories'] = VideosCategories::get();
        $data['action'] = "Edit";
        //echo '<pre>'; print_r($data['image']->display_name); die();
        return view('admin.videos.edit')->with($data);
    }

    public function store(Request $request) {
        
        $input = $request->all();
        $image_id = $input['id'];
        //echo '<pre>'; print_r($input); die();
        if ($input['action'] == 'Add') {
            not_permissions_redirect(have_premission(array(132)));
        $destinationPath = 'uploads/videos';
        $destinationPath_thumb = 'uploads/videos/thumbnails';
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
            $videoname = preg_replace('/[^A-Za-z0-9\-]/', '',trim(microtime()));
            $fileName =  $videoname. '.' . $extention;
            if(move_uploaded_file($img, $destinationPath.'/'.$fileName))
            {
                $video_file_path = $destinationPath.'/'.$fileName;
                $path_to_store_generated_thumbnail = $destinationPath_thumb.'/'.$videoname.'.jpg';
                $second             = 1;
                $thumbSize       = '300x300';
                
                $cmd = "/usr/bin/ffmpeg -i $video_file_path -deinterlace -an -ss $second -t 00:00:01  -s $thumbSize -r 1 -y -vcodec mjpeg -f mjpeg $path_to_store_generated_thumbnail 2>&1";
                
                exec($cmd, $output, $retval);
                
                $input = array('cat_id'=>$input['cat_id'], 'user_id'=>0, 'display_name'=>$input['display_name'], 'file_name'=>$fileName, 'thumb'=>$videoname.'.jpg' , 'created_at' => date('Y-m-d H:i:s'));
                Videos::create($input);
            }
        }
        $data['all_images'] = Videos::select('videos.*','ic.name')->Join('videos_categories as ic', 'ic.id', '=', 'videos.cat_id')->where('videos.user_id',0)->orderby('videos.id','desc')->get();
        $data['destinationPath'] = url('uploads/videos/');
        $data['destinationPath_thumb'] = url('uploads/videos/');
        Alert::success('Success Message', 'Videos uploaded successfully!')->autoclose(3000);
               
        }else{
               not_permissions_redirect(have_premission(array(133)));
        $destinationPath = 'uploads/videos';
        $destinationPath_thumb = 'uploads/videos/thumbnails';
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
            $videoname = preg_replace('/[^A-Za-z0-9\-]/', '',trim(microtime()));
            $fileName =  $videoname. '.' . $extention;
            if(move_uploaded_file($img, $destinationPath.'/'.$fileName))
            {
                $video_file_path = $destinationPath.'/'.$fileName;
                $path_to_store_generated_thumbnail = $destinationPath_thumb.'/'.$videoname.'.jpg';
                $second             = 3;
                $thumbSize       = '300x300';
                
                $cmd = "/usr/bin/ffmpeg -i $video_file_path -deinterlace -an -ss $second -t 00:00:01  -s $thumbSize -r 1 -y -vcodec mjpeg -f mjpeg $path_to_store_generated_thumbnail 2>&1";
                
                exec($cmd, $output, $retval);
                
                $input = array('cat_id'=>$input['cat_id'], 'user_id'=>0, 'display_name'=>$input['display_name'], 'file_name'=>$fileName, 'thumb'=>$videoname.'.jpg');
               Videos::find($image_id)->update($input);   
            }
        }else{
                $input = array('cat_id'=>$input['cat_id'], 'display_name'=>$input['display_name']);
                Videos::find($image_id)->update($input);    
        }
        
        $data['all_images'] = Videos::select('videos.*','ic.name')->Join('videos_categories as ic', 'ic.id', '=', 'videos.cat_id')->where('videos.user_id',0)->orderby('videos.id','desc')->get();
        $data['destinationPath'] = url('uploads/videos/');
        $data['destinationPath_thumb'] = url('uploads/videos/');
        Alert::success('Success Message', 'Video updated successfully!')->autoclose(3000);
                
        
        }
        
        if (have_premission(array(135))) {
            return redirect('admin/videos');
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
        
       
        not_permissions_redirect(have_premission(array(134)));
        Videos::where('id', $id)->delete();
        Videos::destroy($id);
        Alert::success('Success Message', 'Video deleted successfully!')->autoclose(3000);
        return redirect('admin/videos');
    }

}
