<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';

    protected $fillable = ['type','title','package_title','user_email','lead_status','assignment_details','event_start','event_end','account_expired_on','package_id', 'order_id', 'lead_id', 'assignment_id'];

    public static function add_users($notification_id,$user_id){
        $insert =  array(
                        'notification_id' => $notification_id,
                        'user_id' => $user_id,
                    );

        $result = \DB::table('notification_users')->insert($insert);
        return $result;

    }

    public static function add_lead_notification($type,$title,$status,$assign_details,$event_start,$event_end,$lead_id,$assign_id){
       $input = array(
                    'type' => $type,
                    'title' => $title,
                    'lead_status' => $status,
                    'lead_id' => $lead_id,
                    'assignment_details' => $assign_details,
                    'event_start' => $event_start,
                    'event_end' => $event_end,
                );

       if($assign_id != ''){
        $input['assignment_id'] = $assign_id;
       }

        $id =   Notifications::create($input)->id;
        return $id;
    }

    public static function exist_users($notification_id,$val){
        $result = \DB::table('notification_users')
                       ->where('notification_id',$notification_id)
                       ->where('user_id',$val)
                       ->first();
        return $result;
    }

    public static function account_expiration_details($type,$title,$package_title,$expiry_date,$package_id,$order_id){

        $input = array(
                    'type' => $type,
                    'title' => $title,
                    'package_title' => $package_title,
                    'account_expired_on' => $expiry_date,
                    'package_id' => $package_id,
                    'order_id' => $order_id,
                );

        $id =   Notifications::create($input)->id;
        return $id;
    }
}
