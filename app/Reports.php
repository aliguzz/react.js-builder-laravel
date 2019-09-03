<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use PHPMailer;
use GuzzleHttp\Client;
use App\Leads;

class Reports extends Model {

    public static function total_summary_report($where){
       $result = Leads::select('leads.*')->whereRaw($where)->orderby('id', 'desc')->get();
       return $result;
    }

    public static function lead_daily_summary_report_export($where){
       $result = Leads::select(\DB::raw('DATE(created_at) as date'))->whereRaw($where)->orderby('created_at','desc')->groupBy('date')->get();
       return $result;
    }

    public static function lead_daily_summary_report($where){
       $result = Leads::select(\DB::raw('DATE(created_at) as date'))->whereRaw($where)->orderby('created_at','desc')->groupBy('date')->simplePaginate(20);
       return $result;
    }
    
    public static function lead_daily_summary_report_details($where,$date){
       $result = \DB::table('leads')->whereDate('created_at',$date)->whereRaw($where)->get();
       return $result;
    }

    public static function lead_weekday_report_export($where){
       $result = Leads::select(\DB::raw('WEEKDAY(created_at) as week'))->whereRaw($where)->groupBy('week')->get();
       return $result;
    }

    public static function lead_weekday_report($where){
       $result = Leads::select(\DB::raw('WEEKDAY(created_at) as week'))->whereRaw($where)->groupBy('week')->simplePaginate(20);
       return $result;
    }
    
    public static function lead_weekday_report_details($where,$week){
       $result = \DB::table('leads')->where(\DB::raw('WEEKDAY(created_at)'),$week)->whereRaw($where)->get();
       return $result;
    }

    public static function lead_hourly_report_export($where){
       $result = Leads::select(\DB::raw('HOUR(created_at) as hour'))->whereRaw($where)->groupBy('hour')->get();
       return $result;
    }

    public static function lead_hourly_report($where){
       $result = Leads::select(\DB::raw('HOUR(created_at) as hour'))->whereRaw($where)->groupBy('hour')->simplePaginate(20);
       return $result;
    }
    
    public static function lead_hourly_report_details($where,$hour){
       $result = \DB::table('leads')->where(\DB::raw('HOUR(created_at)'),$hour)->whereRaw($where)->get();
       return $result;
    }

    public static function lead_introducer_report_export($where){
       $result = Leads::select(\DB::raw('introducer_id'))->whereRaw($where)->groupBy('introducer_id')->get();  
       return $result;
    }

    public static function lead_introducer_report($where){
       $result = Leads::select(\DB::raw('introducer_id'))->whereRaw($where)->groupBy('introducer_id')->simplePaginate(20);  
       return $result;
    }
    
    public static function lead_introducer_report_details($where,$introducer_id){
       $result = \DB::table('leads')->select('leads.*','users.first_name','users.last_name')->leftJoin('users','users.id','=','leads.introducer_id')->where('leads.introducer_id',$introducer_id)->whereRaw($where)->get(); 
       return $result;
    }

    public static function lead_referral_partner_report_export($where){
       $result = Leads::select(\DB::raw('lead_referral_id'))->whereRaw($where)->groupBy('lead_referral_id')->get();            
       return $result;
    }

    public static function lead_referral_partner_report($where){
       $result = Leads::select(\DB::raw('lead_referral_id'))->whereRaw($where)->groupBy('lead_referral_id')->simplePaginate(20);            
       return $result;
    }
    
    public static function lead_referral_partner_report_details($where,$lead_referral_id){
       $result =  \DB::table('leads')->select('leads.*','users.first_name','users.last_name')->leftJoin('users','users.id','=','leads.lead_referral_id')->where('leads.lead_referral_id',$lead_referral_id)->whereRaw($where)->get(); 
       return $result;
    }

    public static function lead_group_report_export($where){
       $result = Leads::select(\DB::raw('lead_group_id'))->whereRaw($where)->groupBy('lead_group_id')->get();    
       return $result;
    } 

    public static function lead_group_report($where){
       $result = Leads::select(\DB::raw('lead_group_id'))->whereRaw($where)->groupBy('lead_group_id')->simplePaginate(20);    
       return $result;
    }
    
