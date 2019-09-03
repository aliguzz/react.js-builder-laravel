<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Docs extends Eloquent {

    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'display_name','file_name','created_at'];
}