<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';

    protected $fillable = ['name','message','rating','image','is_active','featured'];

    
}