    public static function lead_group_report_details($where,$lead_group_id){
       $result =  \DB::table('leads')->select('leads.*','lead_groups.name as group_name')->leftJoin('lead_groups','lead_groups.id','=','leads.lead_group_id')->where('leads.lead_group_id',$lead_group_id)->whereRaw($where)->get(); 
       return $result;
    }

    public static function lead_type_report_export($where){
       $result = Leads::select(\DB::raw('lead_type_id'))->whereRaw($where)->groupBy('lead_type_id')->get();
       return $result;
    }

    public static function lead_type_report($where){
       $result = Leads::select(\DB::raw('lead_type_id'))->whereRaw($where)->groupBy('lead_type_id')->simplePaginate(20);
       return $result;
    }
    
    public static function lead_type_report_details($where,$lead_type_id){
       $result =  \DB::table('leads')
                        ->select('leads.*','lead_groups.name as group_name','lead_types.name as type_name')
                         ->leftJoin('lead_groups','lead_groups.id','=','leads.lead_group_id')
                        ->leftJoin('lead_types','lead_types.id','=','leads.lead_type_id')
                        ->where('leads.lead_type_id',$lead_type_id)
                        ->whereRaw($where)
                        ->get(); 
       return $result;
    }

    public static function lead_status_report_export($where){
       $result = Leads::select(\DB::raw('lead_status'))->whereRaw($where)->groupBy('lead_status')->get();                 
       return $result;
    }

    public static function lead_status_report($where){
       $result = Leads::select(\DB::raw('lead_status'))->whereRaw($where)->groupBy('lead_status')->simplePaginate(20);                 
       return $result;
    }
    
    public static function lead_status_report_details($where,$lead_status){
       $result =  \DB::table('leads')->where('leads.lead_status',$lead_status)->whereRaw($where)->get(); 
       return $result;
    }

    public static function lead_assigned_user_report_export($where){
       $result = Leads::select(\DB::raw('assigned_to'))->whereRaw($where)->groupBy('assigned_to')->get();            
       return $result;
    } 

    public static function lead_assigned_user_report($where){
       $result = Leads::select(\DB::raw('assigned_to'))->whereRaw($where)->groupBy('assigned_to')->simplePaginate(20);            
       return $result;
    }
    
    public static function lead_assigned_user_report_details($where,$assigned_to){
       $result =  \DB::table('leads')->select('leads.*','users.first_name','users.last_name')->leftJoin('users','users.id','=','leads.assigned_to')->where('leads.assigned_to',$assigned_to)->whereRaw($where)->get(); 
       return $result;
    }

    public static function lead_postcode_report_export($where){
       $result = Leads::select(\DB::raw('zip'))->whereRaw($where)->groupBy('zip')->get();                 
       return $result;
    }

    public static function lead_postcode_report($where){
       $result = Leads::select(\DB::raw('zip'))->whereRaw($where)->groupBy('zip')->simplePaginate(20);                 
       return $result;
    }
    
    public static function lead_postcode_report_details($where,$zip){
       $result =  \DB::table('leads')->where('leads.zip',$zip)->whereRaw($where)->get(); 
       return $result;
    }

    public static function status_change_summary_report_export($where){
       $result = Leads::join('status_change_details','status_change_details.lead_id','=','leads.id')->select(\DB::raw('status'))->whereRaw($where)->groupBy('status')->get(20); 
       return $result;
    }

    public static function status_change_summary_report($where){
       $result = Leads::join('status_change_details','status_change_details.lead_id','=','leads.id')->select(\DB::raw('status'))->whereRaw($where)->groupBy('status')->simplePaginate(20); 
       return $result;
    }
    
    public static function status_change_summary_report_details($where,$status){
       $result =  \DB::table('leads')
                            ->join('status_change_details','status_change_details.lead_id','=','leads.id')
                            ->where('status_change_details.status',$status)
                            ->whereRaw($where)
                            ->get(); 
       return $result;
    }

    public static function status_change_user_report_export($where){
       $result = Leads::join('status_change_details','status_change_details.lead_id','=','leads.id')->select(\DB::raw('status_change_details.user_id'))->whereRaw($where)->groupBy('status_change_details.user_id')->get();    
       return $result;
    }

