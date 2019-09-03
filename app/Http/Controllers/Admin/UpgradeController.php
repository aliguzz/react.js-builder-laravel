<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Roles;
use Illuminate\Http\Request;
use App\Packages;
use App\PackageOrders;
use App\User;
use App\DbModel;
use App\Notifications;
use Alert;
use DB;
use Auth;
use Hash;
use View;

class UpgradeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {

        $user_id = Auth::user()->id;

        $data['current_package'] = DbModel::current_package($user_id);

        $data['packages'] = Packages::Where('price', '!=', 0)->get();

        return view('admin.upgrade.index')->with($data);
    }

    public function package_upgrade() {

        $data = array();

        if ($_POST) {

            $user_id = Auth::user()->id;
            $package = Packages::find($_POST['package_id']);
            $user = User::find($user_id);
            $current_package = DbModel::current_package($user_id);

            $input = array(
                'package_id' => $package->id,
                'user_id' => $user_id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'phone' => $user->phone,
                'package_title' => $package->title,
                'duration_days' => $package->duration_days,
                'duration_text' => $package->duration_text,
                'price' => $package->price,
                'creditcard_type' => $current_package->creditcard_type,
                'creditcard_no' => $current_package->creditcard_no,
                'creditcard_expiry_month' => $current_package->creditcard_expiry_month,
                'creditcard_expiry_year' => $current_package->creditcard_expiry_year,
                'creditcard_security' => $current_package->creditcard_security,
                'is_active' => 1,
                'expiry_date' => date('Y-m-d', strtotime('+' . $package->duration_days . ' days'))
            );

            $month = $current_package->creditcard_expiry_month;
            $year = $current_package->creditcard_expiry_year;
            if (is_numeric($current_package->creditcard_no) && strlen($current_package->creditcard_no) == 16 && is_numeric($current_package->creditcard_security) && strlen($current_package->creditcard_security) == 3 && strtotime('01/' . $month . '/' . $year) > strtotime(date('d/m/Y')) && $current_package->creditcard_type != "") {

//                $api_endpoint = 'https://api-3t.paypal.com/nvp';

                $api_endpoint = 'https://api-3t.sandbox.paypal.com/nvp';

                $API_UserName = 'willayat-facilitator_api1.arhamsoft.com';  // set your spi username
                $API_Password = '1398085230';  // set your spi password
                $API_Signature = 'AHW2bGhUojOtxGQsOlKvE0B6.P9yAbCHAYwLYkKathaEIdfJnFTWNhfD';  // set your spi Signature

                $payment_data = array(
                    'METHOD' => 'DoDirectPayment',
                    'VERSION' => '51.0',
                    'USER' => $API_UserName,
                    'PWD' => $API_Password,
                    'SIGNATURE' => $API_Signature,
                    'PAYMENTACTION' => 'Sale',
                    'AMT' => $package->price,
                    'CURRENCYCODE' => 'USD',
                    'CREDITCARDTYPE' => $current_package->creditcard_type, //'Visa',
                    'ACCT' => $current_package->creditcard_no, //'4386771740365012',
                    'EXPDATE' => $month . $year, //'122017',
                    'CVV2' => $current_package->creditcard_security, //'666',
                    'FIRSTNAME' => 'Saad',
                    'LASTNAME' => 'Khan',
                    'EMAIL' => 'saeed@arhamsoft.com',
                    'IPADDRESS' => '',
                    'STREET' => '',
                    'CITY' => '',
                    'STATE' => '',
                    'ZIP' => '54000',
                );

                $curl = curl_init($api_endpoint);

                curl_setopt($curl, CURLOPT_PORT, 443);
                curl_setopt($curl, CURLOPT_HEADER, 0);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_FORBID_REUSE, 1);
                curl_setopt($curl, CURLOPT_FRESH_CONNECT, 1);
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($payment_data));

                $response = curl_exec($curl);
                curl_close($curl);
                $response_data = array();
                parse_str($response, $response_data);

                if ($response_data['ACK'] == 'Success'):
                    $data['ACK'] = $response_data['ACK'];
                    $data['message'] = "You have successfully paid. Package Upgraded.";

                    // insert data in table
                    $update['is_active'] = 0;
                    PackageOrders::where('user_id', $user_id)->update($update);
                    $order_id = PackageOrders::create($input)->id;

                    // Add Notification
                    $notification_details = array(
                        'type' => 'package_upgraded',
                        'title' => 'Package Upgraded',
                        'package_title' => $package->title,
                        'package_id' => $package->id,
                        'order_id' => $order_id,
                    );

                    $notification_id = Notifications::create($notification_details)->id;

                    $notification_users = Notifications::add_users($notification_id, $user_id);

                    $template = \DB::table('templates')->where('template_type', 1)->where('email_type', 'package_upgraded')->first();

                    if ($template != '') {

                        $subject = $template->subject;
                        $link = url("login");
                        $to_replace = ['[FIRSTNAME]', '[LASTNAME]', '[CURRENTPACKAGE]', '[NEWPACKAGE]'];
                        $with_replace = [$user->first_name, $user->last_name, $current_package->package_title, $package->title];
                        $html_body = '';
                        $html_body .= str_replace($to_replace, $with_replace, $template->content);

                        $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
                    } else {

                        // send email
                        $subject = 'Package Upgraded';
                        $html_body = '';
                        $html_body .= "Hi " . $user->first_name . " " . $user->last_name . " ! " . "<br />";
                        $html_body .= 'Your current package ' . $current_package->package_title . 'is upgraded to' . $package->title . "<br />";

                        $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
                    }

                    $to = $user->email;

                    $returnpath = "";
                    $cc = "";
                    $smtp = \DB::table("smtp_settings")->where("user_id", $user->id)->select('from_name', 'from_email')->first();

                    $dd = DbModel::SendHTMLMail($to, $subject, $mailContents, $smtp->from_email, $smtp->from_name, $returnpath, $cc);

                endif;

                if ($response_data['ACK'] == 'Failure'):
                    $data['ACK'] = $response_data['ACK'];
                    $data['message'] = "Payment Failure";

                endif;
            }
            else {
                $data['ACK'] = 'Failure';
                $data['message'] = "Please fillout your payment information here";
                Alert::Error($data['message'])->autoclose(4000);
                return redirect('admin/my-profile?action=payment');
            }

            //  echo json_encode($data);
            if ($data['ACK'] == 'Success') {
                Alert::Success($data['message'])->autoclose(3000);
            } else {
                Alert::Error($data['message'])->autoclose(3000);
            }
            return redirect()->back();
        }
    }

    public function approve_user(Request $request) {

        $id = $request->input('id');
        $order = PackageOrders::find($id);

        $exist = User::Where('email', $order->email)->first();

        if ($exist != '') {
            Alert::error('Error', 'Email already exist for other user!')->autoclose(3000);
            return redirect('admin/package-orders');
        } else {
            $original_password = '';
            $desired_length = rand(8, 12);
            $original_password = DbModel::unqiue_code($desired_length);
            $password = Hash::make($original_password);

            $code_length = rand(20, 25);
            $unique_code = DbModel::unqiue_code($code_length);

            $input = array(
                'first_name' => $order->first_name,
                'last_name' => $order->last_name,
                'email' => $order->email,
                'password' => $password,
                'original_password' => $original_password,
                'phone' => $order->phone,
                'unique_code' => $unique_code,
                'is_active' => 1,
            );

            $template = \DB::table('templates')->where('template_type', 1)->where('email_type', 'signup')->first();

            if ($template != '') {

                $subject = $template->subject;
                $link = url("login");
                $to_replace = ['[FIRSTNAME]', '[LASTNAME]', '[EMAIL]', '[PASSWORD]', '[LINK]'];
                $with_replace = [$input['first_name'], $input['last_name'], $input['email'], $input['original_password'], $link];
                $html_body = '';
                $html_body .= str_replace($to_replace, $with_replace, $template->content);

                $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
            } else {

                // send email
                $subject = 'BTCWallet Credentail Details';
                $link = url("login");
                $html_body = '';
                $html_body .= "Hi " . $input['first_name'] . " " . $input['last_name'] . " ! " . "<br />";
                $html_body .= 'Your account has been created successffuly. Follwing are your credential details:' . "<br />";
                $html_body .= "Email: " . $input['email'] . "<br />";
                $html_body .= "Password: " . $input['original_password'] . "<br />";
                $html_body .= '<br><br>';
                $html_body .= "Please login to continue: " . '<a href="' . $link . '"> ' . $link . ' </a>';


                $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
            }

            $to = $input['email'];

            $returnpath = "";
            $cc = "";

            $smtp = \DB::table("smtp_settings")->where("user_id", $user->id)->select('from_name', 'from_email')->first();

            $dd = DbModel::SendHTMLMail($to, $subject, $mailContents, $smtp->from_email, $smtp->from_name, $returnpath, $cc);

            // insert user data
            $user_id = User::create($input)->id;
            $rights = \DB::table('permission')->where('role_id', 2)->get();
            foreach ($rights as $right) {
                \DB::table('user_permissions')->insert(['user_id' => $user_id, 'right_id' => $right->right_id]);
            }

            $package_order = PackageOrders::findOrFail($id);
            $update['expiry_date'] = date('Y-m-d', strtotime('+' . $package_order['duration_days'] . ' days'));
            $update['user_id'] = $user_id;
            $package_order->update($update);

            Alert::success('Success', 'User Approved Succesfully')->autoclose(3000);
            return redirect()->back();
        }
    }

}
