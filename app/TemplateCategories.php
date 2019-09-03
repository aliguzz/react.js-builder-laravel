<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateCategories extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';

    protected $fillable = ['thumbnail','title', 'timeItext', 'short_description','created_at','directions','video_link','status','type','pages','slug'];

    
}