    public static function status_change_user_report($where){
       $result = Leads::join('status_change_details','status_change_details.lead_id','=','leads.id')->select(\DB::raw('status_change_details.user_id'))->whereRaw($where)->groupBy('status_change_details.user_id')->simplePaginate(20);    
       return $result;
    }
    
    public static function status_change_user_report_details($where,$user_id){
       $result =  \DB::table('leads')
                            ->select('leads.*','users.first_name as user_fname','users.last_name as user_lname')
                            ->join('status_change_details','status_change_details.lead_id','=','leads.id')
                            ->join('users','users.id','=','status_change_details.user_id')
                            ->where('status_change_details.user_id',$user_id)
                            ->whereRaw($where)
                            ->get(); 
       return $result;
    } 

    public static function status_change_current_status_report_export($where){
       $result = Leads::leftjoin('status_change_details','status_change_details.lead_id','=','leads.id')->select(\DB::raw('lead_status'))->whereRaw($where)->groupBy('lead_status')->get(); 
       return $result;
    }  

    public static function status_change_current_status_report($where){
       $result = Leads::leftjoin('status_change_details','status_change_details.lead_id','=','leads.id')->select(\DB::raw('lead_status'))->whereRaw($where)->groupBy('lead_status')->simplePaginate(20); 
       return $result;
    }
    
    public static function status_change_current_status_report_details($where,$lead_status){
       $result =  \DB::table('leads')
                            ->join('status_change_details','status_change_details.lead_id','=','leads.id')
                            ->where('status_change_details.status',$lead_status)
                            ->whereRaw($where)
                            ->get();
       return $result;
    }

    public static function status_change_detail_report_export($where){
       $result = \DB::table('leads')
            ->join('status_change_details','status_change_details.lead_id','=','leads.id')
            ->join('users','users.id','=','status_change_details.user_id')
            ->select('leads.*','status_change_details.created_at as date','status_change_details.status','users.first_name as user_fname','users.last_name as user_lname')
            ->whereRaw($where)
            ->orderby('status_change_details.created_at','DESC')
            ->get();
       return $result;
    }

    public static function status_change_detail_report($where){
       $result = \DB::table('leads')
            ->join('status_change_details','status_change_details.lead_id','=','leads.id')
            ->join('users','users.id','=','status_change_details.user_id')
            ->select('leads.*','status_change_details.created_at as date','status_change_details.status','users.first_name as user_fname','users.last_name as user_lname')
            ->whereRaw($where)
            ->orderby('status_change_details.created_at','DESC')
            ->simplePaginate(20);
       return $result;
    }

    public static function marketing_summary_report_export($where){
       $result = Leads::select(\DB::raw('marketing_source'))->whereRaw($where)->groupBy('marketing_source')->get();                 
       return $result;
    } 

    public static function marketing_summary_report($where){
       $result = Leads::select(\DB::raw('marketing_source'))->whereRaw($where)->groupBy('marketing_source')->simplePaginate(20);                 
       return $result;
    }
    
    public static function marketing_summary_report_details($where,$marketing_source){
       $result =  \DB::table('leads')->where('leads.marketing_source',$marketing_source)->whereRaw($where)->get(); 
       return $result;
    }

    public static function marketing_detail_report_export($where){
       $result = Leads::select(\DB::raw('marketing_source'),\DB::raw('marketing_medium'),\DB::raw('marketing_terms'))->whereRaw($where)->groupBy('marketing_source')->groupBy('marketing_medium')->groupBy('marketing_terms')->get();                 
       return $result;
    } 

    public static function marketing_detail_report($where){
       $result = Leads::select(\DB::raw('marketing_source'),\DB::raw('marketing_medium'),\DB::raw('marketing_terms'))->whereRaw($where)->groupBy('marketing_source')->groupBy('marketing_medium')->groupBy('marketing_terms')->simplePaginate(20);                 
       return $result;
    } 

    public static function marketing_detail_report_details($where,$marketing_source,$marketing_medium,$marketing_terms){
       $result = \DB::table('leads')->where('leads.marketing_source',$marketing_source)->where('leads.marketing_medium',$marketing_medium)->where('leads.marketing_terms',$marketing_terms)->whereRaw($where)->get(); 
       return $result;
    }

