<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PandaSms extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['messages_per_m', 'custom_link_integration', 'custom_sms_reporting','individual_business_number', 'panda_sites', 'price','div_class','is_active'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
  

}
