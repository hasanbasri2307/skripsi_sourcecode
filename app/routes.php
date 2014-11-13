<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::when('*', 'csrf', array('post','put','delete'));
Route::get('/', 'GuestController@showLogin');
Route::post('login',array('as'=>'login-process','uses'=>'GuestController@doLogin'));
Route::get('signup',array('as'=>'sign-up','uses'=>'GuestController@signup'));
Route::get('forgotPassword',array('as'=>'forgot-password','uses'=>'GuestController@forgotPassword'));
Route::post('signup',array('as'=>'sign-up-process','uses'=>'GuestController@store'));
Route::get('activationAccount/{email}',array('as'=>'activation-account','uses'=>'GuestController@activation'));
Route::post('authenticate',array('as'=>'login-process','uses'=>'GuestController@doLogin'));
Route::post('activation',array('as'=>'activation-account','uses'=>'GuestController@doActivation'));
Route::get('resetPassword',array('as'=>'reset-password','uses'=>'GuestController@resetPassword'));
Route::post('resetPassword',array('as'=>'reset-password-process','uses'=>'GuestController@resetPasswordProcess'));
Route::post('sendResetLink',array('as'=>'send-reset-link','uses'=>'GuestController@sendResetLink'));
Route::get('error401','HomeController@error401front');

Route::group(array('before' => 'auth'), function()
{
    Route::get('401','HomeController@error401');
    Route::get('/logout',array('as' => 'logout-process','uses'=>'GuestController@doLogout'));
    
    Route::group(array('prefix'=>'admin','before'=>'admin'),function()
    {
        Route::get('dashboard',array('uses'=>'AdminController@dashboardAdmin','as'=>'dashboard-admin'));
        Route::resource('users','UsersController');
        Route::get('users/index/{type}',array('as'=>'admin.users.index','uses'=>'UsersController@index'));
        Route::get('users/delete/{id}',array('as'=>'admin.users.delete','uses'=>'UsersController@destroy'));
        Route::get('suspend/{id}',array('uses'=>'UsersController@suspend','as'=>'admin.users.suspend'));
        Route::get('unsuspend/{id}',array('uses'=>'UsersController@unsuspend','as'=>'admin.users.unsuspend'));
        Route::get('banned/{id}',array('uses'=>'UsersController@banned','as'=>'admin.users.banned'));
        Route::get('unbanned/{id}',array('uses'=>'UsersController@unbanned','as'=>'admin.users.unbanned'));
        Route::get('changePassword',array('as'=>'admin.changepassword','uses'=>'AdminController@changePassword'));
        Route::get('profile',array('as'=>'admin.profile','uses'=>'AdminController@profile'));
        Route::get('profile/edit',array('as'=>'admin.profile.edit','uses'=>'AdminController@editProfile'));
        Route::post('profile/edit/process',array('as'=>'admin.editprofile.process','uses'=>'AdminController@doEditProfile','before'=>'csrf'));

        Route::post('docp',array('as'=>'admin.docp','uses'=>'AdminController@doChangePassword','before'=>'csrf'));

        Route::resource('docs','DocsController');
        Route::get('docs/download/{name}',array('uses'=>'DocsController@getDownload','as'=>'admin.docs.download'));
        Route::get('docs/fileDelete/{id}',array('uses'=>'DocsController@fileDelete','as'=>'admin.docs.fileDelete'));
        Route::get('docs/delete/{id}',array('as'=>'admin.docs.delete','uses'=>'DocsController@destroy'));
        Route::get('report',array('as'=>'admin.report_user.index','uses'=>'ReportController@index'));
        Route::post('report/do_report_user',array('as'=>'admin.report_user.process','uses'=>'ReportController@printed'));
        Route::get('report/print/to_excel/{condition}/{user_type}/{all}',array('as'=>'admin.report_user.to_excel','uses'=>'ReportController@report_to_excel'));
        Route::get('report/print/to_pdf/{condition}/{user_type}/{all}',array('as'=>'admin.report_user.to_pdf','uses'=>'ReportController@exportPdf'));

    });
    
    Route::group(array('prefix'=>'client','before'=>'client'),function()
    {
         Route::get('dashboard',array('uses'=>'HomeController@dashboardClient'));
        
    });
    
    Route::group(array('prefix'=>'cso','before'=>'cso'),function()
    {
      
    });
    
});