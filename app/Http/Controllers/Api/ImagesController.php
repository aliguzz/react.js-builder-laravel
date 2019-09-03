<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\yahoo;
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
    public function img_cats() {
        $img_cats = ImagesCategories::where('status',1)->get();
        echo json_encode($img_cats);
    }
    public function all_images() {
        $data['all_images'] = Images::where("user_id",0)->get();
        $data['cat_images'] = ImagesCategories::with('images')->get();
        echo json_encode($data); exit;
    }
    public function shutterstock_images_categories(){
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1');
        curl_setopt($ch, CURLOPT_URL, "https://api.shutterstock.com/v2/images/categories");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_USERPWD, "ca023-06b4a-8d0f8-aeadf-5ab92-40d9a:f0d3c-134c8-2ece4-11297-e560a-2cccc");

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);
        echo json_encode(json_decode($result)); exit;
    }
    public function shutterstock_images(Request $request){
        $input = $this->request->all();
        $category_id = $input['category_id'];
        $page = $input['page'];
        $per_page = $input['per_page'];
        $query_string = '?page='.$page.'&per_page='.$per_page;
        if($category_id != '' && $category_id != 'all'){
            $query_string = $query_string . '&category='.$category_id;
        }
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1');
        curl_setopt($ch, CURLOPT_URL, "https://api.shutterstock.com/v2/images/search".$query_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_USERPWD, "ca023-06b4a-8d0f8-aeadf-5ab92-40d9a:f0d3c-134c8-2ece4-11297-e560a-2cccc");

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);
        echo json_encode(json_decode($result)); exit;
    }
    public function upload_images(Request $request){
        $input = $this->request->all();
        $user = Auth::user();
        $destinationPath = 'uploads/images/'.$user->id;
        $destinationPath_thumb = 'uploads/images/'.$user->id.'/thumbnails';
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
                $input = array('cat_id'=>0, 'user_id'=>$user->id, 'display_name'=>$name, 'file_name'=>$fileName);
                Images::create($input);
            }
        }
        $data['all_images'] = Images::where("user_id",$user->id)->orderby('id','desc')->get();
        $data['destinationPath'] = url('uploads/images/'.$user->id);
        $data['destinationPath_thumb'] = url('uploads/images/'.$user->id.'/thumbnails');
        echo json_encode($data); exit;
    }

    public function delete_images(Request $request){
        $input = $this->request->all();
        $user = Auth::user();
       
        $imageIds = $input['imageIds'];
        foreach($imageIds as $del){
            $todel = Images::where("id",$del)->orderby('id','desc')->first();
            $destinationPath = 'uploads/images/'.$user->id.'/'.$todel->file_name;
            $destinationPath_thumb = 'uploads/images/'.$user->id.'/thumbnails'.'/'.$todel->file_name;

            if (file_exists($destinationPath)) {
                unlink($destinationPath);
            }
            if (file_exists($destinationPath_thumb)) {
                unlink($destinationPath_thumb);
            }
            Images::destroy($del);
        }
        echo json_encode(array("type"=>"success"));
        exit;
    }

    public function users_images(){
        $user = Auth::user();
        $data['all_images'] = Images::where("user_id",$user->id)->orderby('id','desc')->get();
        $data['destinationPath'] = url('uploads/images/'.$user->id);
        $data['destinationPath_thumb'] = url('uploads/images/'.$user->id.'/thumbnails');
        echo json_encode($data); exit;
    }
    public function upload_svgs(Request $request){
        $input = $this->request->all();
        $user = Auth::user();
        $destinationPath = 'uploads/svgs/'.$user->id;
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        foreach($_FILES as $file){
            $type = $file['type'];
            $img = $file['tmp_name'];
            $name = $file['name'];
            $extention = 'svg';
            $fileName = preg_replace('/[^A-Za-z0-9\-]/', '',trim(microtime())) . '.' . $extention;
            if(move_uploaded_file($img, $destinationPath.'/'.$fileName))
            {
                $input = array('cat_id'=>0, 'user_id'=>$user->id, 'display_name'=>$name, 'file_name'=>$fileName);
                Svgs::create($input);
            }
        }
        $data['all_svgs'] = Svgs::where("user_id",$user->id)->orderby('id','desc')->get();
        $data['destinationPath'] = url('uploads/svgs/'.$user->id);
        echo json_encode($data); exit;
    }
    public function delete_svgs(Request $request){
        $input = $this->request->all();
        $user = Auth::user();
       
        $imageIds = $input['vectorIds'];
        foreach($imageIds as $del){
            $todel = Svgs::where("id",$del)->orderby('id','desc')->first();
            $destinationPath = 'uploads/svgs/'.$user->id.'/'.$todel->file_name;
            if (file_exists($destinationPath)) {
                unlink($destinationPath);
            }
            Svgs::destroy($del);
        }
        echo json_encode(array("type"=>"success"));
        exit;
    }
    public function users_svgs(){
        $user = Auth::user();
        $data['all_svgs'] = Svgs::where("user_id",$user->id)->orderby('id','desc')->get();
        $data['destinationPath'] = url('uploads/svgs/'.$user->id);
        echo json_encode($data); exit;
    }
    public function shutterstock_test(){
        
       $query_string = '';
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1');
        curl_setopt($ch, CURLOPT_URL, "https://api.shutterstock.com/v2/reseller/activations".$query_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_USERPWD, "ca023-06b4a-8d0f8-aeadf-5ab92-40d9a:f0d3c-134c8-2ece4-11297-e560a-2cccc");

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);
       print_r($result);
    }
    public function svg_cats() {
        $svg_cats = SvgsCategories::where('status',1)->get();
        echo json_encode($svg_cats);
    }
    public function all_svgs() {
        $data['all_svgs'] = Svgs::where("user_id",0)->get();
        $data['cat_svgs'] = SvgsCategories::with('svgs')->get();
        echo json_encode($data); exit;
    }
    public function upload_videos(Request $request){
        $input = $this->request->all();
        $user = Auth::user();
        $destinationPath = 'uploads/videos/'.$user->id;
        $thumbnail_path = $destinationPath.'/thumbnails';
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
            mkdir($thumbnail_path, 0777, true);
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
                $path_to_store_generated_thumbnail = $thumbnail_path.'/'.$videoname.'.jpg';
                $second             = 1;
                $thumbSize       = '300x300';
                
                $cmd = "/usr/bin/ffmpeg -i $video_file_path -deinterlace -an -ss $second -t 00:00:01  -s $thumbSize -r 1 -y -vcodec mjpeg -f mjpeg $path_to_store_generated_thumbnail 2>&1";
                
                exec($cmd, $output, $retval);

                $input = array('cat_id'=>0, 'user_id'=>$user->id, 'display_name'=>$name, 'file_name'=>$fileName, 'thumb'=>$videoname.'.jpg');
                Videos::create($input);
            }
        }
        $data['all_videos'] = Videos::where("user_id",$user->id)->orderby('id','desc')->get();
        $data['destinationPath'] = url('uploads/videos/'.$user->id);
        echo json_encode($data); exit;
    }
    public function users_videos(){
        $user = Auth::user();
        $data['all_videos'] = Videos::where("user_id",$user->id)->orderby('id','desc')->get();
        $data['destinationPath'] = url('uploads/videos/'.$user->id);
        echo json_encode($data); exit;
    }
    public function delete_videos(Request $request){
        $input = $this->request->all();
        $user = Auth::user();
       
        $imageIds = $input['videoIds'];
        foreach($imageIds as $del){
            $todel = Videos::where("id",$del)->orderby('id','desc')->first();
            $destinationPath = 'uploads/videos/'.$user->id.'/'.$todel->file_name;
            $destinationPath_thumb = 'uploads/videos/'.$user->id.'/thumbnails'.'/'.$todel->thumb;

            if (file_exists($destinationPath)) {
                unlink($destinationPath);
            }
            if (file_exists($destinationPath_thumb)) {
                unlink($destinationPath_thumb);
            }
            Videos::destroy($del);
        }
        echo json_encode(array("type"=>"success"));
        exit;
    }
    public function video_cats() {
        $video_cats = VideosCategories::where('status',1)->get();
        echo json_encode($video_cats);
    }
    public function all_videos() {
        $data['all_videos'] = Videos::where("user_id",0)->get();
        $data['cat_videos'] = VideosCategories::with('videos')->get();
        echo json_encode($data); exit;
    }
    public function upload_docs(Request $request){
        $input = $this->request->all();
        $user = Auth::user();
        $destinationPath = 'uploads/docs/'.$user->id;
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
        foreach($_FILES as $file){
            $type = $file['type'];
            $img = $file['tmp_name'];
            $name = $file['name'];
            $extention = explode(".",$name);
            $extention = end($extention);
            $fileName = preg_replace('/[^A-Za-z0-9\-]/', '',trim(microtime())) . '.' . $extention;
            if(move_uploaded_file($img, $destinationPath.'/'.$fileName))
            {
                $input = array('user_id'=>$user->id, 'display_name'=>$name, 'file_name'=>$fileName);
                Docs::create($input);
            }
        }
        $data['all_docs'] = Docs::where("user_id",$user->id)->orderby('id','desc')->get();
        $data['destinationPath'] = url('uploads/docs/'.$user->id);
        echo json_encode($data); exit;
    }
    public function delete_docs(Request $request){
        $input = $this->request->all();
        $user = Auth::user();
        $imageIds = $input['docIds'];
        foreach($imageIds as $del){
            $todel = Docs::where("id",$del)->orderby('id','desc')->first();
            $destinationPath = 'uploads/docs/'.$user->id.'/'.$todel->file_name;
            if (file_exists($destinationPath)) {
                unlink($destinationPath);
            }
            Docs::destroy($del);
        }
        echo json_encode(array("type"=>"success"));
        exit;
    }
    public function users_docs(){
        $user = Auth::user();
        $data['all_docs'] = Docs::where("user_id",$user->id)->orderby('id','desc')->get();
        $data['destinationPath'] = url('uploads/docs/'.$user->id);
        echo json_encode($data); exit;
    }
    public function upload_audios(Request $request){
        $input = $this->request->all();
        $user = Auth::user();
        $destinationPath = 'uploads/audios/'.$user->id;
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
        foreach($_FILES as $file){
            $type = $file['type'];
            $img = $file['tmp_name'];
            $name = $file['name'];
            $extention = explode(".",$name);
            $extention = end($extention);
            $fileName = preg_replace('/[^A-Za-z0-9\-]/', '',trim(microtime())) . '.' . $extention;
            if(move_uploaded_file($img, $destinationPath.'/'.$fileName))
            {
                $input = array('user_id'=>$user->id, 'display_name'=>$name, 'file_name'=>$fileName);
                Audios::create($input);
            }
        }
        $data['all_audios'] = Audios::where("user_id",$user->id)->orderby('id','desc')->get();
        $data['destinationPath'] = url('uploads/audios/'.$user->id);
        echo json_encode($data); exit;
    }
    public function delete_audios(Request $request){
        $input = $this->request->all();
        $user = Auth::user();
        $imageIds = $input['trackIds'];
        foreach($imageIds as $del){
            $todel = Audios::where("id",$del)->orderby('id','desc')->first();
            $destinationPath = 'uploads/audios/'.$user->id.'/'.$todel->file_name;
            if (file_exists($destinationPath)) {
                unlink($destinationPath);
            }
            Audios::destroy($del);
        }
        echo json_encode(array("type"=>"success"));
        exit;
    }
    public function users_audios(){
        $user = Auth::user();
        $data['all_audios'] = Audios::where("user_id",$user->id)->orderby('id','desc')->get();
        $data['destinationPath'] = url('uploads/audios/'.$user->id);
        echo json_encode($data); exit;
    }
    public function getFlickrImages(){
        require_once app_path() . '/Helpers/yahoo/config.inc.php';
        // require_once app_path() . '/Helpers/yahoo/request_token.php';
        try {
            $o = new OAuth(OAUTH_CONSUMER_KEY,OAUTH_CONSUMER_SECRET,OAUTH_SIG_METHOD_HMACSHA1,OAUTH_AUTH_TYPE_URI);
            $arrayResp = $o->getRequestToken("https://api.login.yahoo.com/oauth/v2/get_request_token");
            file_put_contents(OAUTH_TMP_DIR . "/request_token_resp",serialize($arrayResp));
            $authorizeUrl = $arrayResp["xoauth_request_auth_url"];
            if(PHP_SAPI=="cli") {
                echo "Navigate your http client to: {$authorizeUrl}\n";
            } else {
                header("Location: {$authorizeUrl}");
            }
        } catch(OAuthException $E) {
            echo "Response: ". $E->lastResponse . "\n";
        }
    }

}
