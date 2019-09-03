<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsPages extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'seo_url', 'description', 'meta_description', 'meta_title','meta_keywords','show_in_header','show_in_footer','is_active'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
