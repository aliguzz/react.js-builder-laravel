<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategories extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug', 'is_active'];

    public static function get_categories(){
       $result =  BlogCategories::
       Join('blogs','blog_categories.id','=','blogs.blog_category_id')
       ->select('blog_categories.*')
       ->orderBy('blog_categories.name', 'ASC')
       ->where('blog_categories.is_active', 1)
       ->distinct('blog_categories.id')
       ->get();

       return $result;
   }
}
