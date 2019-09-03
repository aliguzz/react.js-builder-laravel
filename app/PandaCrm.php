<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PandaCrm extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = ['segment_title', 'instant_deployment_24h', 'auto_attend', 'call_queues','call_recording', 'fully_integrated_with_control_panda','virtual_business_number', 'price', 'is_active','pay_as_you_go_features','per_user_for_one_country','geographical_number','per_user_to_listed_countries'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
  

}
