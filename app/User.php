<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id','title','first_name','last_name', 'email', 'password','original_password','remember_token','activation_key','unique_code', 'phone','fax','profile_image','address','zipcode','is_active','role','country', 'user_sub_domain','city','prefrence_color','created_at','updated_at','confirmed','permissions','persist_code','pkg_renew_date','last_login','user_time_zone','user_locale','wordpress_api_key','cc_number','cc_exp_month','cc_exp_year','cc_cvv','paypal_email','facebook','instagram','twitter','linkedin','googleplus','youtube','pinterest','facebook_page_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