    public static function marketing_site_report_export($where){
       $result = Leads::select(\DB::raw('site_id'))->whereRaw($where)->groupBy('site_id')->get();                 
       return $result;
    } 

    public static function marketing_site_report($where){
       $result = Leads::select(\DB::raw('site_id'))->whereRaw($where)->groupBy('site_id')->simplePaginate(20);                 
       return $result;
    } 

    public static function marketing_site_report_details($where,$site_id){
       $result = \DB::table('leads')->select('leads.*','sites.site_name')->leftJoin('sites','sites.id','=','leads.site_id')->where('leads.site_id',$site_id)->whereRaw($where)->get(); 
       return $result;
    }

    public static function user_activity_report_export($where){
       $result = Leads::join('assignments','assignments.lead_id','=','leads.id')
            ->select(\DB::raw('assignments.created_by'))
            ->whereRaw($where)
            ->where('assignments.type','!=','event')
            ->where('assignments.type','!=','letter')
            ->groupBy('assignments.created_by')
            ->get();  
       return $result;
    } 

    public static function user_activity_report($where){
       $result = Leads::join('assignments','assignments.lead_id','=','leads.id')
            ->select(\DB::raw('assignments.created_by'))
            ->whereRaw($where)
            ->where('assignments.type','!=','event')
            ->where('assignments.type','!=','letter')
            ->groupBy('assignments.created_by')
            ->simplePaginate(20);  
       return $result;
    } 
    
    public static function user_activity_report_details($where,$created_by){
        $lead = DB::table('leads')
                ->select('assignments.*','users.first_name as user_fname','users.last_name as user_lname')
                ->join('assignments','assignments.lead_id','=','leads.id')
                ->join('users','users.id','=','assignments.created_by')
                ->where('assignments.created_by',$created_by)
                ->where('assignments.type','!=','event')
                ->where('assignments.type','!=','letter')
                ->whereRaw($where)
                ->get();

        return $lead;
    }

    public static function user_event_report_export($where){

    $result = Leads::join('assignments','assignments.lead_id','=','leads.id')
            ->select(\DB::raw('assignments.actioned_by'))
            ->whereRaw($where)
            ->where('assignments.type','event')
            ->where('assignments.actioned_by','!=','')
            ->groupBy('assignments.actioned_by')
            ->get(); 

       return $result;
    }

    public static function user_event_report($where){

    $result = Leads::join('assignments','assignments.lead_id','=','leads.id')
            ->select(\DB::raw('assignments.actioned_by'))
            ->whereRaw($where)
            ->where('assignments.type','event')
            ->where('assignments.actioned_by','!=','')
            ->groupBy('assignments.actioned_by')
            ->simplePaginate(20); 

       return $result;
    }

    public static function user_event_report_details($where,$actioned_by){

        $lead = DB::table('leads')
                ->select('assignments.*','users.first_name as user_fname','users.last_name as user_lname')
                ->join('assignments','assignments.lead_id','=','leads.id')
                ->join('users','users.id','=','assignments.actioned_by')
                ->where('assignments.actioned_by',$actioned_by)
                ->where('assignments.type','event')
                ->where('assignments.actioned_by','!=','')
                ->whereRaw($where)
                ->get();

        return $lead;
    }

    public static function letter_detail_report_export($where){

       $result =  $data['leads'] = Leads::join('assignments','assignments.lead_id','=','leads.id')
            ->join('users','users.id','=','assignments.created_by')
            ->whereRaw($where)
            ->select('users.first_name','users.last_name','leads.id as lead_id','leads.created_at as lead_date_time','assignments.*')
            ->where('assignments.type','letter')
            ->where('assignments.status',1)
            ->distinct('assignments.id')
            ->get();

       return $result;
    } 

    public static function letter_detail_report($where){

       $result =  $data['leads'] = Leads::join('assignments','assignments.lead_id','=','leads.id')
            ->join('users','users.id','=','assignments.created_by')
            ->whereRaw($where)
            ->select('users.first_name','users.last_name','leads.id as lead_id','leads.created_at as lead_date_time','assignments.*')
            ->where('assignments.type','letter')
            ->where('assignments.status',1)
            ->distinct('assignments.id')
            ->simplePaginate(20);

       return $result;
    } 

