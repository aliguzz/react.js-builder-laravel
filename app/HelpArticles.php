<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HelpArticles extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	  protected $primaryKey = 'id';
	  
    protected $fillable = ['question', 'answer', 'images', 'keywords', 'status', 'created_at' , 'slug'];
    

}
