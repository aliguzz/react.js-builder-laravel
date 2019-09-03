<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'no_of_sites', 'cp_page_builder', 'free_premium_domain', 'connect_domains', 'ssl_certificate', 'cp_forms', 'cp_lead_db', 'remove_cp_ads', 'storage', 'bandwidth', 'zapier_integration', 'premium_templates', 'leads_per_email', 'leads_per_sms', 'site_analytics', 'custom_email_templates', 'support', 'screen_recording_pf', 'price', 'one_year_price', 'two_year_price', 'div_class', 'is_active'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