    public static function email_detail_report_export($where){

       $result = Leads::join('assignments','assignments.lead_id','=','leads.id')
            ->join('users','users.id','=','assignments.created_by')
            ->whereRaw($where)
            ->select('users.first_name','users.last_name','leads.id as lead_id','leads.created_at as lead_date_time','assignments.*')
            ->where('assignments.type','email')
            ->distinct('assignments.id')
            ->get();

       return $result;
    }

    public static function email_detail_report($where){

       $result = Leads::join('assignments','assignments.lead_id','=','leads.id')
            ->join('users','users.id','=','assignments.created_by')
            ->whereRaw($where)
            ->select('users.first_name','users.last_name','leads.id as lead_id','leads.created_at as lead_date_time','assignments.*')
            ->where('assignments.type','email')
            ->distinct('assignments.id')
            ->simplePaginate(20);

       return $result;
    }

    public static function text_detail_report_export($where){

       $result = Leads::join('assignments','assignments.lead_id','=','leads.id')
            ->join('users','users.id','=','assignments.created_by')
            ->whereRaw($where)
            ->select('users.first_name','users.last_name','leads.id as lead_id','leads.created_at as lead_date_time','assignments.*')
            ->where('assignments.type','text_message')
            ->distinct('assignments.id')
            ->get();

       return $result;
    } 

    public static function text_detail_report($where){

       $result = Leads::join('assignments','assignments.lead_id','=','leads.id')
            ->join('users','users.id','=','assignments.created_by')
            ->whereRaw($where)
            ->select('users.first_name','users.last_name','leads.id as lead_id','leads.created_at as lead_date_time','assignments.*')
            ->where('assignments.type','text_message')
            ->distinct('assignments.id')
            ->simplePaginate(20);

       return $result;
    }

    public static function partner_transaction_report_export($where){
       $result = \DB::table('payment_transactions')->select('payment_transactions.*','users.first_name','users.last_name')->join('users','users.id','=','payment_transactions.payment_user_id')->whereRaw($where)->where('amount','!=',0)->orderBy('created_at','DESC')->get();                 
       return $result;
    }

    public static function partner_transaction_report($where){
       $result = \DB::table('payment_transactions')->select('payment_transactions.*','users.first_name','users.last_name')->join('users','users.id','=','payment_transactions.payment_user_id')->whereRaw($where)->where('amount','!=',0)->orderBy('created_at','DESC')->simplePaginate(20);                 
       return $result;
    } 

    public static function roi_summary_report($where){
       $result = Leads::select('leads.*')->whereRaw($where)->orderby('id', 'desc')->get();
       return $result;
    }

    public static function roi_assigned_user_report_export($where){
       $result = Leads::select(\DB::raw('assigned_to'))->whereRaw($where)->groupBy('assigned_to')->get();                   
       return $result;
    } 

    public static function roi_assigned_user_report($where){
       $result = Leads::select(\DB::raw('assigned_to'))->whereRaw($where)->groupBy('assigned_to')->simplePaginate(20);                   
       return $result;
    }

    public static function roi_assigned_user_report_details($where,$assigned_to){
       $result = \DB::table('leads')->select('leads.*','users.first_name','users.last_name')->leftJoin('users','users.id','=','leads.assigned_to')->where('leads.assigned_to',$assigned_to)->whereRaw($where)->get();  
       return $result;
    }

    public static function roi_introducer_report_export($where){
       $result = Leads::select(\DB::raw('introducer_id'))->whereRaw($where)->groupBy('introducer_id')->get();          
       return $result;
    }

    public static function roi_introducer_report($where){
       $result = Leads::select(\DB::raw('introducer_id'))->whereRaw($where)->groupBy('introducer_id')->simplePaginate(20);          
       return $result;
    } 

    public static function roi_introducer_report_details($where,$introducer_id){
       $result = \DB::table('leads')->select('leads.*','users.first_name','users.last_name')->leftJoin('users','users.id','=','leads.introducer_id')->where('leads.introducer_id',$introducer_id)->whereRaw($where)->get();  
       return $result;
    }
}
