<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domains extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';

    protected $fillable = ['name','root_page', 'error_page', 'renew_date','status','created_at','project_id','price','payment_gateway','user_id','ssl_enabled'];
}
