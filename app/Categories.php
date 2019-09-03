<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';

    protected $fillable = ['title', 'slug', 'status','created_at'];

    
}
