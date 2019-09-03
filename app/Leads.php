<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Leads extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','title', 'first_name', 'last_name', 'email', 'dob_day', 'dob_month', 'dob_year', 'phone', 'zip', 'address', 'fax', 'city', 'company', 'designation', 'full_name', 'project_id', 'page_id', 'ip_address', 'other_fields_values', 'lead_status', 'created_at','form','page'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function get_leads($id) {

        $data = DB::table('leads')
                ->select('leads.*', 'lead_groups.name as lead_group', 'lead_types.name as lead_type', 'sites.site_name as site', 'users.first_name as referral_fname', 'users.last_name as referral_lname')
                ->leftJoin('lead_groups', 'leads.lead_group_id', '=', 'lead_groups.id')
                ->leftJoin('lead_types', 'leads.lead_type_id', '=', 'lead_types.id')
                ->leftJoin('sites', 'leads.site_id', '=', 'sites.id')
                ->leftJoin('users', 'leads.assigned_to', '=', 'users.id')
                ->where('leads.id', $id)
                ->first();

        return $data;
    }

}
