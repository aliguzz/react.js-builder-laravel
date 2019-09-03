<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Oauth extends Model
{
    protected $table = 'users_oauth';
    public $timestamps = false;

    protected $fillable = ['user_id','fb_id','fb_token','insta_id', 'insta_token', 'dropbox_id', 'dropbox_token', 'google_id', 'google_photos_token', 'google_drive_token', 'flickr_id' , 'flickr_token'];
}
