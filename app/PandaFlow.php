<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PandaFlow extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
 protected $fillable = ['page_views_per_m', 'snap_shots', 'screen_recordings', 'months_of_recording','split_tests', 'panda_sites', 'price', 'is_active','div_class'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   

}
