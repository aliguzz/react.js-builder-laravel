<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class SvgsCategories extends Eloquent {

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'status','created_at'];

    public function svgs(){
        return $this->hasMany('App\Svgs', 'cat_id', 'id')->groupBy('id');
    }
}