<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains;
use App\DbModel;
use Auth;
use App\Leads;
use Alert;
use Validator;
use URL;
use Session;
use PayPal;
use Redirect;
use Input;
use App\User;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;
use View;
use App\DigitalAssets;

class DomainsController extends Controller {

    private $_apiContext;

    public function __construct() {
        $paypal = new \Netshell\Paypal\Paypal;
        $this->_apiContext = $paypal->ApiContext(
                config('services.paypal.client_id'), config('services.paypal.secret'));

        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'service.EndPoint' => 'https://api.sandbox.paypal.com',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE'
        ));
    }

    /**
     * Display a dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        not_permissions_redirect(have_premission(array(40,41,48,49,53,78,147,50)));
        $user = Auth::user();
        $user_id = \Auth::User()->id;
        $data['domaincount'] = \DB::table('domains')->where('user_id', $user_id)->count('id');
        $data['Projects'] = \DB::table('projects')->select('projects.*', \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS ind_name'))->get();
        $data['domains'] = Domains::where('user_id', $user->id)->paginate(10);

        $data['digitalassets'] = DigitalAssets::paginate(10);

        $data['smtp'] = \DB::table("smtp_settings")->where("user_id", $user_id)->first();
        $data['users'] = User::join('roles', 'roles.id', '=', 'users.role')->select('roles.title as role_name', 'users.*')->paginate(10);
        $data['total'] = User::join('roles', 'roles.id', '=', 'users.role')->select('roles.title as role_name', 'users.*')->count();
        //$data['domains'] = Domains::get();
        

        return view('admin.domains.connection')->with($data);
    }

    public function domainsapi($id) {
        //echo $id;
        //exit();
        $user = Auth::user();
        //$data['domains'] = Domains::get();
        $data['contact_profile'] = Leads::select('leads.*', \DB::raw('(select name from `pages` WHERE pages.id = leads.page_id AND pageable_type = "Project") AS page_name'), \DB::raw('(select name from `projects` WHERE projects.id = leads.project_id) AS project_name'))->where('project_id', $id)->orderby('id', 'DESC')->get();
        header('Content-Type: application/json');
        echo str_replace("||", "", json_encode($data, JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE));
        exit;
        //return view('admin.domains.index')->with($data);
    }

    public function pagesapi() {

        $where = ' projects.id > 0';

        $data['Control_panda_accounts'] = \DB::table('projects')
                ->leftJoin('users_projects', 'projects.id', '=', 'users_projects.project_id')
                ->select('projects.*', \DB::raw('(SELECT templates.name FROM templates WHERE templates.id = projects.template_id ) AS temp_name'), \DB::raw('(SELECT templates.thumbnail FROM templates WHERE templates.id = projects.template_id) AS thumbnail'), \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS t_cat_name'), \DB::raw('(SELECT COUNT(pages.id) FROM pages WHERE pages.pageable_id = projects.id AND pages.pageable_type = "Project" LIMIT 0,1) AS steps'))
                ->orderBy('projects.id', 'desc')
                ->whereRaw($where)
                //->whereRaw(' SELECT LOWER(templates.name) LIKE "%' . strtolower($request->keyword) . '%"')
                ->where('users_projects.user_id', 1)
                ->paginate(200);


        header('Content-Type: application/json');
        echo str_replace("||", "", json_encode($data, JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE));
        exit;
        //return view('admin.domains.index')->with($data);
    }

    public function create() {

        //check domains limit
        $package = \DB::table('users as u')
                ->leftJoin('package_orders as o', 'o.user_id', '=', 'u.id')
                ->leftJoin('packages as p', 'p.id', '=', 'o.package_id')
                ->select('p.connect_domains')
                ->where('p.is_active', 1)
                ->where('o.user_id', Auth::user()->id)
                ->first();

        $no_of_domains = \DB::table('domains')
                ->where('user_id', Auth::user()->id)
                ->count('id');

        if ($package->connect_domains != 'unlimited' && $no_of_domains >= $package->connect_domains) {
            Alert::warning('Warning Message', 'Your domain limit reached. Please upgrade your account to buy more domains. ')->persistent('Close');
            return redirect()->back();
        }
        //end

        $data['action'] = "Add";
        $data['Projects'] = \DB::table('projects')->select('projects.*', \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS ind_name'))->get();

        return view('admin.domains.add')->with($data);
    }

    public function edit($id) {

        $data['action'] = "Edit";
        $data['domain'] = Domains::where('id', $id)->select('id', 'name', 'status', 'project_id', 'ip_address')->first();

        $data['Projects'] = \DB::table('projects')->select('projects.*', \DB::raw('(SELECT industries.title FROM industries WHERE industries.id = projects.ind_id) AS ind_name'))->orderBy('id', 'desc')->get();

        return view('admin.domains.edit')->with($data);
    }

    public function ssl_purchase(Request $request) {
        $input = $request->all();
        $user = Auth::user();
        $html = '';
        $html1 = '';
$user['first_name'] = preg_replace('/[^A-Za-z0-9]/i', '', $user['first_name']);
$user['last_name'] = preg_replace('/[^A-Za-z0-9]/i', '', $user['last_name']);
        $TEST_MODE = false;

        
        $connection_options = [
            'live' => [
                'api_host_port' => 'https://rr-n1-tor.opensrs.net:55443',
                'api_key' => '1fec1afd0eadcd5a685f48e212301a5cbc9bd6d0fa8d6ebb36f805e5554916e2b2b7d24d7d898bf20f0d5e1a793e00907bb9314450e21617',
                'reseller_username' => 'Sheppypeppy'
            ],
            'test' => [
                'api_host_port' => 'https://horizon.opensrs.net:55443',
                'api_key' => '80478fe27b2f9f755884a6bf9d8f06511cd77a90dc9a935f1c9894336aa2cbf3815088c6e31ddcc2a625acbe037996ddde70f1114e735fce',
                'reseller_username' => 'Sheppypeppy'
            ]
        ];

        if ($TEST_MODE) {
            $connection_details = $connection_options['test'];
        } else {
            $connection_details = $connection_options['live'];
        }

        $xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<!DOCTYPE OPS_envelope SYSTEM "ops.dtd">
<OPS_envelope>
    <header>
        <version>0.9</version>
    </header>
    <body>
        <data_block>
            <dt_assoc>
                <item key="protocol">XCP</item>
                <item key="action">modify</item>
                <item key="object">domain</item>
                <item key="attributes">
                    <dt_assoc>
                        <item key="domain">' . $input['domain_name'] . '</item>
                        <item key="lock_state">0</item>
                        <item key="data">status</item>
                    </dt_assoc>
                </item>
            </dt_assoc>
        </data_block>
    </body>
</OPS_envelope>';

        $data = [
            'Content-Type:text/xml',
            'X-Username:' . $connection_details['reseller_username'],
            'X-Signature:' . md5(md5($xml . $connection_details['api_key']) . $connection_details['api_key']),
        ];

        $ch = curl_init($connection_details['api_host_port']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $data);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

        $response = curl_exec($ch);
        
        
        

        $xml = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<!DOCTYPE OPS_envelope SYSTEM "ops.dtd">
<OPS_envelope>
    <header>
        <version>0.9</version>
    </header>
    <body>
        <data_block>
            <dt_assoc>
                <item key="protocol">XCP</item>
                <item key="action">advanced_update_nameservers</item>
                <item key="object">domain</item>
                <item key="domain">' . $input['domain_name'] . '</item>
                
                    
                <item key="attributes">
                    <dt_assoc>
                        <item key="op_type">add_remove</item>
                        <item key="remove_ns">
                            <dt_array>
                                <item key="0">parking1.mdnsservice.com</item>
                                <item key="1">parking2.mdnsservice.com</item>
                            </dt_array>
                        </item>
                        <item key="add_ns">
                            <dt_array>
                                <item key="0">ns1.systemdns.com</item>
                                <item key="1">ns2.systemdns.com</item>
                                <item key="2">ns3.systemdns.com</item>
                            </dt_array>
                        </item>
                    </dt_assoc>
                </item>

            </dt_assoc>
        </data_block>
    </body>
</OPS_envelope>';

        $data = [
            'Content-Type:text/xml',
            'X-Username:' . $connection_details['reseller_username'],
            'X-Signature:' . md5(md5($xml . $connection_details['api_key']) . $connection_details['api_key']),
        ];

        $ch = curl_init($connection_details['api_host_port']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $data);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

        $response = curl_exec($ch);

        
        

        $xml = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<OPS_envelope>
    <header>
        <version>0.9</version>
    </header>
    <body>
        <data_block>
            <dt_assoc>
                <item key="protocol">XCP</item>
                <item key="action">sw_register</item>
                <item key="object">trust_service</item>
                <item key="attributes">
                    <dt_assoc>
                        
                        <item key="reg_type">NEW</item>
                        <item key="contact_set">
                            <dt_assoc>
                                <item key="organization">
                                    <dt_assoc>
                                        <item key="country">US</item>
                                        <item key="org_name">Arhamsoft</item>';
        if ($user['first_name'] <> '') {
            $xml .= '<item key="org_name">' . $user['first_name'] . '</item>';
        } else {
            $xml .= '<item key="org_name">Chris</item>';
        }

        if ($user['phone'] <> '') {
            $xml .= '<item key="phone">' . $user['phone'] . '</item>';
        } else {
            $xml .= '<item key="phone">07738016665</item>';
        }

        if ($user['address'] <> '') {
            $xml .= '<item key="address2">' . $user['address'] . '</item>';
        } else {
            $xml .= '<item key="address2">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
        }

        if ($user['last_name'] <> '') {
            $xml .= '<item key="last_name">' . $user['last_name'] . '</item>';
        } else {
            $xml .= '<item key="last_name">Niebel</item>';
        }

        if ($user['email'] <> '') {
            $xml .= '<item key="email">' . $user['email'] . '</item>';
        } else {
            $xml .= '<item key="email">chrisniebel@hotmail.com</item>';
        }

        if ($user['city'] <> '') {
            $xml .= '<item key="city">' . $user['city'] . '</item>';
        } else {
            $xml .= '<item key="city">Viena</item>';
        }

        if (!true) {
            $xml .= '<item key="postal_code">' . $user['zipcode'] . '</item>';
        } else {
            $xml .= '<item key="postal_code">54000</item>';
        }

        if ($user['fax'] <> '') {
            $xml .= '<item key="fax">' . $user['fax'] . '</item>';
        } else {
            $xml .= '<item key="fax">07738016665</item>';
        }

        if ($user['address'] <> '') {
            $xml .= '<item key="address1">' . $user['address'] . '</item>';
        } else {
            $xml .= '<item key="address1">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
        }

        if ($user['first_name'] <> '') {
            $xml .= '<item key="first_name">' . $user['first_name'] . '</item>';
        } else {
            $xml .= '<item key="first_name">Chris</item>';
        }
        $xml .= '<item key="state">CA</item>
                            <item key="title">Organization</item>
                                    </dt_assoc>
                                </item>
                                <item key="admin">
                                    <dt_assoc>
                                        <item key="country">US</item>
                                        <item key="org_name">Arhamsoft</item>';
        if ($user['first_name'] <> '') {
            $xml .= '<item key="org_name">' . $user['first_name'] . '</item>';
        } else {
            $xml .= '<item key="org_name">Chris</item>';
        }

        if ($user['phone'] <> '') {
            $xml .= '<item key="phone">' . $user['phone'] . '</item>';
        } else {
            $xml .= '<item key="phone">07738016665</item>';
        }

        if ($user['address'] <> '') {
            $xml .= '<item key="address2">' . $user['address'] . '</item>';
        } else {
            $xml .= '<item key="address2">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
        }

        if ($user['last_name'] <> '') {
            $xml .= '<item key="last_name">' . $user['last_name'] . '</item>';
        } else {
            $xml .= '<item key="last_name">Niebel</item>';
        }

        if ($user['email'] <> '') {
            $xml .= '<item key="email">' . $user['email'] . '</item>';
        } else {
            $xml .= '<item key="email">chrisniebel@hotmail.com</item>';
        }

        if ($user['city'] <> '') {
            $xml .= '<item key="city">' . $user['city'] . '</item>';
        } else {
            $xml .= '<item key="city">Viena</item>';
        }

        if (!true) {
            $xml .= '<item key="postal_code">' . $user['zipcode'] . '</item>';
        } else {
            $xml .= '<item key="postal_code">54000</item>';
        }

        if ($user['fax'] <> '') {
            $xml .= '<item key="fax">' . $user['fax'] . '</item>';
        } else {
            $xml .= '<item key="fax">07738016665</item>';
        }

        if ($user['address'] <> '') {
            $xml .= '<item key="address1">' . $user['address'] . '</item>';
        } else {
            $xml .= '<item key="address1">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
        }

        if ($user['first_name'] <> '') {
            $xml .= '<item key="first_name">' . $user['first_name'] . '</item>';
        } else {
            $xml .= '<item key="first_name">Chris</item>';
        }
        $xml .= '<item key="state">CA</item>
                                        <item key="title">Admin</item>
                                    </dt_assoc>
                                </item>
                                <item key="billing">
                                    <dt_assoc>
                                        <item key="country">US</item>
                                        <item key="org_name">Arhamsoft</item>';
        if ($user['first_name'] <> '') {
            $xml .= '<item key="org_name">' . $user['first_name'] . '</item>';
        } else {
            $xml .= '<item key="org_name">Chris</item>';
        }

        if ($user['phone'] <> '') {
            $xml .= '<item key="phone">' . $user['phone'] . '</item>';
        } else {
            $xml .= '<item key="phone">07738016665</item>';
        }

        if ($user['address'] <> '') {
            $xml .= '<item key="address2">' . $user['address'] . '</item>';
        } else {
            $xml .= '<item key="address2">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
        }

        if ($user['last_name'] <> '') {
            $xml .= '<item key="last_name">' . $user['last_name'] . '</item>';
        } else {
            $xml .= '<item key="last_name">Niebel</item>';
        }

        if ($user['email'] <> '') {
            $xml .= '<item key="email">' . $user['email'] . '</item>';
        } else {
            $xml .= '<item key="email">chrisniebel@hotmail.com</item>';
        }

        if ($user['city'] <> '') {
            $xml .= '<item key="city">' . $user['city'] . '</item>';
        } else {
            $xml .= '<item key="city">Viena</item>';
        }

        if (!true) {
            $xml .= '<item key="postal_code">' . $user['zipcode'] . '</item>';
        } else {
            $xml .= '<item key="postal_code">54000</item>';
        }

        if ($user['fax'] <> '') {
            $xml .= '<item key="fax">' . $user['fax'] . '</item>';
        } else {
            $xml .= '<item key="fax">07738016665</item>';
        }

        if ($user['address'] <> '') {
            $xml .= '<item key="address1">' . $user['address'] . '</item>';
        } else {
            $xml .= '<item key="address1">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
        }

        if ($user['first_name'] <> '') {
            $xml .= '<item key="first_name">' . $user['first_name'] . '</item>';
        } else {
            $xml .= '<item key="first_name">Chris</item>';
        }
        $xml .= '<item key="state">CA</item>
                                        <item key="title">Billing</item>
                                    </dt_assoc>
                                </item>
                                <item key="tech">
                                    <dt_assoc>
                                        <item key="country">US</item>
                                        <item key="org_name">Arhamsoft</item>';
        if ($user['first_name'] <> '') {
            $xml .= '<item key="org_name">' . $user['first_name'] . '</item>';
        } else {
            $xml .= '<item key="org_name">Chris</item>';
        }

        if ($user['phone'] <> '') {
            $xml .= '<item key="phone">' . $user['phone'] . '</item>';
        } else {
            $xml .= '<item key="phone">07738016665</item>';
        }

        if ($user['address'] <> '') {
            $xml .= '<item key="address2">' . $user['address'] . '</item>';
        } else {
            $xml .= '<item key="address2">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
        }

        if ($user['last_name'] <> '') {
            $xml .= '<item key="last_name">' . $user['last_name'] . '</item>';
        } else {
            $xml .= '<item key="last_name">Niebel</item>';
        }

        if ($user['email'] <> '') {
            $xml .= '<item key="email">' . $user['email'] . '</item>';
        } else {
            $xml .= '<item key="email">chrisniebel@hotmail.com</item>';
        }

        if ($user['city'] <> '') {
            $xml .= '<item key="city">' . $user['city'] . '</item>';
        } else {
            $xml .= '<item key="city">Viena</item>';
        }

        if (!true) {
            $xml .= '<item key="postal_code">' . $user['zipcode'] . '</item>';
        } else {
            $xml .= '<item key="postal_code">54000</item>';
        }

        if ($user['fax'] <> '') {
            $xml .= '<item key="fax">' . $user['fax'] . '</item>';
        } else {
            $xml .= '<item key="fax">07738016665</item>';
        }

        if ($user['address'] <> '') {
            $xml .= '<item key="address1">' . $user['address'] . '</item>';
        } else {
            $xml .= '<item key="address1">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
        }

        if ($user['first_name'] <> '') {
            $xml .= '<item key="first_name">' . $user['first_name'] . '</item>';
        } else {
            $xml .= '<item key="first_name">Chris</item>';
        }
        $xml .= '<item key="state">CA</item>
                                        <item key="title">Tech</item>
                                    </dt_assoc>
                                </item>
                            </dt_assoc>
                        </item>
                        <item key="handle">process</item>
<item key="csr">' . $input['csr_code'] . '</item>
                        <item key="period">1</item>
                        <item key="domain">' . $input['domain_name'] . '</item>
                        <item key="server_type">other</item>
                        <item key="product_type">symantec_ssl_lite</item>
                    </dt_assoc>
                </item>
            </dt_assoc>
        </data_block>
    </body>
</OPS_envelope>';

        $data_c = [
            'Content-Type:text/xml',
            'X-Username:' . $connection_details['reseller_username'],
            'X-Signature:' . md5(md5($xml . $connection_details['api_key']) . $connection_details['api_key']),
        ];

        $ch = curl_init($connection_details['api_host_port']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $data_c);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

        $response = curl_exec($ch);
        


        $err = curl_error($ch);
        if ($err) {
            $html .= '<ul class="list-group">';
            $html .= '<li class="list-group-item list-group-item-warning" > Please try with authentic information</li>';
            $html .= '</ul>';
        } else {


            $data_r = $response;
            $DOMdocument = new \DOMDocument();
            $DOMdocument->loadXML($data_r);
            $xpath = new \DOMXPath($DOMdocument);
            $itemElements = $xpath->query('//item'); //obtain all items tag in the DOM
            $argsArray = array();
            foreach ($itemElements as $itemTag) {
                $key = $itemTag->getAttribute('key'); //obtain the key
                $value = $itemTag->nodeValue; //obtain value
                $argsArray[$key] = $value;
            }
            if ($argsArray['is_success'] == 1) {


                $html1 .= '<ul class="list-group">';
                $html1 .= '<li class="list-group-item list-group-item-success" >Response : ' . $argsArray['response_text'] . '</li>';
                $html1 .= '<li class="list-group-item list-group-item-success" > <b> On Super admin approval your store will be redireced to your (custom domain address) </b></li>';

                $html1 .= '</ul>';


                $Domains = Domains::findOrFail($input['domain_id']);
                $puts["ssl_enabled"] = 1;
                $Domains->update($puts);
                Alert::success('Success Message', 'SSL added successfully!')->autoclose(3000);
                return redirect('admin/domains');
            }
            if ($argsArray['is_success'] == 0) {


                $html .= '<ul class="list-group">';
                $html .= '<li class="list-group-item list-group-item-warning" > Response: ' . $argsArray['response_text'] . '</li>';
                $html .= '</ul>';
                Alert::error('Error Message', $argsArray['response_text'])->autoclose(6000);
                return redirect('admin/domains');
            }
        }
        //echo $html;
        //exit();
        ////////////////////////////      SSL LITE Purchased    /////////////////////////
    }

    public function update_domain(Request $request) {
        Domains::where('id', $request->domain_id)->update(['status' => $request->status, 'project_id' => $request->project_id]);
        Alert::success('Domain Update Successfully!!')->autoclose(3000);
        return redirect('admin/domains');
    }

    public function integrate_email_list(Request $request) {

        $input = $request->except('_token');
        $input['created_at'] = date('Y-m-d H:i:s');
        $input['updated_at'] = date('Y-m-d H:i:s');
        \DB::table('pages_email_lists')->insert($input);
        Alert::success('Email list integrate Successfully!!')->autoclose(3000);
        return redirect()->back();
    }

    public function connect_domain(Request $request) {
        $input = $request->all();

        $project_id = $input['project_id'];
        $domain_name = $input['domain_name'];
        Domains::where('id', $domain_name)->update(['project_id' => $project_id]);

        echo "1";
        //return redirect()->back();
    }

    public function settings_domain(Request $request) {
        $input = $request->all();

        $project_id = $input['project_id'];
        $domain_id = $input['domain_id'];
        $domain_status = $input['domain_status'];
        Domains::where('id', $domain_id)->update(['project_id' => $project_id, 'status' => $domain_status]);

        echo "1";
        //return redirect()->back();
    }

    public function get_domains(Request $request) {
        $input = $request->all();

        $TEST_MODE = false;


        $connection_options = [
            'live' => [
                'api_host_port' => 'https://rr-n1-tor.opensrs.net:55443',
                'api_key' => '1fec1afd0eadcd5a685f48e212301a5cbc9bd6d0fa8d6ebb36f805e5554916e2b2b7d24d7d898bf20f0d5e1a793e00907bb9314450e21617',
                'reseller_username' => 'Sheppypeppy'
            ],
            'test' => [
                'api_host_port' => 'https://horizon.opensrs.net:55443',
                'api_key' => '80478fe27b2f9f755884a6bf9d8f06511cd77a90dc9a935f1c9894336aa2cbf3815088c6e31ddcc2a625acbe037996ddde70f1114e735fce',
                'reseller_username' => 'Sheppypeppy'
            ]
        ];

        if ($TEST_MODE) {
            $connection_details = $connection_options['test'];
        } else {
            $connection_details = $connection_options['live'];
        }

        $xml = $xml = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<OPS_envelope>
    <header>
        <version>0.9</version>
    </header>
    <body>
        <data_block>
            <dt_assoc>
                <item key="protocol">XCP</item>
                <item key="action">name_suggest</item>
                <item key="object">domain</item>
                <item key="attributes">
                    <dt_assoc>
                        <item key="searchstring">' . $input['new_domain_name'] . '</item>
                        <item key="max_wait_time">1</item>
                        <item key="languages">
                            <dt_array>
                                <item key="0">en</item>
                                <item key="1">de</item>
                                <item key="2">it</item>
                                <item key="3">es</item>
                            </dt_array>
                        </item>
                        <item key="tlds">
                            <dt_array>
                                <item key="0">.com</item>
                                <item key="1">.net</item>
                                <item key="2">.org</item>
                                <item key="3">.in</item>
                            </dt_array>
                        </item>
                        <item key="services">
                            <dt_array>
                                <item key="0">lookup</item>
                                <item key="1">suggestion</item>
                                <item key="2">premium</item>
                            </dt_array>
                        </item>
                    </dt_assoc>
                </item>
            </dt_assoc>
        </data_block>
    </body>
</OPS_envelope>';

        $data = [
            'Content-Type:text/xml',
            'X-Username:' . $connection_details['reseller_username'],
            'X-Signature:' . md5(md5($xml . $connection_details['api_key']) . $connection_details['api_key']),
        ];

        $ch = curl_init($connection_details['api_host_port']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $data);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

        $response = curl_exec($ch);

        $responce_obj = simplexml_load_string($response);

        $response_array = xml2array($responce_obj);
        $response_array2 = $response_array['body']['data_block']['dt_assoc']['item'][7];
        $response_array2 = xml2array($response_array2);

        $response_array3 = @$response_array2['dt_assoc']['item'][0];
         if(empty($response_array3)){
            echo json_encode(0);
            die();
        }
        $response_array3 = xml2array($response_array3);

        $response_array4 = @$response_array3['dt_assoc']['item'][3];
        $response_array4 = xml2array($response_array4);
        $response_array5 = $response_array4['dt_array']['item'];
        $response_array5 = xml2array($response_array5);

        
       
        echo json_encode($response_array5);
    }

    public function random_password($length = 10) {
        $charsSmall = "abcdefghijklmnopqrstuvwxyz";
        $charsNum = "0123456789";
        $charsBig = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $charsSpl = "!@#$%^&*()_-=+;:,.?";

        $password = substr(str_shuffle($charsSmall), 0, 3);
        $password .= substr(str_shuffle($charsNum), 0, 2);
        $password .= substr(str_shuffle($charsBig), 0, 5);
        //$password .= substr(str_shuffle($charsSpl), 0, 2);

        return $password;
    }

    public function get_domain_price(Request $request) {
        $input = $request->all();
        $TEST_MODE = false;

        $connection_options = [
            'live' => [
                'api_host_port' => 'https://rr-n1-tor.opensrs.net:55443',
                'api_key' => '1fec1afd0eadcd5a685f48e212301a5cbc9bd6d0fa8d6ebb36f805e5554916e2b2b7d24d7d898bf20f0d5e1a793e00907bb9314450e21617',
                'reseller_username' => 'Sheppypeppy'
            ],
            'test' => [
                'api_host_port' => 'https://horizon.opensrs.net:55443',
                'api_key' => '80478fe27b2f9f755884a6bf9d8f06511cd77a90dc9a935f1c9894336aa2cbf3815088c6e31ddcc2a625acbe037996ddde70f1114e735fce',
                'reseller_username' => 'Sheppypeppy'
            ]
        ];

        if ($TEST_MODE) {
            $connection_details = $connection_options['test'];
        } else {
            $connection_details = $connection_options['live'];
        }

        $xml = $xml = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<OPS_envelope>
    <header>
        <version>0.9</version>
    </header>
    <body>
        <data_block>
            <dt_assoc>
                <item key="protocol">XCP</item>
                <item key="action">GET_PRICE</item>
                <item key="object">DOMAIN</item>
                <item key="attributes">
                    <dt_assoc>
                        <item key="domain">' . $input['domain_name'] . '</item>
                        <item key="period">1</item>
                        <item key="reg_type">new</item>
                    </dt_assoc>
                </item>
            </dt_assoc>
        </data_block>
    </body>
</OPS_envelope>';

        $data = [
            'Content-Type:text/xml',
            'X-Username:' . $connection_details['reseller_username'],
            'X-Signature:' . md5(md5($xml . $connection_details['api_key']) . $connection_details['api_key']),
        ];

        $ch = curl_init($connection_details['api_host_port']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $data);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

        $response = curl_exec($ch);
        $responce_obj = simplexml_load_string($response);
        $response_array = xml2array($responce_obj);
        $response_array2 = $response_array['body']['data_block']['dt_assoc']['item'][4];
        $response_array2 = xml2array($response_array2);
        echo '19.99';
        //echo $response_array2['dt_assoc']['item'] + settingValue('domain_commissions');
    }

    public function buy_domain(Request $request) {
        
        $user = Auth::user();
$user['first_name'] = preg_replace('/[^A-Za-z0-9]/i', '', $user['first_name']);
$user['last_name'] = preg_replace('/[^A-Za-z0-9]/i', '', $user['last_name']);

        $validator = Validator::make($request->all(), [
                    'cc_name' => 'required',
                    'cc_number' => 'required',
                    'cc_exp_month' => 'required',
                    'cc_exp_year' => 'required',
                    'cc_cvv' => 'required',
        ]);
        $input = $request->all();


        $input1 = array(
            'name' => $input['domain_name'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'renew_date' => date('Y-m-d', strtotime(date("Y-m-d", time()) . " + 365 day")),
            'price' => $input['domain_price'],
            'payment_gateway' => 'Stripe',
            'user_id' => $user->id
        );

        if ($validator->passes()) {
            
            $input = array_except($input, array('_token'));
            $stripe = Stripe::make('sk_test_hozK0ctJUOxWOwc7A8Y0pzeL');
            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $request->get('cc_number'),
                        'exp_month' => $request->get('cc_exp_month'),
                        'exp_year' => $request->get('cc_exp_year'),
                        'cvc' => $request->get('cc_cvv'),
                    ],
                ]);

                if (!isset($token['id'])) {
                    echo 'Token Not generated for stripe payment';
                    exit();
                }

                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'USD',
                    'amount' => $input['domain_price'],
                    'description' => 'Pay for Domain called ' . $input['domain_name'],
                ]);

                if ($charge['status'] == 'succeeded') {

                   
                    $domain_name = $input['domain_name'];
                    $html = '';
                    $html1 = '';
                    $TEST_MODE = false;

                    $connection_options = [
                        'live' => [
                            'api_host_port' => 'https://rr-n1-tor.opensrs.net:55443',
                            'api_key' => '1fec1afd0eadcd5a685f48e212301a5cbc9bd6d0fa8d6ebb36f805e5554916e2b2b7d24d7d898bf20f0d5e1a793e00907bb9314450e21617',
                            'reseller_username' => 'Sheppypeppy'
                        ],
                        'test' => [
                            'api_host_port' => 'https://horizon.opensrs.net:55443',
                            'api_key' => '80478fe27b2f9f755884a6bf9d8f06511cd77a90dc9a935f1c9894336aa2cbf3815088c6e31ddcc2a625acbe037996ddde70f1114e735fce',
                            'reseller_username' => 'Sheppypeppy'
                        ]
                    ];

                    if ($TEST_MODE) {
                        $connection_details = $connection_options['test'];
                    } else {
                        $connection_details = $connection_options['live'];
                    }

                    $xml = '<?xml version="1.0" encoding="UTF-8" standalone="no" ?>
<!DOCTYPE OPS_envelope SYSTEM "ops.dtd">
<OPS_envelope>
 <header>
  <version>0.9</version>
  </header>
 <body>
  <data_block>
   <dt_assoc>
    <item key="protocol">XCP</item>
    <item key="object">DOMAIN</item>
    <item key="action">SW_REGISTER</item>
    <item key="attributes">
     <dt_assoc>
      <item key="f_parkp">Y</item>
      <item key="affiliate_id"></item>
      <item key="auto_renew"></item>
      <item key="comments">Sample comment</item>
      <item key="domain">' . $domain_name . '</item>
      <item key="reg_type">new</item>
      <item key="reg_username">' . $user['last_name'] . $user['first_name'] . '</item> 
      <item key="reg_password">' . $password_generatetd = $this->random_password() . '</item>
      <item key="f_whois_privacy">1</item>
      <item key="period">1</item>
      <item key="link_domains">0</item>
      <item key="custom_nameservers">1</item>
      <item key="f_lock_domain">1</item>
      <item key="reg_domain"></item>
      <item key="contact_set">
       <dt_assoc>
        <item key="admin">
         <dt_assoc>
          <item key="country">US</item>
          <item key="address3">Admin</item>';
                    if ($user['first_name'] <> '') {
                        $xml .= '<item key="org_name">' . $user['first_name'] . '</item>';
                    } else {
                        $xml .= '<item key="org_name">Chris</item>';
                    }

                    if ($user['phone'] <> '') {
                        $xml .= '<item key="phone">' . $user['phone'] . '</item>';
                    } else {
                        $xml .= '<item key="phone">07738016665</item>';
                    }

                    if ($user['address'] <> '') {
                        $xml .= '<item key="address2">' . $user['address'] . '</item>';
                    } else {
                        $xml .= '<item key="address2">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
                    }

                    if ($user['last_name'] <> '') {
                        $xml .= '<item key="last_name">' . $user['last_name'] . '</item>';
                    } else {
                        $xml .= '<item key="last_name">Niebel</item>';
                    }

                    if ($user['email'] <> '') {
                        $xml .= '<item key="email">' . $user['email'] . '</item>';
                    } else {
                        $xml .= '<item key="email">chrisniebel@hotmail.com</item>';
                    }

                    if ($user['city'] <> '') {
                        $xml .= '<item key="city">' . $user['city'] . '</item>';
                    } else {
                        $xml .= '<item key="city">Viena</item>';
                    }

                    if (!true) {
                        $xml .= '<item key="postal_code">' . $user['zipcode'] . '</item>';
                    } else {
                        $xml .= '<item key="postal_code">54000</item>';
                    }

                    if ($user['fax'] <> '') {
                        $xml .= '<item key="fax">' . $user['fax'] . '</item>';
                    } else {
                        $xml .= '<item key="fax">07738016665</item>';
                    }

                    if ($user['address'] <> '') {
                        $xml .= '<item key="address1">' . $user['address'] . '</item>';
                    } else {
                        $xml .= '<item key="address1">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
                    }

                    if ($user['first_name'] <> '') {
                        $xml .= '<item key="first_name">' . $user['first_name'] . '</item>';
                    } else {
                        $xml .= '<item key="first_name">Chris</item>';
                    }
                    $xml .= '<item key="state">CA</item>
         </dt_assoc>
        </item>
        <item key="owner">
         <dt_assoc>
          <item key="country">US</item>
          <item key="address3">Owner</item>';
                    if ($user['first_name'] <> '') {
                        $xml .= '<item key="org_name">' . $user['first_name'] . '</item>';
                    } else {
                        $xml .= '<item key="org_name">Chris</item>';
                    }

                    if ($user['phone'] <> '') {
                        $xml .= '<item key="phone">' . $user['phone'] . '</item>';
                    } else {
                        $xml .= '<item key="phone">07738016665</item>';
                    }

                    if ($user['address'] <> '') {
                        $xml .= '<item key="address2">' . $user['address'] . '</item>';
                    } else {
                        $xml .= '<item key="address2">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
                    }

                    if ($user['last_name'] <> '') {
                        $xml .= '<item key="last_name">' . $user['last_name'] . '</item>';
                    } else {
                        $xml .= '<item key="last_name">Niebel</item>';
                    }

                    if ($user['email'] <> '') {
                        $xml .= '<item key="email">' . $user['email'] . '</item>';
                    } else {
                        $xml .= '<item key="email">chrisniebel@hotmail.com</item>';
                    }

                    if ($user['city'] <> '') {
                        $xml .= '<item key="city">' . $user['city'] . '</item>';
                    } else {
                        $xml .= '<item key="city">Viena</item>';
                    }

                    if (!true) {
                        $xml .= '<item key="postal_code">' . $user['zipcode'] . '</item>';
                    } else {
                        $xml .= '<item key="postal_code">54000</item>';
                    }

                    if ($user['fax'] <> '') {
                        $xml .= '<item key="fax">' . $user['fax'] . '</item>';
                    } else {
                        $xml .= '<item key="fax">07738016665</item>';
                    }

                    if ($user['address'] <> '') {
                        $xml .= '<item key="address1">' . $user['address'] . '</item>';
                    } else {
                        $xml .= '<item key="address1">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
                    }

                    if ($user['first_name'] <> '') {
                        $xml .= '<item key="first_name">' . $user['first_name'] . '</item>';
                    } else {
                        $xml .= '<item key="first_name">Chris</item>';
                    }
                    $xml .= '<item key="state">CA</item>
         </dt_assoc>
        </item>
        <item key="billing">
         <dt_assoc>
          <item key="country">US</item>
          <item key="address3">Billing</item>';
                    if ($user['first_name'] <> '') {
                        $xml .= '<item key="org_name">' . $user['first_name'] . '</item>';
                    } else {
                        $xml .= '<item key="org_name">Chris</item>';
                    }

                    if ($user['phone'] <> '') {
                        $xml .= '<item key="phone">' . $user['phone'] . '</item>';
                    } else {
                        $xml .= '<item key="phone">07738016665</item>';
                    }

                    if ($user['address'] <> '') {
                        $xml .= '<item key="address2">' . $user['address'] . '</item>';
                    } else {
                        $xml .= '<item key="address2">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
                    }

                    if ($user['last_name'] <> '') {
                        $xml .= '<item key="last_name">' . $user['last_name'] . '</item>';
                    } else {
                        $xml .= '<item key="last_name">Niebel</item>';
                    }

                    if ($user['email'] <> '') {
                        $xml .= '<item key="email">' . $user['email'] . '</item>';
                    } else {
                        $xml .= '<item key="email">chrisniebel@hotmail.com</item>';
                    }

                    if ($user['city'] <> '') {
                        $xml .= '<item key="city">' . $user['city'] . '</item>';
                    } else {
                        $xml .= '<item key="city">Viena</item>';
                    }

                    if (!true) {
                        $xml .= '<item key="postal_code">' . $user['zipcode'] . '</item>';
                    } else {
                        $xml .= '<item key="postal_code">54000</item>';
                    }

                    if ($user['fax'] <> '') {
                        $xml .= '<item key="fax">' . $user['fax'] . '</item>';
                    } else {
                        $xml .= '<item key="fax">07738016665</item>';
                    }

                    if ($user['address'] <> '') {
                        $xml .= '<item key="address1">' . $user['address'] . '</item>';
                    } else {
                        $xml .= '<item key="address1">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
                    }

                    if ($user['first_name'] <> '') {
                        $xml .= '<item key="first_name">' . $user['first_name'] . '</item>';
                    } else {
                        $xml .= '<item key="first_name">Niebel</item>';
                    }
                    $xml .= '<item key="state">CA</item>
         </dt_assoc>
        </item>
       </dt_assoc>
      </item>
      <item key="nameserver_list">
       <dt_array>
        <item key="0">
         <dt_assoc>
          <item key="name">ns1.systemdns.com</item>
          <item key="sortorder">1</item>
         </dt_assoc>
        </item>
        <item key="1">
         <dt_assoc>
          <item key="name">ns2.systemdns.com</item>
          <item key="sortorder">2</item>
         </dt_assoc>
        </item>
       </dt_array>
      </item>
      <item key="encoding_type"></item>
      <item key="custom_tech_contact">0</item>
     </dt_assoc>
    </item>
    <item key="registrant_ip">' . get_client_ip() . '</item>
   </dt_assoc>
  </data_block>
 </body>
</OPS_envelope>';

                    $data_c = [
                        'Content-Type:text/xml',
                        'X-Username:' . $connection_details['reseller_username'],
                        'X-Signature:' . md5(md5($xml . $connection_details['api_key']) . $connection_details['api_key']),
                    ];

                    $ch = curl_init($connection_details['api_host_port']);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $data_c);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

                    $response = curl_exec($ch);
                    
                    $err = curl_error($ch);
                    if ($err) {
                        $html .= '<ul class="list-group">';
                        $html .= '<li class="list-group-item list-group-item-warning" > Please try with authentic information</li>';
                        $html .= '</ul>';
                    } else {


                        $data_r = $response;
                        $DOMdocument = new \DOMDocument();
                        $DOMdocument->loadXML($data_r);
                        $xpath = new \DOMXPath($DOMdocument);
                        $itemElements = $xpath->query('//item'); //obtain all items tag in the DOM
                        $argsArray = array();
                        foreach ($itemElements as $itemTag) {
                            $key = $itemTag->getAttribute('key'); //obtain the key
                            $value = $itemTag->nodeValue; //obtain value
                            $argsArray[$key] = $value;
                        }
                        if ($argsArray['is_success'] == 1) {


                            $html1 .= '<ul class="list-group">';
                            $html1 .= '<li class="list-group-item list-group-item-success" >Response : ' . $argsArray['response_text'] . '</li>';
                            $html1 .= '<li class="list-group-item list-group-item-success" >Admin Email : ' . $argsArray['admin_email'] . '</li>';
                            $html1 .= '<li class="list-group-item list-group-item-success" >OrderId: : ' . $argsArray['id'] . '</li>';
                            $html1 .= '<li class="list-group-item list-group-item-success" > <b> On Super admin approval your store will be redireced to your (custom domain address) </b></li>';

                            $html1 .= '</ul>';

                            Domains::create($input1);
                            $template = \DB::table('email_templates')->where('template_type', 1)->where('email_type', 'domain_registration')->first();
                            if ($template != '') {

                                $subject = $template->subject;
                                $link = url("login");
                                $to_replace = ['[NAME]', '[EMAIL]', '[DOMAIN]', '[PHONE]'];
                                $with_replace = [$user['first_name'] . " " . $user['last_name'], $user['email'], $user['PHONE']];
                                $html_body = '';
                                $html_body .= str_replace($to_replace, $with_replace, $template->content);

                                $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
                            }
                            $to = $user['email'];
                            $returnpath = "";
                            $cc = "";
                            $smtp = \DB::table("smtp_settings")->where("user_id", 1)->select('from_name', 'from_email')->first();

                            $dd = DbModel::SendHTMLMail($to, $subject, $mailContents, $smtp->from_email, $smtp->from_name, $returnpath, $cc);
                            $xml = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<!DOCTYPE OPS_envelope SYSTEM "ops.dtd">
<OPS_envelope>
    <header>
        <version>0.9</version>
    </header>
    <body>
        <data_block>
            <dt_assoc>
                <item key="protocol">XCP</item>
                <item key="action">create_dns_zone</item>
                <item key="object">domain</item>
                <item key="attributes">
                    <dt_assoc>
                        <item key="domain">' . $domain_name . '</item>
                    </dt_assoc>
                </item>
            </dt_assoc>
        </data_block>
    </body>
</OPS_envelope>';
                            $data_c = [
                                'Content-Type:text/xml',
                                'X-Username:' . $connection_details['reseller_username'],
                                'X-Signature:' . md5(md5($xml . $connection_details['api_key']) . $connection_details['api_key']),
                            ];

                            $ch = curl_init($connection_details['api_host_port']);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $data_c);
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

                            $response = curl_exec($ch);

                            $err = curl_error($ch);

                            $xml = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<!DOCTYPE OPS_envelope SYSTEM "ops.dtd">
<OPS_envelope>
    <header>
        <version>0.9</version>
    </header>
    <body>
        <data_block>
            <dt_assoc>
                <item key="protocol">XCP</item>
                <item key="action">SET_DNS_ZONE</item>
                <item key="object">DOMAIN</item>
                <item key="attributes">
                    <dt_assoc>
                        <item key="domain">' . $domain_name . '</item>
                        <item key="records">
                            <dt_assoc>
                                <item key="A">
                                    <dt_array>
                                        <item key="0">
                                            <dt_assoc>
                                                <item key="subdomain"></item>
                                                <item key="ip_address">34.214.89.181</item>
                                            </dt_assoc>
                                        </item>
                                        <item key="1">
                                            <dt_assoc>
                                                <item key="subdomain">*</item>
                                                <item key="ip_address">34.214.89.181</item>
                                            </dt_assoc>
                                        </item>
                                        <item key="2">
                                            <dt_assoc>
                                                <item key="subdomain">www</item>
                                                <item key="ip_address">34.214.89.181</item>
                                            </dt_assoc>
                                        </item>
                                    </dt_array>
                                </item>
                            </dt_assoc>
                        </item>
                    </dt_assoc>
                </item>
            </dt_assoc>
        </data_block>
    </body>
</OPS_envelope>';

                            $data_c = [
                                'Content-Type:text/xml',
                                'X-Username:' . $connection_details['reseller_username'],
                                'X-Signature:' . md5(md5($xml . $connection_details['api_key']) . $connection_details['api_key']),
                            ];

                            $ch = curl_init($connection_details['api_host_port']);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $data_c);
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

                            $response = curl_exec($ch);
                            
                            $err = curl_error($ch);

                            $data_r = $response;
                            $DOMdocument = new \DOMDocument();
                            $DOMdocument->loadXML($data_r);
                            $xpath = new \DOMXPath($DOMdocument);
                            $itemElements = $xpath->query('//item'); //obtain all items tag in the DOM
                            $argsArray = array();
                            foreach ($itemElements as $itemTag) {
                                $key = $itemTag->getAttribute('key'); //obtain the key
                                $value = $itemTag->nodeValue; //obtain value
                                $argsArray[$key] = $value;
                            }
                            if ($argsArray['is_success'] == 1) {


                                $html .= '<ul class="list-group">';
                                $html .= '<li class="list-group-item list-group-item-success" >Response : ' . @$argsArray['response_text'] . '</li>';
                                $html .= '<li class="list-group-item list-group-item-success" >Admin Email : ' . @$argsArray['admin_email'] . '</li>';
                                $html .= '<li class="list-group-item list-group-item-success" >OrderId: : ' . @$argsArray['id'] . '</li>';
                                $html .= '<li class="list-group-item list-group-item-success" > <b> On Super admin approval your store will be redireced to your (custom domain address) </b></li>';

                                $html .= '</ul>';
                            } else {

                                $html .= '<ul class="list-group">';
                                $html .= '<li class="list-group-item list-group-item-warning" > Response: ' . @$argsArray['response_text'] . '</li>';
                                $html .= '</ul>';
                            }
                        }
                        if ($argsArray['is_success'] == 0) {


                            $html .= '<ul class="list-group">';
                            $html .= '<li class="list-group-item list-group-item-warning" > Response: ' . $argsArray['response_text'] . '</li>';
                            $html .= '</ul>';
                        }
                    }
                    echo $html;
                    exit();
                } else {
                    \Session::put('error', 'Domain couldn\'t be purchased ');
                    echo 'Domain couldn\'t be purchased ';
                    exit();
                }
            } catch (Exception $e) {
                echo $e->getMessage();
                exit();
            } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
                echo $e->getMessage();
                exit();
            } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                echo $e->getMessage();
                exit();
            }
        }
    }

    /////////////////////////// paypal integration

    public function paywithpaypal(Request $request) {
        $baseUrl = \URL::to('/');
//        echo $baseUrl . '/admin/domains/getDone';
//echo $baseUrl . '/admin/domains/getCancel';
//die();
        $input = $request->all();
        $domain_name = $input['domain'];
        $domain_price = $input['amount'];
        $user = Auth::user();

        $input1 = array(
            'name' => $domain_name,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'renew_date' => date('Y-m-d', strtotime(date("Y-m-d", time()) . " + 365 day")),
            'price' => $domain_price,
            'payment_gateway' => 'Paypal',
            'user_id' => $user->id
        );

        \Session::put('paypal_domain_values', $input1);
        try {
            $paypal = new \Netshell\Paypal\Paypal;
            $payer = $paypal->Payer();
            $payer->setPaymentMethod('paypal');

            $amount = $paypal->Amount();
            $amount->setCurrency('USD');
            $amount->setTotal($domain_price); // This is the simple way,
            // you can alternatively describe everything in the order separately;
            // Reference the PayPal PHP REST SDK for details.

            $transaction = $paypal->Transaction();
            $transaction->setAmount($amount);
            $transaction->setDescription($domain_name . ' will be purchased on ControlPanda for $' . $domain_price);
            $baseUrl = \URL::to('/');
            $redirectUrls = $paypal->RedirectUrls();
            $redirectUrls->setReturnUrl($baseUrl . '/admin/domains/getDone');
            $redirectUrls->setCancelUrl($baseUrl . '/admin/domains/getCancel');

            $payment = $paypal->Payment();
            $payment->setIntent('sale');
            $payment->setPayer($payer);
            $payment->setRedirectUrls($redirectUrls);
            $payment->setTransactions(array($transaction));

            $response = $payment->create($this->_apiContext);
            $redirectUrl = $response->links[1]->href;
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode(); // Prints the Error Code
            echo $ex->getData();
            die($ex);
        } catch (Exception $ex) {
            die($ex);
        }
        

        return Redirect::to($redirectUrl);
    }

    public function getDone(Request $request) {

        $paypal = new \Netshell\Paypal\Paypal;
        $user = Auth::user();
        $id = $request->get('paymentId');
        $token = $request->get('token');
        $payer_id = $request->get('PayerID');


        $payment = $paypal->getById($id, $this->_apiContext);

        $paymentExecution = $paypal->PaymentExecution();

        $paymentExecution->setPayerId($payer_id);
        $executePayment = $payment->execute($paymentExecution, $this->_apiContext);

        // Clear the shopping cart, write to database, send notifications, etc.

        $sessiondata = \Session::get('paypal_domain_values');


        $domain_name = $sessiondata['name'];
        $html = '';
// Note: Requires cURL library

$user['first_name'] = preg_replace('/[^A-Za-z0-9]/i', '', $user['first_name']);
$user['last_name'] = preg_replace('/[^A-Za-z0-9]/i', '', $user['last_name']);
                    
                    $html = '';
                    $html1 = '';
                    $TEST_MODE = false;

                    $connection_options = [
                        'live' => [
                            'api_host_port' => 'https://rr-n1-tor.opensrs.net:55443',
                            'api_key' => '1fec1afd0eadcd5a685f48e212301a5cbc9bd6d0fa8d6ebb36f805e5554916e2b2b7d24d7d898bf20f0d5e1a793e00907bb9314450e21617',
                            'reseller_username' => 'Sheppypeppy'
                        ],
                        'test' => [
                            'api_host_port' => 'https://horizon.opensrs.net:55443',
                            'api_key' => '80478fe27b2f9f755884a6bf9d8f06511cd77a90dc9a935f1c9894336aa2cbf3815088c6e31ddcc2a625acbe037996ddde70f1114e735fce',
                            'reseller_username' => 'Sheppypeppy'
                        ]
                    ];

                    if ($TEST_MODE) {
                        $connection_details = $connection_options['test'];
                    } else {
                        $connection_details = $connection_options['live'];
                    }

                    $xml = '<?xml version="1.0" encoding="UTF-8" standalone="no" ?>
<!DOCTYPE OPS_envelope SYSTEM "ops.dtd">
<OPS_envelope>
 <header>
  <version>0.9</version>
  </header>
 <body>
  <data_block>
   <dt_assoc>
    <item key="protocol">XCP</item>
    <item key="object">DOMAIN</item>
    <item key="action">SW_REGISTER</item>
    <item key="attributes">
     <dt_assoc>
      <item key="f_parkp">Y</item>
      <item key="affiliate_id"></item>
      <item key="auto_renew"></item>
      <item key="comments">Sample comment</item>
      <item key="domain">' . $domain_name . '</item>
      <item key="reg_type">new</item>
      <item key="reg_username">' . $user['last_name'] . $user['first_name'] . '</item> 
      <item key="reg_password">' . $password_generatetd = $this->random_password() . '</item>
      <item key="f_whois_privacy">1</item>
      <item key="period">1</item>
      <item key="link_domains">0</item>
      <item key="custom_nameservers">1</item>
      <item key="f_lock_domain">1</item>
      <item key="reg_domain"></item>
      <item key="contact_set">
       <dt_assoc>
        <item key="admin">
         <dt_assoc>
          <item key="country">US</item>
          <item key="address3">Admin</item>';
                    if ($user['first_name'] <> '') {
                        $xml .= '<item key="org_name">' . $user['first_name'] . '</item>';
                    } else {
                        $xml .= '<item key="org_name">Chris</item>';
                    }

                    if ($user['phone'] <> '') {
                        $xml .= '<item key="phone">' . $user['phone'] . '</item>';
                    } else {
                        $xml .= '<item key="phone">07738016665</item>';
                    }

                    if ($user['address'] <> '') {
                        $xml .= '<item key="address2">' . $user['address'] . '</item>';
                    } else {
                        $xml .= '<item key="address2">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
                    }

                    if ($user['last_name'] <> '') {
                        $xml .= '<item key="last_name">' . $user['last_name'] . '</item>';
                    } else {
                        $xml .= '<item key="last_name">Niebel</item>';
                    }

                    if ($user['email'] <> '') {
                        $xml .= '<item key="email">' . $user['email'] . '</item>';
                    } else {
                        $xml .= '<item key="email">chrisniebel@hotmail.com</item>';
                    }

                    if ($user['city'] <> '') {
                        $xml .= '<item key="city">' . $user['city'] . '</item>';
                    } else {
                        $xml .= '<item key="city">Viena</item>';
                    }

                    if (!true) {
                        $xml .= '<item key="postal_code">' . $user['zipcode'] . '</item>';
                    } else {
                        $xml .= '<item key="postal_code">54000</item>';
                    }

                    if ($user['fax'] <> '') {
                        $xml .= '<item key="fax">' . $user['fax'] . '</item>';
                    } else {
                        $xml .= '<item key="fax">07738016665</item>';
                    }

                    if ($user['address'] <> '') {
                        $xml .= '<item key="address1">' . $user['address'] . '</item>';
                    } else {
                        $xml .= '<item key="address1">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
                    }

                    if ($user['first_name'] <> '') {
                        $xml .= '<item key="first_name">' . $user['first_name'] . '</item>';
                    } else {
                        $xml .= '<item key="first_name">Chris</item>';
                    }
                    $xml .= '<item key="state">CA</item>
         </dt_assoc>
        </item>
        <item key="owner">
         <dt_assoc>
          <item key="country">US</item>
          <item key="address3">Owner</item>';
                    if ($user['first_name'] <> '') {
                        $xml .= '<item key="org_name">' . $user['first_name'] . '</item>';
                    } else {
                        $xml .= '<item key="org_name">Chris</item>';
                    }

                    if ($user['phone'] <> '') {
                        $xml .= '<item key="phone">' . $user['phone'] . '</item>';
                    } else {
                        $xml .= '<item key="phone">07738016665</item>';
                    }

                    if ($user['address'] <> '') {
                        $xml .= '<item key="address2">' . $user['address'] . '</item>';
                    } else {
                        $xml .= '<item key="address2">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
                    }

                    if ($user['last_name'] <> '') {
                        $xml .= '<item key="last_name">' . $user['last_name'] . '</item>';
                    } else {
                        $xml .= '<item key="last_name">Niebel</item>';
                    }

                    if ($user['email'] <> '') {
                        $xml .= '<item key="email">' . $user['email'] . '</item>';
                    } else {
                        $xml .= '<item key="email">chrisniebel@hotmail.com</item>';
                    }

                    if ($user['city'] <> '') {
                        $xml .= '<item key="city">' . $user['city'] . '</item>';
                    } else {
                        $xml .= '<item key="city">Viena</item>';
                    }

                    if (!true) {
                        $xml .= '<item key="postal_code">' . $user['zipcode'] . '</item>';
                    } else {
                        $xml .= '<item key="postal_code">54000</item>';
                    }

                    if ($user['fax'] <> '') {
                        $xml .= '<item key="fax">' . $user['fax'] . '</item>';
                    } else {
                        $xml .= '<item key="fax">07738016665</item>';
                    }

                    if ($user['address'] <> '') {
                        $xml .= '<item key="address1">' . $user['address'] . '</item>';
                    } else {
                        $xml .= '<item key="address1">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
                    }

                    if ($user['first_name'] <> '') {
                        $xml .= '<item key="first_name">' . $user['first_name'] . '</item>';
                    } else {
                        $xml .= '<item key="first_name">Chris</item>';
                    }
                    $xml .= '<item key="state">CA</item>
         </dt_assoc>
        </item>
        <item key="billing">
         <dt_assoc>
          <item key="country">US</item>
          <item key="address3">Billing</item>';
                    if ($user['first_name'] <> '') {
                        $xml .= '<item key="org_name">' . $user['first_name'] . '</item>';
                    } else {
                        $xml .= '<item key="org_name">Chris</item>';
                    }

                    if ($user['phone'] <> '') {
                        $xml .= '<item key="phone">' . $user['phone'] . '</item>';
                    } else {
                        $xml .= '<item key="phone">07738016665</item>';
                    }

                    if ($user['address'] <> '') {
                        $xml .= '<item key="address2">' . $user['address'] . '</item>';
                    } else {
                        $xml .= '<item key="address2">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
                    }

                    if ($user['last_name'] <> '') {
                        $xml .= '<item key="last_name">' . $user['last_name'] . '</item>';
                    } else {
                        $xml .= '<item key="last_name">Niebel</item>';
                    }

                    if ($user['email'] <> '') {
                        $xml .= '<item key="email">' . $user['email'] . '</item>';
                    } else {
                        $xml .= '<item key="email">chrisniebel@hotmail.com</item>';
                    }

                    if ($user['city'] <> '') {
                        $xml .= '<item key="city">' . $user['city'] . '</item>';
                    } else {
                        $xml .= '<item key="city">Viena</item>';
                    }

                    if (!true) {
                        $xml .= '<item key="postal_code">' . $user['zipcode'] . '</item>';
                    } else {
                        $xml .= '<item key="postal_code">54000</item>';
                    }

                    if ($user['fax'] <> '') {
                        $xml .= '<item key="fax">' . $user['fax'] . '</item>';
                    } else {
                        $xml .= '<item key="fax">07738016665</item>';
                    }

                    if ($user['address'] <> '') {
                        $xml .= '<item key="address1">' . $user['address'] . '</item>';
                    } else {
                        $xml .= '<item key="address1">Silverlink Train Services, Watford Junction Railway Station, Station Road, WATFORD</item>';
                    }

                    if ($user['first_name'] <> '') {
                        $xml .= '<item key="first_name">' . $user['first_name'] . '</item>';
                    } else {
                        $xml .= '<item key="first_name">Niebel</item>';
                    }
                    $xml .= '<item key="state">CA</item>
         </dt_assoc>
        </item>
       </dt_assoc>
      </item>
      <item key="nameserver_list">
       <dt_array>
        <item key="0">
         <dt_assoc>
          <item key="name">ns1.systemdns.com</item>
          <item key="sortorder">1</item>
         </dt_assoc>
        </item>
        <item key="1">
         <dt_assoc>
          <item key="name">ns2.systemdns.com</item>
          <item key="sortorder">2</item>
         </dt_assoc>
        </item>
       </dt_array>
      </item>
      <item key="encoding_type"></item>
      <item key="custom_tech_contact">0</item>
     </dt_assoc>
    </item>
    <item key="registrant_ip">' . get_client_ip() . '</item>
   </dt_assoc>
  </data_block>
 </body>
</OPS_envelope>';

                    $data_c = [
                        'Content-Type:text/xml',
                        'X-Username:' . $connection_details['reseller_username'],
                        'X-Signature:' . md5(md5($xml . $connection_details['api_key']) . $connection_details['api_key']),
                    ];

                    $ch = curl_init($connection_details['api_host_port']);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $data_c);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

                    $response = curl_exec($ch);
                    
                    
                    
                    $err = curl_error($ch);
                    if ($err) {
                        $html .= '<ul class="list-group">';
                        $html .= '<li class="list-group-item list-group-item-warning" > Please try with authentic information</li>';
                        $html .= '</ul>';
                        Alert::error('Error Message', simplexml_load_string($response))->autoclose(3000);
                        return redirect('admin/domains');
                        
                    } else {


                        $data_r = $response;
                        $DOMdocument = new \DOMDocument();
                        $DOMdocument->loadXML($data_r);
                        $xpath = new \DOMXPath($DOMdocument);
                        $itemElements = $xpath->query('//item'); //obtain all items tag in the DOM
                        $argsArray = array();
                        foreach ($itemElements as $itemTag) {
                            $key = $itemTag->getAttribute('key'); //obtain the key
                            $value = $itemTag->nodeValue; //obtain value
                            $argsArray[$key] = $value;
                        }
                        if ($argsArray['is_success'] == 1) {


                            $html1 .= '<ul class="list-group">';
                            $html1 .= '<li class="list-group-item list-group-item-success" >Response : ' . $argsArray['response_text'] . '</li>';
                            $html1 .= '<li class="list-group-item list-group-item-success" >Admin Email : ' . $argsArray['admin_email'] . '</li>';
                            $html1 .= '<li class="list-group-item list-group-item-success" >OrderId: : ' . $argsArray['id'] . '</li>';
                            $html1 .= '<li class="list-group-item list-group-item-success" > <b> On Super admin approval your store will be redireced to your (custom domain address) </b></li>';

                            $html1 .= '</ul>';

                            Domains::create($sessiondata);
                            $template = \DB::table('email_templates')->where('template_type', 1)->where('email_type', 'domain_registration')->first();
                            if ($template != '') {

                                $subject = $template->subject;
                                $link = url("login");
                                $to_replace = ['[NAME]', '[EMAIL]', '[DOMAIN]', '[PHONE]'];
                                $with_replace = [$user['first_name'] . " " . $user['last_name'], $user['email'], $user['PHONE']];
                                $html_body = '';
                                $html_body .= str_replace($to_replace, $with_replace, $template->content);

                                $mailContents = View::make('frontend.email_temp.template', ["data" => $html_body])->render();
                            }
                            $to = $user['email'];
                            $returnpath = "";
                            $cc = "";
                            $smtp = \DB::table("smtp_settings")->where("user_id", 1)->select('from_name', 'from_email')->first();

                            $dd = DbModel::SendHTMLMail($to, $subject, $mailContents, $smtp->from_email, $smtp->from_name, $returnpath, $cc);
                            $xml = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<!DOCTYPE OPS_envelope SYSTEM "ops.dtd">
<OPS_envelope>
    <header>
        <version>0.9</version>
    </header>
    <body>
        <data_block>
            <dt_assoc>
                <item key="protocol">XCP</item>
                <item key="action">create_dns_zone</item>
                <item key="object">domain</item>
                <item key="attributes">
                    <dt_assoc>
                        <item key="domain">' . $domain_name . '</item>
                    </dt_assoc>
                </item>
            </dt_assoc>
        </data_block>
    </body>
</OPS_envelope>';
                            $data_c = [
                                'Content-Type:text/xml',
                                'X-Username:' . $connection_details['reseller_username'],
                                'X-Signature:' . md5(md5($xml . $connection_details['api_key']) . $connection_details['api_key']),
                            ];

                            $ch = curl_init($connection_details['api_host_port']);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $data_c);
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

                            $response = curl_exec($ch);

                            $err = curl_error($ch);
                            if($err){
                            Alert::error('Error Message', simplexml_load_string($response))->autoclose(3000);
                        return redirect('admin/domains');    
                            }

                            $xml = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<!DOCTYPE OPS_envelope SYSTEM "ops.dtd">
<OPS_envelope>
    <header>
        <version>0.9</version>
    </header>
    <body>
        <data_block>
            <dt_assoc>
                <item key="protocol">XCP</item>
                <item key="action">SET_DNS_ZONE</item>
                <item key="object">DOMAIN</item>
                <item key="attributes">
                    <dt_assoc>
                        <item key="domain">' . $domain_name . '</item>
                        <item key="records">
                            <dt_assoc>
                                <item key="A">
                                    <dt_array>
                                        <item key="0">
                                            <dt_assoc>
                                                <item key="subdomain"></item>
                                                <item key="ip_address">34.214.89.181</item>
                                            </dt_assoc>
                                        </item>
                                        <item key="1">
                                            <dt_assoc>
                                                <item key="subdomain">*</item>
                                                <item key="ip_address">34.214.89.181</item>
                                            </dt_assoc>
                                        </item>
                                        <item key="2">
                                            <dt_assoc>
                                                <item key="subdomain">www</item>
                                                <item key="ip_address">34.214.89.181</item>
                                            </dt_assoc>
                                        </item>
                                    </dt_array>
                                </item>
                            </dt_assoc>
                        </item>
                    </dt_assoc>
                </item>
            </dt_assoc>
        </data_block>
    </body>
</OPS_envelope>';

                            $data_c = [
                                'Content-Type:text/xml',
                                'X-Username:' . $connection_details['reseller_username'],
                                'X-Signature:' . md5(md5($xml . $connection_details['api_key']) . $connection_details['api_key']),
                            ];

                            $ch = curl_init($connection_details['api_host_port']);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $data_c);
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

                            $response = curl_exec($ch);

                            $err = curl_error($ch);
                           if($err){
                            Alert::error('Error Message', simplexml_load_string($response))->autoclose(3000);
                        return redirect('admin/domains');    
                            }

                            $data_r = $response;
                            $DOMdocument = new \DOMDocument();
                            $DOMdocument->loadXML($data_r);
                            $xpath = new \DOMXPath($DOMdocument);
                            $itemElements = $xpath->query('//item'); //obtain all items tag in the DOM
                            $argsArray = array();
                            foreach ($itemElements as $itemTag) {
                                $key = $itemTag->getAttribute('key'); //obtain the key
                                $value = $itemTag->nodeValue; //obtain value
                                $argsArray[$key] = $value;
                            }
                            if ($argsArray['is_success'] == 1) {


                                $html .= '<ul class="list-group">';
                                $html .= '<li class="list-group-item list-group-item-success" >Response : ' . @$argsArray['response_text'] . '</li>';
                                $html .= '<li class="list-group-item list-group-item-success" >Admin Email : ' . @$argsArray['admin_email'] . '</li>';
                                $html .= '<li class="list-group-item list-group-item-success" >OrderId: : ' . @$argsArray['id'] . '</li>';
                                $html .= '<li class="list-group-item list-group-item-success" > <b> On Super admin approval your store will be redireced to your (custom domain address) </b></li>';

                                $html .= '</ul>';
                            } else {

                                $html .= '<ul class="list-group">';
                                $html .= '<li class="list-group-item list-group-item-warning" > Response: ' . @$argsArray['response_text'] . '</li>';
                                $html .= '</ul>';
                            }
                        }
                        if ($argsArray['is_success'] == 0) {


                            $html .= '<ul class="list-group">';
                            $html .= '<li class="list-group-item list-group-item-warning" > Response: ' . $argsArray['response_text'] . '</li>';
                            $html .= '</ul>';
                        }
                    }
                    echo $html;
                    //exit();



        Alert::success('Success Message', 'Domain is successfully purchased')->autoclose(3000);
        //exit();
        // Thank the user for the purchase
        return redirect('admin/domains');
    }

    public function getCancel() {
        $html = '';
        $html .= '<li class="list-group-item list-group-item-warning" > Response: domain not purchased </li>';

        Alert::error('Error Message', $html)->autoclose(3000);
        // Curse and humiliate the user for cancelling this most sacred payment (yours)
        return redirect('admin/domains');
    }

    /////////////////////////// paypal integration


    public function opensrs_test() {

        $TEST_MODE = false;
        $connection_options = [
            'live' => [
                'api_host_port' => 'https://rr-n1-tor.opensrs.net:55443',
                'api_key' => '1fec1afd0eadcd5a685f48e212301a5cbc9bd6d0fa8d6ebb36f805e5554916e2b2b7d24d7d898bf20f0d5e1a793e00907bb9314450e21617',
                'reseller_username' => 'Sheppypeppy'
            ],
            'test' => [
                'api_host_port' => 'https://horizon.opensrs.net:55443',
                'api_key' => '80478fe27b2f9f755884a6bf9d8f06511cd77a90dc9a935f1c9894336aa2cbf3815088c6e31ddcc2a625acbe037996ddde70f1114e735fce',
                'reseller_username' => 'Sheppypeppy'
            ]
        ];

        if ($TEST_MODE) {
            $connection_details = $connection_options['test'];
        } else {
            $connection_details = $connection_options['live'];
        }
        $xml = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<!DOCTYPE OPS_envelope SYSTEM "ops.dtd">
<OPS_envelope>
    <header>
        <version>0.9</version>
    </header>
    <body>
        <data_block>
            <dt_assoc>
                <item key="protocol">XCP</item>
                <item key="action">create_dns_zone</item>
                <item key="object">domain</item>
                <item key="attributes">
                    <dt_assoc>
                        <item key="domain">controlpanda.net</item>
                    </dt_assoc>
                </item>
            </dt_assoc>
        </data_block>
    </body>
</OPS_envelope>';

        $data_c = [
            'Content-Type:text/xml',
            'X-Username:' . $connection_details['reseller_username'],
            'X-Signature:' . md5(md5($xml . $connection_details['api_key']) . $connection_details['api_key']),
        ];

        $ch = curl_init($connection_details['api_host_port']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $data_c);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

        $response = curl_exec($ch);
        echo 'First Response : ' . $response;
        echo '<br>-----------------------';

        $xml = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<!DOCTYPE OPS_envelope SYSTEM "ops.dtd">
<OPS_envelope>
    <header>
        <version>0.9</version>
    </header>
    <body>
        <data_block>
            <dt_assoc>
                <item key="protocol">XCP</item>
                <item key="action">SET_DNS_ZONE</item>
                <item key="object">DOMAIN</item>
                <item key="attributes">
                    <dt_assoc>
                        <item key="domain">controlpanda.net</item>
                        <item key="records">
                            <dt_assoc>
                                <item key="A">
                                    <dt_array>
                                        <item key="0">
                                            <dt_assoc>
                                                <item key="subdomain"></item>
                                                <item key="ip_address">34.214.89.181</item>
                                            </dt_assoc>
                                        </item>
                                        <item key="1">
                                            <dt_assoc>
                                                <item key="subdomain">*</item>
                                                <item key="ip_address">34.214.89.181</item>
                                            </dt_assoc>
                                        </item>
                                        <item key="2">
                                            <dt_assoc>
                                                <item key="subdomain">www</item>
                                                <item key="ip_address">34.214.89.181</item>
                                            </dt_assoc>
                                        </item>
                                    </dt_array>
                                </item>
                            </dt_assoc>
                        </item>
                    </dt_assoc>
                </item>
            </dt_assoc>
        </data_block>
    </body>
</OPS_envelope>';

        $data_c = [
            'Content-Type:text/xml',
            'X-Username:' . $connection_details['reseller_username'],
            'X-Signature:' . md5(md5($xml . $connection_details['api_key']) . $connection_details['api_key']),
        ];

        $ch = curl_init($connection_details['api_host_port']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $data_c);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

        $response = curl_exec($ch);

        echo 'Second Response : ' . $response;
        exit;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        $input['renew_date'] = date('Y-m-d', strtotime($input['renew_date']));
        Domains::create($input);
        return redirect('admin/domains');
    }

    public function get_pages(Request $request) {
        $input = $request->all();
        $pages = \DB::table('pages')->where('pageable_id', $input['project_id'])->where('pageable_type', 'Project')->get();
        foreach ($pages as $page) {
            echo '<option value="' . $page->id . '">' . $page->name . '</option>';
        }
    }

}
