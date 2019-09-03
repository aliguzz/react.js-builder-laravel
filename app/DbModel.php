<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use PHPMailer;
use GuzzleHttp\Client;

class DbModel extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public static function social_links($id = '') {

        $result = DB::table('site_settings')
                ->where('id', $id)
                ->first();

        return $result;
    }

    public static function header_menu() {

        $result = DB::table('cms_pages')
                ->select('title', 'seo_url')
                ->where('show_in_header', 1)
                ->where('is_active', 1)
                ->get();

        return $result;
    }

    public static function footer_menu() {

        $result = DB::table('cms_pages')
                ->select('title', 'seo_url')
                ->where('show_in_footer', 1)
                ->where('show_in_header', 1)
                ->where('is_active', 1)
                ->get();

        return $result;
    }

    public static function footer_menu_2() {

        $result = DB::table('cms_pages')
                ->select('title', 'seo_url')
                ->where('show_in_footer', 1)
                ->where('show_in_header', 0)
                ->where('is_active', 1)
                ->get();

        return $result;
    }

    public static function add_post_like($input) {

        $insert = array(
            'user_id' => $input['user_id'],
            'blog_id' => $input['blog_id'],
            'status' => $input['status'],
            'created_at' => date('Y-m-d H:i:s')
        );

        $result = DB::table('posts_likes')
                ->insert($insert);

        return $result;
    }

    public static function user_post_like($user_id, $blog_id) {

        $result = DB::table('posts_likes')
                ->where('user_id', $user_id)
                ->where('blog_id', $blog_id)
                ->first();

        return $result;
    }

    public static function update_post_like($input) {

        $update = array(
            'user_id' => $input['user_id'],
            'blog_id' => $input['blog_id'],
            'status' => $input['status'],
        );

        $result = DB::table('posts_likes')
                ->where('user_id', $input['user_id'])
                ->where('blog_id', $input['blog_id'])
                ->update($update);

        return $result;
    }

    public static function post_likes($post_id) {

        $result = DB::table('posts_likes')
                ->where('blog_id', $post_id)
                ->where('status', 'Like')
                ->count();

        return $result;
    }

    public static function unique_slug($tablename, $slug, $id) {

        $result = DB::table($tablename)
                ->where('slug', $slug)
                ->where('id', '!=', $id)
                ->select('slug')
                ->first();

        return $result;
    }

    public static function page_detail($segment1) {

        $result = DB::table('cms_pages')
                ->where('seo_url', $segment1)
                ->first();

        return $result;
    }

    public static function current_package($user_id) {

        $result = DB::table('package_orders')
                ->where('user_id', $user_id)
                ->where('is_active', '1')
                ->first();

        return $result;
    }

    public static function SendHTMLMail($to, $subject, $html_body, $fromemail = "support@controlpanda.com", $fromName = "ControlPanda", $returnpath = '', $cc = '', $bcc = '', $attachments = array()) {
        require_once 'Helpers/phpmailer/PHPMailerAutoload.php';
        try {
            $mail = new PHPMailer();

            $mail->IsMail();
            if ($returnpath != '' || $returnpath != "") {
                $mail->AddReplyTo($returnpath, $returnpath);
            } else {
                $mail->AddReplyTo($fromemail, $fromemail);
            }
			
            $settings = \DB::table("site_settings")->get();
           
            $mail->isSMTP();                                // Set mailer to use SMTP
            $mail->Host = env('MAIL_HOST', 'smtp.gmail.com');                 // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                         // Enable SMTP authentication.p
            $mail->Username = env('MAIL_USERNAME');    // SMTP username
            $mail->Password = env('MAIL_PASSWORD');                  // SMTP password
            $mail->SMTPSecure = env('MAIL_ENCRYPTION', 'tls');                      // Enable TLS encryption, `ssl` also accepted
            $mail->Port = env('MAIL_PORT', 587);

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->From = $fromemail;
            $mail->FromName = $fromName;
            $mail->Subject = $subject;
            $mail->Body = $html_body;
            $mail->AddAddress($to);

            if (isset($cc) && $cc != "") {
                $mail->AddCC($cc);
            }
            if (isset($bcc) && $bcc != "") {
                $mail->AddBCC($bcc);
            }

            if (isset($attachment) && $attachment != "") {
                $mail->addAttachment($attachment);
            }
            
            if ($mail->Send()) {
                $mailstat = true;
            } else {
                $mailstat = false;
            }



            //  Send Email from  live server
     
     
 /*        $semi_rand = md5(time());
         $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
         $eol = PHP_EOL;
     
         // main header (multipart mandatory)
         $headers = $body = "";
         $headers .= "From: " . $fromName . "<" . $fromemail . ">\n";
     
         if ($cc <> '')
             $headers .= "Cc:  " . $cc . "\n";
         if ($bcc <> '')
             $headers .= "Bcc:  " . $bcc . "\n";
     
         // headers for attachment
         $headers .= "MIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
     
         // multipart boundary
         $body = "This is a multi-part message in MIME format.\n" . "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"utf-8\"\n" . "Content-Transfer-Encoding: 7bit\n" . $html_body . "\n";
         $body .= "--{$mime_boundary}\n";
     
         // attachment
         if (count($attachments) > 0) {
             $u = 1;
             for ($i = 0; $i < count($attachments); $i++) {
     
                 $body .= "--" . $mime_boundary . $eol;
                 $body .= "Content-Type: application/octet-stream; name=\"" . $attachments[$i]['file_name'] . "\"" . $eol;
                 $body .= "Content-Disposition: attachment[" . ($u) . "]; filename=\"" . $attachments[$i]['file_name'] . "\"" . $eol;
                 $body .= "Content-Transfer-Encoding: base64" . $eol;
                 $body .= chunk_split(base64_encode(file_get_contents($attachments[$i]["tmp_name"]))) . $eol . $eol;
     
                 $body .= "--" . $mime_boundary . "" . $eol . $eol;
                 $u++;
             }
         }
     
         mail($to_email, $subject, $body, $headers);        */


            return $mailstat;
        } catch (\Exception $ex) {
            dd($ex);
            return $ex;
        }
    }

    public static function update_paypal_details($input) {
        $update = array(
            'creditcard_type' => $input['creditcard_type'],
            'creditcard_no' => $input['creditcard_no'],
            'creditcard_expiry_month' => $input['creditcard_expiry_month'],
            'creditcard_expiry_year' => $input['creditcard_expiry_year'],
            'creditcard_security' => $input['creditcard_security'],
        );

        $result = DB::table('package_orders')
                ->where('id', $input['id'])
                ->update($update);

        return $result;
    }

    public static function user_packages($user_id) {

        $result = DB::table('package_orders')
                ->where('user_id', $user_id)
                ->orderBy('id', 'DESC')
                ->get();

        return $result;
    }

    public static function unqiue_code($desired_length) {

        $result = substr(str_shuffle(strtolower(sha1(rand() . time() . "my salt string"))), 0, $desired_length);
        return $result;
    }

    public static function lead_templates($type, $lead_group_id) {

        $result = DB::table('templates')
                ->where('lead_group_id', 0)
                ->Orwhere('lead_group_id', $lead_group_id)
                ->where('template_type', $type)
                ->get();

        return $result;
    }

    public static function user_current_package($user_id) {
        $result = DB::table('package_orders')
                ->join('packages', 'packages.id', '=', 'package_orders.package_id')
                ->select('package_orders.expiry_date as expiry_date', 'packages.*')
                ->where('package_orders.user_id', $user_id)
                ->where('package_orders.is_active', '1')
                ->first();

        return $result;
    }

    public static function package_details($order_id) {

        $result = DB::table('package_orders')
                //->join('packages','packages.id','=','package_orders.package_id')
                ->where('package_orders.id', $order_id)
                ->first();

        return $result;
    }

    public static function lead_details($lead_id) {

        $result = DB::table('leads')
                ->select('leads.*', 'lead_groups.name')
                ->join('lead_groups', 'lead_groups.id', '=', 'leads.lead_group_id')
                ->where('leads.id', $lead_id)
                ->first();

        return $result;
    }

    public static function assign_details($assignment_id) {

        $result = DB::table('assignments')
                ->select('assignments.*', 'leads.id as lead_id', 'leads.user_id as lead_user_id', 'leads.introducer_id', 'leads.lead_referral_id', 'leads.assigned_to')
                ->join('leads', 'leads.id', '=', 'assignments.lead_id')
                ->where('assignments.id', $assignment_id)
                ->first();

        return $result;
    }

    public static function get_notifications($user_id) {

        $result = \DB::table('notifications')
                ->join('notification_users', 'notifications.id', '=', 'notification_users.notification_id')
                ->where('notification_users.user_id', $user_id)
                ->Orderby('notifications.id', 'DESC')
                ->get();
        return $result;
    }

    public static function unread_notifications($user_id) {

        $result = \DB::table('notifications')
                ->join('notification_users', 'notifications.id', '=', 'notification_users.notification_id')
                ->where('notification_users.user_id', $user_id)
                ->where('status', 0)
                ->count();
        return $result;
    }

    public static function status_change_details($lead_id, $user_id, $created_at, $status) {

        $status_change = array(
            'lead_id' => $lead_id,
            'user_id' => $user_id,
            'created_at' => $created_at,
            'status' => $status,
        );
        $result = \DB::table('status_change_details')->insert($status_change);
        return $result;
    }

}
