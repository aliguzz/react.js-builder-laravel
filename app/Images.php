<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Images extends Eloquent {

    protected $primaryKey = 'id';

    protected $fillable = ['cat_id', 'user_id', 'display_name','file_name','created_at'];
}