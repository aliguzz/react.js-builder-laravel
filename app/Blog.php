<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';

    protected $fillable = ['blog_category_id','title', 'slug', 'image','short_description','description','meta_title','meta_keywords','meta_description','is_active'];

    public static function get_cate_posts($cat_id){

    	$result = Blog::orderBy('id', 'DESC')
    	->where('blog_category_id', $cat_id)
    	->where('is_active', 1)
    	->get();

    	return $result;        
    }

    public static function recent_posts(){

    	$result = 	 Blog::orderBy('id', 'DESC')
    	->where('is_active', 1)
    	->take(4)
    	->get();
    	
    	return $result;
    }
}
