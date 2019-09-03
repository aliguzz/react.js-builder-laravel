<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignments extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';

    protected $fillable = ['type','created_by','user_id', 'lead_id', 'assign_to','event_starting_date','event_ending_date','details','send_to_number','email_to','email_to_cc','email_to_bcc','email_subject','letter_description','uploaded_document','status', 'actioned_by','failed'];

    public static function get_assignment($id){
        $result = \DB::table('assignments')
                ->select('assignments.*', 'users.first_name', 'users.last_name')
                ->join('users', 'users.id', '=', 'assignments.user_id')
                ->where('assignments.id', $id)
                ->first();
        return $result;
    }

    public static function lead_assignment($lead_id){

        $result = \DB::table('assignments')
                    ->where('lead_id',$lead_id)
                    ->where('type','event')
                    ->get();

        return $result;
    }
}
