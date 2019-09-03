<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DigitalAssets extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';

    protected $fillable = ['name','from_name', 'from_email', 'message','file','created_at','user_id','status'];
}
