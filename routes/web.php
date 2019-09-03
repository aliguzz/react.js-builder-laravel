<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */


Route::get('/logout', 'Auth\LoginController@logout');
Route::get('my-profile', 'Admin\UsersController@my_profile');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

    Route::get('upgrade-account', 'Admin\DashboardController@upgrade_account');
    Route::get('upgrade-account/payment-method/{id}', 'Admin\DashboardController@payment_method');
    Route::post('upgrade-account/checkout', 'Admin\DashboardController@checkout');
    Route::any('upgrade-account/thank-you', 'Admin\DashboardController@thankyou');
    Route::post('update_membership', 'Admin\DashboardController@update_membership');

    Route::get('broadcast_followup', 'Admin\BroadcastController@broadcast_followup');
    Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::get('dashboard-login', 'Admin\DashboardController@index')->name('dashboard');
    Route::post('get_project_form', 'Admin\PandaPagesController@get_project_form');
    Route::post('add_seo_meta_data', 'Admin\PandaPagesController@add_seo_meta_data');
    Route::post('add_tracking_codes', 'Admin\PandaPagesController@add_tracking_codes');
    Route::post('add_integrations', 'Admin\PandaPagesController@add_integrations');
    Route::post('remove_integrations', 'Admin\PandaPagesController@remove_integrations');
    Route::post('get_themes', 'Admin\PandaPagesController@get_themes');
    Route::post('build_site', 'Admin\PandaPagesController@build_site');
    Route::post('get_industry_categories', 'Admin\PandaPagesController@get_industry_categories');
    Route::post('get_industry_templates', 'Admin\PandaPagesController@get_industry_templates');
    
    Route::post('get_seo_meta_data', 'Admin\PandaPagesController@get_seo_meta_data');
    Route::post('get_tracking_codes', 'Admin\PandaPagesController@get_tracking_codes');
    Route::post('get_integrations', 'Admin\PandaPagesController@get_integrations');
    Route::get('get_email_lists', 'Admin\PandaPagesController@get_email_lists');
    Route::post('premium-build', 'Admin\PandaPagesController@premium_build_requests');
    Route::get('premium-build-requests', 'Admin\SubscribersController@premium_builds');
    Route::get('premium-build-requests/{id}', 'Admin\SubscribersController@premium_builds_view');
    Route::delete('premium-build-requests/{id}', 'Admin\SubscribersController@premium_builds_delete');
    Route::post('premium/change-statue', 'Admin\SubscribersController@premium_builds_status');
    
    Route::post('panda-pages/panda-seo-satus', 'Admin\PandaPagesController@panda_seo_satus');

    Route::get('create-project/{id}/{id2}', 'Admin\PandaPagesController@create_new_project');
    Route::post('get_temp_cat', 'Admin\PandaPagesController@get_temp_cat');
    Route::get('panda-pages/premium', 'Admin\PandaPagesController@index');
    // 7 pada pages new pages
    Route::post('panda-pages/{id}/contact-export', 'Admin\PandaPagesController@contacts_export');
    Route::post('panda-pages/{id}/contact-ajax', 'Admin\PandaPagesController@contacts_ajax');
    Route::post('contact-export', 'Admin\PandaMailController@contacts_export');
    Route::post('contact-ajax', 'Admin\PandaMailController@contacts_ajax');
    Route::any('panda-pages/{id}/stats_ajax', 'Admin\PandaPagesController@stats_ajax');
    Route::get('panda-pages/{id}/stats', 'Admin\PandaPagesController@stats');
    Route::get('panda-pages/{id}/promote-seo', 'Admin\PandaPagesController@promote_seo');
    Route::post('panda-pages/promote-seo-submit', 'Admin\PandaPagesController@promote_seo_submit');
    // new page of middle page
    Route::get('view-template/{p_name}/{ind_id}', 'Admin\PandaPagesController@PreviewTemplate');
    Route::get('panda-pages/{id}/stats', 'Admin\PandaPagesController@stats');
    Route::get('panda-pages/{id}/contacts', 'Admin\PandaPagesController@contacts');
    Route::get('panda-pages/{id}/settings', 'Admin\PandaPagesController@settings');
    Route::post('panda-pages/save-settings', 'Admin\PandaPagesController@save_settings');
    Route::post('panda-pages/save-trackingcode', 'Admin\PandaPagesController@save_trackingcode');
    Route::get('panda-pages/{id}/checklist', 'Admin\PandaPagesController@checklist');
    Route::get('panda-pages/{id}/overview', 'Admin\PandaPagesController@overview');
    Route::get('panda-pages/{id}/publishing', 'Admin\PandaPagesController@publishing');
    Route::get('panda-pages/{id}/automation', 'Admin\PandaPagesController@automation');
    Route::get('change-contacting-status/{proj_id}/{name}/{action}', 'Admin\PandaPagesController@change_contacting_status');
    Route::post('add-action-leads', 'Admin\PandaPagesController@add_action_leads');

    Route::get('panda-pages/choose-templates/{id}', 'Admin\PandaPagesController@ChooseTemplate');
    Route::resource('panda-pages', 'Admin\PandaPagesController');
    Route::resource('users', 'Admin\UsersController');
    //resource  sms and flow and dail and
    Route::resource('sms-packages', 'Admin\PandaSmsPackagesController');
    Route::resource('dial-packages', 'Admin\PandaDialPackagesController');
    Route::resource('flow-packages', 'Admin\PandaFlowPackagesController');
    Route::resource('crm-packages', 'Admin\PandaCrmPackagesController');

    Route::resource('packages', 'Admin\PackagesController');
    Route::get('account-details', 'Admin\UsersController@account_details');
    Route::get('account-details/{id}', 'Admin\UsersController@account_details_view');
    Route::get('my-profile', 'Admin\UsersController@my_profile');
    Route::post('update-profile', 'Admin\UsersController@update_profile');
    Route::post('update-wordpressapikey', 'Admin\UsersController@update_wordpressapikey');
    Route::post('update-clickfunneldomain', 'Admin\UsersController@update_clickfunneldomain');
    Route::post('update-timezonelocale', 'Admin\UsersController@update_timezonelocale');
    Route::post('update-authentication', 'Admin\UsersController@update_authentication');
    Route::post('update-password', 'Admin\UsersController@update_password');
    Route::post('set_prefrences', 'Admin\UsersController@set_prefrences');
    Route::post('get_role_permissions', 'Admin\RolesController@get_role_permissions');
    Route::resource('reports', 'Admin\ReportsController');

    Route::resource('roles', 'Admin\RolesController');
    Route::resource('cms-pages', 'Admin\CmsPagesController');
    Route::resource('categories', 'Admin\CategoriesController');
    Route::resource('industries', 'Admin\IndustriesController');
    Route::resource('template-categories', 'Admin\TemplateCategoriesController');
    Route::resource('templates', 'Admin\TemplatesController');
    Route::resource('images', 'Admin\ImagesController');
    Route::resource('vector', 'Admin\SvgsController');
    Route::resource('videos', 'Admin\VideosController');
    Route::resource('integrations', 'Admin\IntegrationsController');
    Route::resource('help-articles', 'Admin\HelpArticlesController');
    Route::get('tickets/view-ticket/{id?}', 'Admin\TicketsController@view_ticket');
    Route::post('tickets/replyticket/', 'Admin\TicketsController@replyticket');
    Route::post('tickets/createticket/', 'Admin\TicketsController@createticket');
    Route::resource('tickets', 'Admin\TicketsController');
    /// email barod cast
    Route::get('email-broadcast', 'Admin\PandaMailController@emailbroadcast');
    Route::get('new-email-broadcast', 'Admin\PandaMailController@new_emailbroadcast');
    Route::post('send-email-broadcast', 'Admin\PandaMailController@send_emailbroadcast');

    Route::get('new-email-sequence', 'Admin\PandaMailController@new_email_sequence');
    Route::post('save-email-sequence', 'Admin\PandaMailController@save_email_sequence');
    Route::post('update-email-sequence', 'Admin\PandaMailController@update_email_sequence');
    Route::any('delete-email-sequence/{id}', 'Admin\PandaMailController@delete_email_sequence');

    Route::get('email-sequence-steps/{id}', 'Admin\PandaMailController@email_sequence_steps');
    Route::post('save-email-sequence-step', 'Admin\PandaMailController@save_email_sequence_step');
    Route::post('update-email-sequence-step', 'Admin\PandaMailController@update_email_sequence_step');
    Route::any('delete-email-sequence-step/{id}/{funnel_id}', 'Admin\PandaMailController@delete_email_sequence_step');

    Route::post('integrate-email-list', 'Admin\DomainsController@integrate_email_list');
    Route::post('connect-domain', 'Admin\DomainsController@connect_domain');
    Route::post('settings-domain', 'Admin\DomainsController@settings_domain');
    Route::post('save-automation-email', 'Admin\PandaMailController@save_automation_email');
    Route::post('update-automation-email', 'Admin\PandaMailController@update_automation_email');
    Route::any('delete-automation/{id}', 'Admin\PandaMailController@delete_automation');

    Route::any('delete-account', 'Admin\DashboardController@delete_account');

    
    Route::post('update-site-info', 'Admin\PandaPagesController@update_site_data');

    Route::get('/account/getDone', 'Admin\DashboardController@getDone');
    Route::get('/account/getCancel', 'Admin\DashboardController@getCancel');

    //buy packages routes
    Route::get('buy-package/{id}/{type}', 'Admin\PandaIntegrationsController@buy_package');
    Route::post('make-package-payment', 'Admin\PandaIntegrationsController@make_package_payment');

    Route::get('my-packages', 'Admin\DashboardController@my_packages');
    Route::get('payment-history/{type}', 'Admin\DashboardController@payment_history');

    //action_funnels
    Route::get('email-sequences', 'Admin\PandaMailController@emailsequences');
    /// contacts
    Route::get('contacts/lists/{id}/edit', 'Admin\PandaMailController@email_list_edit');
    Route::post('contacts/lists/edit-submit', 'Admin\PandaMailController@email_list_edit_submit');
    Route::post('contacts/create-email-list', 'Admin\PandaMailController@create_email_list');
    
    Route::get('contacts/emails/{id}/lists', 'Admin\PandaMailController@email_list');
    Route::post('chpastatus', 'Admin\PandaMailController@change_panda_site_status');
    Route::post('changesiteformstatus', 'Admin\PandaMailController@change_panda_forms_status');
    Route::post('addnewowneruser', 'Admin\PandaMailController@new_owner_user');
    Route::post('send_test_email_user_pm', 'Admin\PandaMailController@send_test_email_user');
    Route::post('send_test_email_user_pp', 'Admin\PandaPagesController@send_test_email_user');
    
    Route::get('contacts/text/{id}/lists', 'Admin\PandaMailController@text_list');
    Route::post('chpastatustext', 'Admin\PandaMailController@change_panda_site_text_status');
    Route::post('changesiteformstatustext', 'Admin\PandaMailController@change_panda_forms_text_status');
    Route::post('addnewownerusertext', 'Admin\PandaMailController@new_owner_text_user');
    Route::post('send_test_text_user_pm', 'Admin\PandaMailController@send_test_text_user');
    Route::post('send_test_text_user_pp', 'Admin\PandaPagesController@send_test_text_user');
    
    
    
    Route::get('contacts/{id}', 'Admin\PandaMailController@lead_detail');
    Route::resource('contacts', 'Admin\PandaMailController');
    Route::get('/panda', 'Admin\PandaIntegrationsController@index');
    Route::get('/panda-mail', 'Admin\PandaIntegrationsController@pandamail');
    Route::get('/panda-sms', 'Admin\PandaIntegrationsController@pandasms');
    Route::get('/panda-flow', 'Admin\PandaIntegrationsController@pandaflow');
    Route::get('/panda-crm', 'Admin\PandaIntegrationsController@pandacrm');
    Route::get('/panda-dial', 'Admin\PandaIntegrationsController@pandadial');
    Route::get('/external-integrations', 'Admin\PandaIntegrationsController@external_integrations');

    Route::post('/saveadd-action-leadspanda-demo-request', 'Admin\PandaIntegrationsController@save_panda_demo_request');
    Route::get('/panda-demo-requests/{type}', 'Admin\PandaIntegrationsController@panda_demo_requests');

    Route::get('email-templates/{id}/advance-builder', 'Admin\EmailTemplatesController@advance_builder');
    Route::get('sms-templates/{id}/advance-builder-text', 'Admin\EmailTemplatesController@advance_builder_text');

    Route::get('email-templates/{id}/edit_preview_email_template/{rand_id}', 'Admin\EmailTemplatesController@advance_builder_EditPreviewEmail');

    Route::resource('sms-templates', 'Admin\PandaMailController');
    Route::resource('email-templates', 'Admin\EmailTemplatesController');
    Route::post('update_email_template', 'Admin\BroadcastController@update_email_template');

    Route::post('email-template/del-file', 'Admin\EmailTemplatesController@del_file');

    Route::get('settings', 'Admin\SettingsController@index');
    Route::post('settings/update', 'Admin\SettingsController@update');
    Route::post('settings/change-password', 'Admin\SettingsController@changePassword');

    Route::resource('blog-category', 'Admin\BlogCategroiesController');
    Route::resource('blogs', 'Admin\BlogController');

    Route::resource('demos-scheduled', 'Admin\DemosController');
    Route::resource('subscribers', 'Admin\SubscribersController');
    Route::resource('testimonials', 'Admin\TestimonialsController');
    Route::resource('contact-us-log', 'Admin\ContactUsController');

    Route::post('approve-user', 'Admin\UpgradeController@approve_user');
    Route::post('update-paypal-details', 'Admin\UsersController@update_paypal_details');

    Route::post('update-card-info', 'Admin\UsersController@update_card_details');

    Route::get('notifications', 'Admin\NotificationsController@index');

    Route::post('notifications/status_update', 'Admin\NotificationsController@status_update');
    // new buy post route

    Route::post('/domains/get-pages', 'Admin\DomainsController@get_pages');

    Route::post('/update_domain', 'Admin\DomainsController@update_domain');
    Route::post('/domains/paywithpaypal', 'Admin\DomainsController@paywithpaypal');
    Route::post('/domains/buy', 'Admin\DomainsController@buy_domain');
    Route::post('/domains/get-domain-price', 'Admin\DomainsController@get_domain_price');

    Route::post('/domains/get-domains', 'Admin\DomainsController@get_domains');
    
    Route::get('/domains/getDone', 'Admin\DomainsController@getDone');
    Route::get('/domains/getCancel', 'Admin\DomainsController@getCancel');
    Route::post('/domains/ssl-purchase', 'Admin\DomainsController@ssl_purchase');
    Route::resource('/domains', 'Admin\DomainsController');
    Route::resource('/assets', 'Admin\DigitalassetsController');
    Route::resource('/mytemplates', 'Admin\MytemplatesController');
    Route::resource('/smtp', 'Admin\SmtpController');

    Route::resource('/payment-gateways', 'Admin\PaymentgatewaysController');
    Route::post('/set-default-gateway', 'Admin\PaymentgatewaysController@set_default_gateway');
    Route::resource('/billing', 'Admin\BillingsubscriptionController');
});





Route::get('/home', 'HomeController@index')->name('home');
