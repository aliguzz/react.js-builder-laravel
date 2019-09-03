<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class VideosCategories extends Eloquent {

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'status','created_at'];

    public function videos(){
        return $this->hasMany('App\Videos', 'cat_id', 'id')->groupBy('id');
    }
}