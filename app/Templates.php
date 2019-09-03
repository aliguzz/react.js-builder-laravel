<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Templates extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';

    protected $fillable = ['name','html', 'css', 'theme','user_id','thumbnail','price','color','category','created_at','updated_at','features'];

    
}
