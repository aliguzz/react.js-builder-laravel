<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageOrders extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'package_id', 'updated_at', 'created_at', 'paid', 'free_trial'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
