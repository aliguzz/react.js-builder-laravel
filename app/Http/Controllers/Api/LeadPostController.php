<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Leads;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LeadPostController extends Controller
{

    public $successStatus = 200;

    public function postLead(Request $request)
    {

        $input = $request->all();
        $input = strip_tags_array($input);

        $project_id = $input['project_id'];
        $project = \DB::table('projects')->where('id', $project_id)->first();
        $user_project = \DB::table('users_projects')->where('project_id', $project_id)->first();
        
        if (count((array)$project)) {
            $domain_projects = \DB::table('domains')->where('project_id', $project_id)->first();
            if (count((array)$domain_projects)) {
                $return_url = 'http://' . $domain_projects->name . '/thankyou.html';
            } else {
                $return_url = url('sites/' . $project->name . '/thankyou.html');
            }
        } else {
            return redirect('404-page-not-found');
        }

        $input['user_id'] = $user_project->user_id;
        $input['page'] = $input['page_name'];
        $input['project_id'] = $input['project_id'];
        $input['form'] = $input['form_name'];

        // remove temp lead
        if (isset($input['pre_id']) && $input['pre_id'] != '') {
            \DB::table('leads_temp')->where('id', $input['pre_id'])->delete();
        }
        $client_ip = get_client_ip();
        $input['ip_address'] = $client_ip;
        if ($client_ip != 'UNKNOWN') {
            \DB::table('leads_temp')
                ->where('project_id', $input['project_id'])
                ->where('page', $input['page'])
                ->where('ip_address', $client_ip)
                ->delete();
        }
        unset($input['page_name']);
        unset($input['form_name']);
        $id = Leads::create($input)->id;

        $static = ['user_id', 'unique_code', '_token', 'title', 'full_name', 'first_name', 'last_name', 'email', 'phone', 'fax', 'zip', 'project_id', 'page', 'address', 'city', 'company', 'designation', 'dob_day', 'dob_month', 'dob_year', 'submit', 'ip_address', 'message', 'expected_list', 'form'];
        $message = '<table>';
        foreach ($input as $key => $value) {
            if (!in_array($key, $static)) {
                $key = str_replace("_", " ", $key);
                if (is_array($value)) {
                    $value = implode(',', $value);
                }
                $extra_fields[$key] = $value;
            }
            $message .= '<tr><td>' . $key . '</td><td>' . $value . '</td></tr>';
        }
        $message .= '</table>';
        $other_fields_values = '';
        if (isset($extra_fields)) {
            $other_fields_values = json_encode($extra_fields);
        }
        $Leads = Leads::findOrFail($id);
        $lead_update['other_fields_values'] = $other_fields_values;
        $Leads->update($lead_update);
        /** Email List Things */
        $pages_email_list = \DB::table('pages_email_lists')->where('project_id', $project_id)->where('page_name', $input['page'])->get();
        if (count((array)$pages_email_list) > 0) {
            foreach ($pages_email_list as $pel) {
                $email_list = \DB::table('email_lists')->where('id', $pel->email_list_id)->first();
                $email_list_id = $pel->email_list_id;
                if (count((array)$email_list)) {
                    $insertion_array = array('email_list_id' => $pel->email_list_id, 'lead_id' => $id, 'created_at' => date("Y-m-d H:i:s"), 'action' => $pel->action);

                    if ($email_list->filter != '' && $email_list->filter != '[]') {

                        $filter = json_decode($email_list->filter);
                        $filter_length = count($filter);
                        $checker = 0;
                        foreach ($filter as $fil) {
                            $key = $fil->key;
                            $value = $fil->value;
                            $operator = $fil->operator;
                            if ($operator == 'contains' && isset($input[$key]) && strpos($input[$key], $value) !== false) {
                                $checker++;
                            } elseif ($operator == 'notcontain' && isset($input[$key]) && strpos($input[$key], $value) === false) {
                                $checker++;
                            } elseif ($operator == 'greater' && isset($input[$key]) && $input[$key] > $value) {
                                $checker++;
                            } elseif ($operator == 'greatequal' && isset($input[$key]) && $input[$key] >= $value) {
                                $checker++;
                            } elseif ($operator == 'less' && isset($input[$key]) && $input[$key] < $value) {
                                $checker++;
                            } elseif ($operator == 'lessequal' && isset($input[$key]) && $input[$key] <= $value) {
                                $checker++;
                            } elseif ($operator == 'is' && isset($input[$key]) && $input[$key] = $value) {
                                $checker++;
                            } elseif ($operator == 'not' && isset($input[$key]) && $input[$key] != $value) {
                                $checker++;
                            } elseif ($operator == 'isnotempty' && isset($input[$key]) && $input[$key] != '') {
                                $checker++;
                            } elseif ($operator == 'isempty' && isset($input[$key]) && $input[$key] == '') {
                                $checker++;
                            }
                        }

                        if ($checker == $filter_length) {
                            \DB::table('leads_email_lists')->insert($insertion_array);
                        }
                    } else {
                        \DB::table('leads_email_lists')->insert($insertion_array);
                    }
                }
            }
        }

        $automation_emails = \DB::table('automation_action_lists')->where('project_id', $project_id)->first();

        if (!empty($automation_emails)) {
            $listIds = [];
            $from_name = settingValue('from_name');
            $from_email = settingValue('from_email');
            $email_template = \DB::table("email_templates")->where("email_type", "newlead")->where("template_type", 1)->first();
            $sms_template = \DB::table("email_templates")->where("email_type", "newlead")->where("template_type", 2)->first();
            $records = explode(",", $automation_emails->emails);
            foreach ($records as $email) {
                $subject = $email_template->subject;
                $returnpath = "";
                $cc = "";
                $link = url('/');
                $to_replace = ['[BASEURL]', '[LINK]', '[CONTENT]'];
                $with_replace = [url('/'), $link, $message];
                $html_body = '';
                $html_body .= str_replace($to_replace, $with_replace, $email_template->content);
                $to = $email;
                $mailContents = \View::make('frontend.email_temp.template', ["data" => $html_body])->render();
                $dd = \App\DbModel::SendHTMLMail($to, $subject, $mailContents, $from_email, $from_name, $returnpath, $cc);
            }
            $records = explode(",", $automation_emails->phones);
            foreach ($records as $rec) {
                $mailContents = $html_body;
            }
        }
        $automation_response_emails = \DB::table('email_templates')->where('project_id', $project_id)->where('email_type', 'auto-responder')->first();
        if (!empty($automation_response_emails)) {
            $from_name = settingValue('from_name');
            $from_email = settingValue('from_email');
            $subject = $automation_response_emails->subject;
            $returnpath = "";
            $cc = "";
            $link = url('/');
            $to_replace = ['[BASEURL]', '[LINK]', '[CONTENT]'];
            $with_replace = [url('/'), $link, $message];
            $html_body = '';
            $html_body .= str_replace($to_replace, $with_replace, $automation_response_emails->content);
            $to = $email;
            $mailContents = \View::make('frontend.email_temp.template', ["data" => $html_body])->render();
            $dd = \App\DbModel::SendHTMLMail($to, $subject, $mailContents, $from_email, $from_name, $returnpath, $cc);
        }

        return redirect($return_url . "?status=Success&msg=Lead added successfully");
    }

    public function showError()
    {

        return redirect('admin/error');
    }

    public function postLeadAjax(Request $request)
    {
        $input = $request->all();

        $input = strip_tags_array($input);

        if (!isset($input['first_name']) || $input['first_name'] == '') {
            return json_encode(
                array("status" => 'Error',
                    "msg" => 'First Name is required')
            );
        }
        if (!isset($input['last_name']) || $input['last_name'] == '') {
            return json_encode(
                array("status" => 'Error',
                    "msg" => 'Last Name is required')
            );
        }
        if (!isset($input['email']) || $input['email'] == '') {
            return json_encode(
                array("status" => 'Error',
                    "msg" => 'Email is required')
            );
        }
        if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
            return json_encode(
                array("status" => 'Error',
                    "msg" => 'Enter valid email')
            );
        }
        if (!isset($input['phone']) || $input['phone'] == '') {
            return json_encode(
                array("status" => 'Error',
                    "msg" => 'Phone is required')
            );
        }
        $authenticate_user = User::where('unique_code', $input['unique_code'])->first();
        if (!$authenticate_user) {
            return json_encode(
                array("status" => 'Error',
                    "msg" => 'User authentication failed')
            );
        }
        $input['user_id'] = $authenticate_user->id;
        $active_user = User::where('unique_code', $input['unique_code'])->where('is_active', 1)->first();

        if (!$active_user) {
            return json_encode(
                array("status" => 'Error',
                    "msg" => 'User is not active')
            );
        }
        $lead_group = LeadGroups::find($input['lead_group_id']);
        if (!$lead_group) {
            return json_encode(
                array("status" => 'Error',
                    "msg" => 'Invalid group id')
            );
        }
        if ($input['site_id'] != 0) {
            $site = Sites::find($input['site_id']);

            if (!$site) {
                return json_encode(
                    array("status" => 'Error',
                        "msg" => 'Invalid site id')
                );
            }
        }
        if ($input['introducer_id'] != 0) {
            $introducer = User::find($input['introducer_id']);
            if (!$introducer) {
                return json_encode(
                    array("status" => 'Error',
                        "msg" => 'Invalid Introducer id')
                );
            }
        }
        $check = check_lead_group($input['lead_group_id']);

        if ($check->deduplication_checks != '') {
            $where = "id!=0";
            $deduplication_checks = explode(',', $check->deduplication_checks);
            foreach ($deduplication_checks as $d) {
                if (isset($input[$d])) {
                    $where .= " AND " . $d . "= '" . $input[$d] . "'";
                }
            }
        }

        if ($check->duplication_bit == 2) {
            if (isset($where) && $where != 'id!=0') {
                $lead_exist = \DB::table('leads')->whereRaw($where)->count();
                if ($lead_exist > 0) {
                    return json_encode(
                        array("status" => 'Error',
                            "msg" => 'Lead Already Exist')
                    );
                }
            }
        }

        if ($check->duplication_bit == 3) {
            if (isset($where) && $where != 'id!=0') {

                $days = $check->duplication_days;
                $date = strtotime(date('Y-m-d'));
                $past_days = strtotime("-$days day", $date);
                $past_days = date('Y-m-d', $past_days);

                $lead_exist = \DB::table('leads')->whereDate('created_at', '>=', $past_days)->whereRaw($where)->count();

                if ($lead_exist > 0) {
                    return json_encode(
                        array("status" => 'Error',
                            "msg" => 'Lead Already Exist')
                    );
                }
            }
        }
        if (isset($input['pre_id']) && $input['pre_id'] != '') {
            \DB::table('leads_temp')->where('id', $input['pre_id'])->delete();
        }

        $client_ip = get_client_ip();

        if ($client_ip != 'UNKNOWN') {
            \DB::table('leads_temp')
                ->where('lead_group_id', $input['lead_group_id'])
                ->where('site_id', $input['site_id'])
                ->where('ip_address', $client_ip)
                ->delete();
        }

        $id = Leads::create($input)->id;
        $static = ['lead_group_id', 'site_id', 'user_id', 'introducer_id', 'assigned_to', 'unique_code', 'return_url', 'activation_key', '_token', 'title', 'first_name', 'last_name', 'email', 'phone', 'fax', 'zip', 'address', 'city', 'company', 'designation', 'dob_day', 'dob_month', 'dob_year', 'contact_time', 'allow_phone', 'allow_email', 'allow_fax', 'submit'];

        foreach ($input as $key => $value) {
            if (!in_array($key, $static)) {
                $key = str_replace("_", " ", $key);
                if (is_array($value)) {
                    $value = implode(',', $value);
                }
                $extra_fields[$key] = $value;
            }
        }

        $other_fields_values = '';

        if (isset($extra_fields)) {
            $other_fields_values = json_encode($extra_fields);
        }
        $Leads = Leads::findOrFail($id);
        $lead_update['other_fields_values'] = $other_fields_values;
        $Leads->update($lead_update);

        return json_encode(
            array("status" => 'Success', "msg" => 'Lead added successfully')
        );
    }

    public function postLeadlogger(Request $request)
    {
        $input = $request->all();
        $input = strip_tags_array($input);
        $authenticate_user = User::where('unique_code', $input['unique_code'])->first();
        if (!$authenticate_user) {
            echo json_encode(
                array("status" => 'Error',
                    "msg" => 'User authentication failed')
            );
            exit;
        }
        $input['user_id'] = $authenticate_user->id;
        $lead_group = LeadGroups::find($input['lead_group_id']);

        if (!$lead_group) {
            echo json_encode(
                array("status" => 'Error',
                    "msg" => 'Invalid group id')
            );
            exit;
        }
        if ($input['site_id'] != 0) {
            $site = Sites::find($input['site_id']);

            if (!$site) {
                echo json_encode(
                    array("status" => 'Error',
                        "msg" => 'Invalid site id')
                );
                exit;
            }
        }

        unset($input['return_url']);
        unset($input['unique_code']);
        unset($input['submit']);
        unset($input['activation_key']);
        $static = ['lead_group_id', 'site_id', 'user_id', 'introducer_id', 'assigned_to', 'unique_code', 'return_url', 'activation_key', '_token', 'title', 'first_name', 'last_name', 'email', 'phone', 'fax', 'zip', 'address', 'city', 'company', 'designation', 'dob_day', 'dob_month', 'dob_year', 'contact_time', 'allow_phone', 'allow_email', 'allow_fax', 'submit', 'pre_id', 'ip_address'];
        foreach ($input as $key => $value) {
            if (!in_array($key, $static)) {
                $key = str_replace("_", " ", $key);
                if (is_array($value)) {
                    $value = implode(',', $value);
                }
                $extra_fields[$key] = $value;
            } else {
                $lead_update[$key] = $value;
            }
        }
        $other_fields_values = '';
        if (isset($extra_fields)) {
            $other_fields_values = json_encode($extra_fields);
        }
        $lead_update['other_fields_values'] = $other_fields_values;
        if (isset($lead_update['pre_id'])) {
            $id = $lead_update['pre_id'];
            unset($lead_update['pre_id']);
            \DB::table('leads_temp')->where('id', $id)->update($lead_update);
        } else {
            \DB::table('leads_temp')->insert($lead_update);
            $id = \DB::getPdo()->lastInsertId();
        }
        echo json_encode(array("status" => 'Success', "pre_id" => $id));
        exit;
    }

    public function postLeadchecklog(Request $request)
    {
        $input = $request->all();

        $input = strip_tags_array($input);
        $where = '';
        $authenticate_user = User::where('unique_code', $input['unique_code'])->first();
        if (!$authenticate_user) {
            echo json_encode(
                array("status" => 'Error',
                    "msg" => 'User authentication failed')
            );
            exit;
        } else {
            $where .= ' user_id = "' . $authenticate_user->id . '" ';
        }

        $lead_group = LeadGroups::find($input['lead_group_id']);
        if (!$lead_group) {
            echo json_encode(
                array("status" => 'Error',
                    "msg" => 'Invalid group id')
            );
            exit;
        } else {
            $where .= ' AND lead_group_id = "' . $input['lead_group_id'] . '" ';
        }

        if ($input['site_id'] != 0) {
            $site = Sites::find($input['site_id']);

            if (!$site) {
                echo json_encode(
                    array("status" => 'Error',
                        "msg" => 'Invalid site id')
                );
                exit;
            } else {
                $where .= ' AND site_id = "' . $input['site_id'] . '" ';
            }
        }
        if (isset($input['ip_address']) && $input['ip_address'] != '1:::' && $input['ip_address'] != '') {
            $where .= ' AND ip_address = "' . $input['ip_address'] . '" ';
        }
        if ($where != '') {

            $results = \DB::table('leads_temp')->whereRaw($where)->first();
            if (count((array)$results) > 0) {
                echo json_encode(array("status" => 'Success', "result" => $results));
            } else {
                echo json_encode(array("status" => 'Error'));
            }
            exit;
        }
    }

    public function check_leads()
    {
        $mailContents = '<html><head><style>
body {
    margin:0;
    font-family: "Open Sans", sans-serif;
    font-size:100%;
    line-height:1.7;
}
h1, h2, h3, h4, h5, h6 {
    font-family: "Open Sans", sans-serif;
    font-weight: 600;
}
h1 {font-size: 2.37em;}
h2 {font-size: 1.83em;}
h3 {font-size: 1.39em;}
h4 {font-size: 1.1em;}
h5 {font-size: 0.98em;}
h6 {font-size: 0.85em;}
.display h1 {
    font-weight: 800;
    font-size: 2.8em;
    line-height:1.4;
    text-transform: uppercase;
}
.display p {
    font-size: 1.5em;
    font-style: italic;
}
a {color: #08c9b9;}
hr {border:none;border-top: rgba(0, 0, 0, 0.18) 1px solid;margin-top: 2em;margin-bottom: 2em;}
img {max-width:100%;}
figure {margin:0}


/* FIX: Preventing Chrome from wrapping text with span-style (when editing) */
.display h1 span {font-size: 2.8em;line-height:1.4;}
.display p span {font-size: 1.5em;line-height:1.7;}
h1 span {font-size: 2.37em;line-height:1.7;}
h2 span {font-size: 1.83em;line-height:1.7;}
h3 span {font-size: 1.39em;line-height:1.7;}
h4 span {font-size: 1.1em;line-height:1.7;}
h5 span {font-size: 0.98em;line-height:1.7;}
h6 span {font-size: 0.85em;line-height:1.7;}
p span {font-size: 16px; line-height: 1.7;}
li span {font-size: 16px; line-height: 1.7;}

/**********************************
    Printing
***********************************/
@page {
    size: auto;   /* auto is the current printer page size */
    margin: 20mm 0;   /* this affects the margin in the printer settings */
}

/**********************************
    Grid
***********************************/
.container {
    margin: 0 auto;
    max-width: 980px;
    width: 90%;
}
@media (min-width: 33rem) { /* 40rem */
    .column {
        float: left;
        padding-left: 1.32rem; /* 1rem */
        padding-right: 1.32rem;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }
    .column.full { width: 100%; }
    .column.two-third { width: 66.7%; }
    .column.two-fourth { width: 75%; }
    .column.two-fifth { width: 80%; }
    .column.two-sixth { width: 83.3%; }
    .column.half { width: 50%; }
    .column.third { width: 33.3%; }
    .column.fourth { width: 25%; }
    .column.fifth { width: 20%; }
    .column.sixth { width: 16.6%; }
    .column.flow-opposite { float: right; }
}
.clearfix:before, .clearfix:after {content: " ";display: table;}
.clearfix:after {clear: both;}
.clearfix {*zoom: 1;}


/**********************************
    Elements
***********************************/

.center {text-align:center}
.right {text-align:right}
.left {text-align:left}

img.circle {border-radius:500px;margin-top:0;}
img.bordered {border: #ccc 1px solid;}

.embed-responsive {position: relative;display:block;height:0;padding:0;overflow:hidden;}
.embed-responsive.embed-responsive-16by9 {padding-bottom: 56.25%;}
.embed-responsive.embed-responsive-4by3 {padding-bottom: 75%;}
.embed-responsive iframe {position: absolute;top:0;bottom:0;left:0;width:100%;height:100%;border:0;}

.column > img,
.column > figure,
.column > .embed-responsive {
    margin-top: 1em;margin-bottom: 1em;
}

.list {position:relative;margin:1.5em 0;}
.list > i {position:absolute;left:-3px;top:-3px;font-size:2em;}
.list > h2, .list > h3 {margin: 0 0 0 50px}
.list > p {margin: 0 0 0 50px}

.quote {position:relative;margin:1.5em 0;}
.quote > i {position: absolute;top: -10px; left: -7px;font-size: 2em;color:rgba(51,51,51,0.44);}
.quote > small {margin-left:50px;opacity: 0.7;font-size: 1em;}
.quote > p {margin-left:50px;font-size: 1.5em;}

.btn {
    padding: 10px 30px;
    font-size: 1.3em;
    line-height: 2em;
    border-radius: 6px;

    display: inline-block;
    margin-bottom: 0;
    font-weight: normal;
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    white-space: nowrap;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.btn.btn-primary {color: #ffffff;background-color: #08c9b9;}
.btn.btn-primary:hover {color: #ffffff;background-color: #07b0a2;border-color: #07b0a2;}
.btn.btn-default {color: #333333;background-color: #d3d3d3;}
.btn.btn-default:hover {color: #111;background-color: #ccc;border-color: #ccc;}

.social a > i {text-decoration:none;color:#333;font-size:1.5em;margin:0 5px 0 0;-webkit-transition: all 0.1s ease-in-out;transition: all 0.1s ease-in-out;}
.social a:hover > i {color:#08c9b9;}


/**********************************
    Header Image with Caption
***********************************/
figure.hdr {
	position: relative;
	width: 100%;
	overflow:hidden;
    background-color: #000;
}
figure.hdr img {
	position: relative;
	display: block;
	width: 100%;
	opacity: 0.8;
	-webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
	transition: opacity 0.35s, transform 0.35s;
	-webkit-transform: scale(1.2);
	transform: scale(1.2);
}
figure.hdr:hover img {
	opacity: 0.5;
	-webkit-transform: scale(1);
	transform: scale(1);
}
figure.hdr figcaption {
   	position: absolute;
	top: auto;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 60%;
	padding: 0 2.5em;
	color: #fff;
	font-size: 1.55em;
	text-align: center;
	box-sizing: border-box;
	z-index:1;
}
/* Text */
figure.hdr h2 {
	font-weight: 300;
	text-transform: uppercase;
}
figure.hdr h2 span {
	font-weight: 800;
}
figure.hdr p {
	letter-spacing: 1px;
	font-size: 68.5%;
	text-transform: uppercase;
}
figure.hdr h2, figure.hdr p {
	margin: 0;
	z-index:10000;
}
/* Cosmetic */
figure.hdr div {
	height: 100%;
	z-index:0;
}
figure.hdr div::before,
figure.hdr div::after {
	position: absolute;
	content: "";
}
/* One */
figure.one div::before {
	top: 50px;
	right: 30px;
	bottom: 50px;
	left: 30px;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #fff;
}
figure.one div::after {
	top: 30px;
	right: 50px;
	bottom: 30px;
	left: 50px;
	border-right: 1px solid #fff;
	border-left: 1px solid #fff;
}
/* Two */
figure.two div::before {
	top: 30px;
	right: 30px;
	bottom: 30px;
	left: 30px;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #fff;
}
figure.two div::after {
	top: 30px;
	right: 30px;
	bottom: 30px;
	left: 30px;
	border-right: 1px solid #fff;
	border-left: 1px solid #fff;
}
/* Three */
figure.three figcaption {
	height: 70%;
}
figure.three p {
	margin: 1em 0 0;
	padding: 2em;
	border: 1px solid #fff;
}
/* Four */
figure.four figcaption {
	height: 60%;
	text-align: left;
}
figure.four p {
	position: absolute;
	right: 50px;
	bottom: 50px;
	left: 50px;
	padding: 2em;
	border: 7px solid #fff;
}
/* Five */
figure.five figcaption {
	height: 100%;
	text-align: right;
}
figure.five h2 {
    position: absolute;
    left: 50px;
	right: 50px;
	top: 10%;
	border-bottom: 5px solid #fff;
}
figure.five p {
	position: absolute;
	right: 50px;
	bottom: 10%;
}
/* Six */
figure.six figcaption {
	height: 70%;
}
figure.six h2 {
    padding-bottom: 3%;
	border-bottom: 1px solid #fff;
}
figure.six p {
	padding-top: 6%;
}
/* Seven */
figure.seven figcaption {
	height: 90%;
	text-align:left;
}
figure.seven h2 {
	border-bottom: 3px solid #fff;
}
figure.seven p {
    padding-top: 1em;
}
/* Eight */
figure.eight figcaption {
	height: 100%;
	text-align: right;
}
figure.eight h2 {
	position: absolute;
	left: 50%;
	right: 50px;
	bottom: 10%;
}
figure.eight p {
    position: absolute;
    left: 50px;
	right: 50%;
	top: 10%;
	padding-right:0.5em;
	border-right: 1px solid #fff;
}</style></head><body><div class="row clearfix">
        <div class="column full display">
            <h1>The Cafe</h1>
            <p>Fresh roasted coffee, exclusive teas &amp; light meals</p>
        </div>
    </div>
    <div class="row clearfix">
        <div class="column half">
            <img src="assets/cafe.jpg">
        </div>
        <div class="column half">
            <p>Welcome to the website of the Cafe on the Corner. We are situated, yes youve guessed it, on the corner of This Road and That Street in The Town.</p>
            <p>We serve freshly brewed tea and coffee, soft drinks and a section of light meals and tasty treats and snacks. We are open for breakfast, lunch and afternoon tea from 8 am to 5 pm and unlike any other cafe in the town, we are open 7 days per week.</p>
       </div>
    </div>
    <div class="row clearfix">
        <div class="column full">
            <p>A truly family run business, we aim to create a cosy and friendly atmosphere in the cafe with Mum and Auntie doing the cooking and Dad and the (grown-up) children serving front of house. We look forward to welcoming you to the Cafe on the Corner very soon.</p>
        </div>
    </div></body></html>';

        $to = "dev.biralsabia@gmail.com";
        $fromemail = "dev.biralsabia@gmail.com";
        $fromName = "ControlPanda";
        $returnpath = "";
        $cc = "";

        $smtp = \DB::table("smtp_settings")->where("user_id", 1)->select('smtp_server', 'smtp_port', 'smtp_user', 'smtp_password')->first();

        $dd = \App\DbModel::SendHTMLMail($to, "Test", $mailContents, $fromemail, $fromName, $returnpath, $cc, $smtp);
    }

}
