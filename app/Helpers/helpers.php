<?php

function isActiveRoute($route, $output = "active") {

    if (Route::currentRouteName() == $route)
        return $output;
}

function setActive($paths) {
    foreach ($paths as $path) {

        if (Request::is($path . '*'))
            return ' class=active';
    }
}

function checkImage($path = '') {
    $image_array = explode('.', $path);
    if (count($image_array) > 1) {
        if (file_exists('uploads/' . $path))
            return asset('uploads/' . $path);
        else
            return asset('images/default.png');
    }else {
        return asset('images/default.png');
    }
}

function areActiveRoutes(Array $routes, $output = "active") {
    foreach ($routes as $route) {
        if (Route::currentRouteName() == $route)
            return $output;
    }
}

function xml2array($xmlObject, $out = array()) {
    foreach ((array) $xmlObject as $index => $node)
        $out[$index] = ( is_object($node) ) ? xml2array($node) : $node;

    return $out;
}

function getVal($col, $tbl, $where = '', $condition = '') {
    $setting = \DB::table($tbl)->where($where, $condition)->select($col)->get();
    return $setting;
}

function settingValue($key) {
    $setting = \DB::table('site_settings')->where('option_name', $key)->first();
    if ($setting)
        return $setting->option_value;
    else
        return '';
}

function csvToArray($filename = '', $delimiter = ',', $have_header = 1) {
    if (!file_exists($filename) || !is_readable($filename))
        return false;

    $header = null;
    $data = array();
    $max_count = 0;
    if (($handle = fopen($filename, 'r')) !== false) {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
            $row = array_pad($row, $max_count, '');
            if ($have_header != 0) {
                if (!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }
            } else {
                $data[] = $row;
            }
            if (count($row) > $max_count) {
                $max_count = count($row);
            }
        }
        fclose($handle);
    }
    return $data;
}

function clean($string) {
    $string = strip_tags(trim($string));
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function have_premission($right_id) {
    $user = \Auth::user();
    if ($user['role'] == 1 || $user['id'] == 1) {
        return true;
    } else {
        
        $results = \DB::table('permission')->whereIn('permission.right_id', $right_id)->where('permission.role_id', $user['role'])->count();
        if ($results) {
            return true;
        } else {
            return false;
        }
    }
}

function check_package(){
    $user = \Auth::user();
    if($user['role'] != 1){
        $user_package_exist = \DB::table('package_orders')->where('user_id', $user['id'])->first();
        if(isset($user_package_exist) && count((array)$user_package_exist)>0){
            return false;
        }else{
            return true;
        }
    }
}

function have_lead_premission($right_id) {
    $user = \Auth::user();
    if ($user['role'] == 1) {
        return false;
    } else {
        $results = \DB::table('permission')->where('permission.right_id', $right_id)->where('permission.role_id', $user['role'])->count();
        if ($results) {
            return true;
        } else {
            return false;
        }
    }
}

function is_role_active($role_id) {

    $results = \DB::table('roles')->where('roles.id', $role_id)->where('roles.is_active', 1)->count();
    if ($results) {
        return true;
    } else {
        return false;
    }
}

function not_permissions_redirect($check) {
    if (!$check) {
        header("Location: " . asset('admin/dashboard?permission=error'));
        //header("Location: " . asset('admin/dashboard'));
        die();
    }
}

function create_field_name($label) {
    $label = str_replace("/n", "", str_replace("<br/>", "", str_replace("<br>", "", str_replace(" ", "_", trim(strip_tags($label))))));
    return $label;
}

function summary($str, $limit = 150, $strip = false) {
    $str = ($strip == true) ? strip_tags($str) : $str;
    if (strlen($str) > $limit) {
        $str = substr($str, 0, $limit - 3);
        return (substr($str, 0, strrpos($str, ' ')) . '...');
    }
    return trim($str);
}

function dateDifference($date_1, $date_2, $differenceFormat = '%a') {
    /*
      %a is for days
      %y Year %m Month %d Day
     */
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);

    $interval = date_diff($datetime1, $datetime2);

    return $interval->format($differenceFormat);
}

function strip_tags_array($array) {
    $result = array();
    if (is_array($array)) {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result[$key] = strip_tags_array($value);
            } else if (is_string($value)) {
                $result[$key] = strip_tags($value);
            } else {
                $result[$key] = $value;
            }
        }
    }
    return $result;
}

