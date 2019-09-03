<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use App\User_Oauth;

class TokensController extends Controller
{
    private $user_oauth;

    public function __construct(User_Oauth $user_oauth) {
        $this->user_oauth = $user_oauth;
    }
    public function facebook_token(Request $request){
        $user_id = Auth::user()->id;
        $_token_fb = $request->post('my_fb_tok');
        $_id_fb = $request->post('my_fb_id');
        if($_token_fb && $user_id && $_id_fb){
            $uoi = User_Oauth::updateOrCreate(
                ['user_id' => $user_id],
                ['fb_token' => $_token_fb, 'fb_id' => $_id_fb]
            );
        }
        if($uoi){
            return response()->json([
                'response' => $uoi
            ]);
        }else{
            return response()->json([
                'response' => 'error'
            ]);
        }
    }
    public function instagram_token(Request $request){
        $user_id = Auth::user()->id;
        $_token_insta = $request->post('my_insta_tok');
        if($_token_insta && $user_id){
            $uoi = User_Oauth::updateOrCreate(
                ['user_id' => $user_id],
                ['insta_token' => $_token_insta]
            );
        }
        if($uoi){
            return response()->json([
                'response' => $uoi
            ]);
        }else{
            return response()->json([
                'response' => 'error'
            ]);
        }
    }
    public function google_photo_token(Request $request){
        $user_id = Auth::user()->id;
        $_token_google = $request->post('my_google_tok');
        $_id_google = $request->post('my_google_id');
        if($_token_google && $user_id && $_id_google){
            $uoi = User_Oauth::updateOrCreate(
                ['user_id' => $user_id],
                ['google_photos_token' => $_token_google, 'google_id' => $_id_google]
            );
        }
        if($uoi){
            return response()->json([
                'response' => $uoi
            ]);
        }else{
            return response()->json([
                'response' => 'error'
            ]);
        }
    }
    public function google_drive_token(Request $request){
        $user_id = Auth::user()->id;
        $_token_google = $request->post('my_google_tok');
        $_id_google = $request->post('my_google_id');
        if($_token_google && $user_id && $_id_google){
            $uoi = User_Oauth::updateOrCreate(
                ['user_id' => $user_id],
                ['google_drive_token' => $_token_google, 'google_id' => $_id_google]
            );
        }
        if($uoi){
            return response()->json([
                'response' => $uoi
            ]);
        }else{
            return response()->json([
                'response' => 'error'
            ]);
        }
    }
    public function dropbox_token(Request $request){
        $user_id = Auth::user()->id;
        $_token_db = $request->post('my_db_tok');
        if($_token_db && $user_id){
            $uoi = User_Oauth::updateOrCreate(
                ['user_id' => $user_id],
                ['dropbox_token' => $_token_db]
            );
        }
        if($uoi){
            return response()->json([
                'response' => $uoi
            ]);
        }else{
            return response()->json([
                'response' => 'error'
            ]);
        }
    }
    public function flickr_token(Request $request){
        die('Flickr');
    }

    public function getTokens(){
        $user_id = Auth::user()->id;
        $uoi = User_Oauth::where('user_id', $user_id)->firstOrFail();
        if($uoi){
            return response()->json([
                'response' => $uoi
            ]);
        }else{
            return response()->json([
                'response' => 'error'
            ]);
        }
    }
}
