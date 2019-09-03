<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImagesCategories extends Eloquent {

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'status','created_at'];

    public function images(){
        return $this->hasMany('App\Images', 'cat_id', 'id')->groupBy('id');
    }
}