function check_lead_group($id) {

    $result = \DB::table('lead_groups')
            ->where('id', $id)
            ->first();

    return $result;
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function time_ago($p_time) {


    $p_time;
    $etime = "";
    $estring = "";

    // Past time as MySQL DATETIME value
    //  echo  $p_time;
    $ptime = strtotime($p_time);

    //echo date_default_timezone_get();
    // echo date('Y-m-d H:i:s');
    // exit;
    // Current time as MySQL DATETIME value
    $csqltime = date('Y-m-d H:i:s');

    // Current time as Unix timestamp
    $ctime = strtotime($csqltime);

    // Elapsed time
    $etime = $ctime - $ptime;
    //echo $etime;
    // exit;
    // If no elapsed time, return 0
    if ($etime <= 0) {
        return 'Just now';
    }

    $a = array(365 * 24 * 60 * 60 => 'year',
        30 * 24 * 60 * 60 => 'month',
        24 * 60 * 60 => 'day',
        60 * 60 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    $a_plural = array('year' => 'years',
        'month' => 'months',
        'day' => 'days',
        'hour' => 'hours',
        'minute' => 'minutes',
        'second' => 'seconds'
    );

    foreach ($a as $secs => $str) {
        // Divide elapsed time by seconds
        $d = $etime / $secs;
        //   echo floor($d);
        if ($d >= 1) {
            // Round to the next lowest integer 
            $r = floor($d);
            // Calculate time to remove from elapsed time
            $rtime = $r * $secs;
            // Recalculate and store elapsed time for next loop
            if (($etime - $rtime) < 0) {
                $etime -= ($r - 1) * $secs;
            } else {
                $etime -= $rtime;
            }
            // Create string to return
            $estring = $estring . $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ';
            return $estring . ' ago';
        }
    }
}

function display_date_time($date_time) {
    return date("M d, Y h:i a", strtotime($date_time));
}
function heighchart_date($date) {
    $m = substr($date, 4, 2);
    $m = $m-1;
    return substr($date, 0, 4).", ".$m.", ".substr($date, 6, 2);
}

function display_date($date_time) {
    return date("M d, Y", strtotime($date_time));
}
function create_library_link($parm){
	$lib = \DB::table('libraries')->where('name', $parm)->first();
        if(strpos($lib->path, 'http') !== false){
            echo '<script src="'.$lib->path.'"></script>';
        }else{
            echo '<script src="'.url('builder/'.$lib->path).'"></script>';
        }
}
function generateRandomString($length = 7) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function sendMail($to_email, $sender_name = 'MiRyde', $sender_email = 'drivers@miryde.ca', $subject, $body_html, $cc = '', $bcc = '', $attachments = array()) {

//    require 'phpmailer/PHPMailerAutoload.php';
//
//    $mail = new PHPMailer;
//    $mail->isSMTP();                                      // Set mailer to use SMTP
//    $mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
//    $mail->SMTPAuth = true;                               // Enable SMTP authentication.p
//    $mail->Username = 'buzzfli.project@gmail.com';                 // SMTP username
//    $mail->Password = 'buzzfliproject';                           // SMTP password
//    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//    $mail->Port = 587;                                    // TCP port to connect to
//
//    $mail->From = $sender_email;
//    $mail->FromName = $sender_name;
////$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
//    $mail->addAddress($to_email);               // Name is optional
//// echo $sender_email; exit;
////$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
////$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
//    $mail->isHTML(true);                                  // Set email format to HTML
//
//    $mail->Subject = $subject;
//    $mail->Body = $body_html;
//
//    $mail->AltBody = $body_html;
//
//    if (!$mail->send()) {
//        echo 'Message could not be sent.';
//        echo 'Mailer Error: ' . $mail->ErrorInfo . '';
//        exit;
//    }
    /*  Send Email from  live server */


    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
    $eol = PHP_EOL;

    // main header (multipart mandatory)
    $headers = $body = "";
    $headers .= "From: " . $sender_name . "<" . $sender_email . ">\n";

    if ($cc <> '')
        $headers .= "Cc:  " . $cc . "\n";
    if ($bcc <> '')
        $headers .= "Bcc:  " . $bcc . "\n";

    // headers for attachment
    $headers .= "MIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

    // multipart boundary
    $body = "This is a multi-part message in MIME format.\n" . "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"utf-8\"\n" . "Content-Transfer-Encoding: 7bit\n" . $body_html . "\n";
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
    mail($to_email, $subject, $body, $headers);

}

function checkUserProjects(){
    $id = Auth::User()->id;
    $data['package_id'] = \DB::table('package_orders')
                            ->leftJoin('packages', 'packages.id', '=', 'package_orders.package_id')
                            ->where('user_id', $id)
                            ->where('free_trial', 1)
                            ->select('packages.*','package_orders.*')
                            ->first();

    $data['user_package'] = count(\DB::table('users_projects')->where('user_id', Auth::user()->id)->get());
    if(@$data['package_id']->no_of_sites == 'Unlimited'){
        return true;
    }
    else if(@$data['package_id']->no_of_sites > $data['user_package'] || Auth::User()->role==1){
        return true;
    }
}