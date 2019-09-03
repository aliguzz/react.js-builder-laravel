<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Notifications;
use App\Leads;
use App\Assignments;
use App\DbModel;
use Illuminate\Http\Request;
use Alert;
use Image;
use File;
use Auth;
use View;

class NotificationsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        $user_id = \Auth::user()->id;

        $data['notifications'] = Notifications::Join('notification_users', 'notifications.id', '=', 'notification_users.notification_id')
                ->where('notification_users.user_id', $user_id)
                ->Orderby('notifications.id', 'DESC')
                ->paginate(10);

        $data['count'] = Notifications::Join('notification_users', 'notifications.id', '=', 'notification_users.notification_id')
                ->where('notification_users.user_id', $user_id)
                ->Orderby('notifications.id', 'DESC')
                ->count();

        $data['user_id'] = \Auth::user()->id;

        $read_notifications = \App\DbModel::get_notifications($data['user_id']);

        foreach ($read_notifications as $notification) {
            $update = \DB::table('notification_users')
                    ->where('id', $notification->id)
                    ->update(['status' => 1]);
        }

        return view('admin.notifications.index')->with($data);
    }

    public function status_update(Request $request) {

        $input = $request->all();
        $update = \DB::table('notification_users')
                ->where('id', $input['id'])
                ->update(['status' => 1]);
    }

    public function accountExpiration() {

        $user_id = Auth::user()->id;
        $status = 0;
        $week = strtotime(date('Y-m-d') . ' + 7 days');
        $day = strtotime(date('Y-m-d') . ' + 1 day');

        $current_package = DbModel::current_package($user_id);
        $user = \DB::table('users')->where('id', $current_package->user_id)->first();

        $current_date = date('Y-m-d');
        $template = \DB::table('templates')->where('template_type', 1)->where('email_type', 'account_expiration_details')->first();

        if ((strtotime($current_date) > strtotime($current_package->expiry_date)) || (strtotime($current_date) == strtotime($current_package->expiry_date))) {

            $subject = $template != '' ? $template->subject : "Account Expired";

            $msg = 'Your BTCWallet account has been expired';
            $status = 1;
        } elseif ($week == strtotime($current_package->expiry_date)) {

            $subject = $template != '' ? $template->subject : "Reminder: Account Expiration Details";

            $msg = 'Your BTCWallet account will be expired in a week';
            $status = 1;

            $notification_id = Notifications::account_expiration_details('account_expiration_in_week', 'Reminder: Your account will be expired in week', $current_package->package_title, $current_package->expiry_date, $current_package->package_id, $current_package->id);
            $notification_users = Notifications::add_users($notification_id, $current_package->user_id);
        } elseif ($day == strtotime($current_package->expiry_date)) {

            $subject = $template != '' ? $template->subject : "Reminder: Account Expiration Details";

            $msg = 'Your BTCWallet account will be expired in a day';
            $status = 1;

            $notification_id = Notifications::account_expiration_details('account_expiration_in_day', 'Reminder: Your account will be expired in a day', $current_package->package_title, $current_package->expiry_date, $current_package->package_id, $current_package->id);
            $notification_users = Notifications::add_users($notification_id, $current_package->user_id);
        }


        if ($status == 1) {

            if ($template != '') {

                $to_replace = ['[FIRSTNAME]', '[LASTNAME]', '[MESSAGE]'];
                $with_replace = [$user->first_name, $user->last_name, $msg];
                $html_body = '';
                $html_body .= str_replace($to_replace, $with_replace, $template->content);

                $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
            } else {
                // send email
                $html_body = '';
                $html_body .= "Hi " . $user->first_name . " " . $user->last_name . " ! " . "<br />";
                $html_body .= $msg;


                $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
            }

            $to = $user->email;

            $returnpath = "";
            $cc = "";
            $smtp = \DB::table("smtp_settings")->where("user_id", $user->id)->select('from_name', 'from_email')->first();

            $dd = DbModel::SendHTMLMail($to, $subject, $mailContents, $smtp->from_email, $smtp->from_name, $returnpath, $cc);
        }
    }

    public function eventReminder() {

        $events = \DB::table('assignments')
                ->where('type', 'event')
                ->get();

        foreach ($events as $event) {
            $event_date = date("Y-m-d", strtotime($event->event_starting_date));
            if (strtotime(date('Y-m-d')) == strtotime($event_date)) {

                // Add notification
                $leads = Leads::find($event->lead_id);
                $assign = Assignments::find($event->id);

                $notification_id = Notifications::add_lead_notification('event_reminder', 'Reminder: Event will be held today', $status = '', $assign_details = $assign->details, $event_start = $assign->event_starting_date, $event_end = $assign->event_ending_date, $event->lead_id, $event->id);

                $user_array = array(
                    'user_id' => $leads->user_id,
                    'introducer_id' => $leads->introducer_id,
                    'referral_id' => $leads->lead_referral_id,
                    'assigned_to' => $leads->assigned_to,
                    'assignment_user_id' => $assign->user_id,
                    'assignment_assigned_to' => $assign->assign_to,
                );

                foreach ($user_array as $key => $val) {

                    if ($val != '' && $val != 0) {
                        $exist = Notifications::exist_users($notification_id, $val);
                        if (!$exist) {
                            $notification_users = Notifications::add_users($notification_id, $val);
                        }
                    }
                }
                // End
            }
        }
    }

}
