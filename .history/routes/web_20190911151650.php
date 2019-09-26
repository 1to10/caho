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
/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::group(array('namespace'=>'FrontEnd'), function(){

    Route::get('dashboard', function () {
        return redirect('dashboard/login');
    });

    Route::get('/', function () {
        return redirect('dashboard/login');
    });


    


});


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Cache Cleared'; //Return anything
});

Route::group(array('namespace'=>'Backend','prefix'=>'dashboard'), function(){
    Route::get('/', array( 'uses' => 'LoginController@index'));
    Route::get('/login', array( 'uses' => 'LoginController@index'));
    Route::post('/', array( 'uses' => 'LoginController@postLogin'));
    Route::post('/login', array('uses' => 'LoginController@postLogin'));
    Route::get('/forgot-password', array( 'uses' =>'ForgotPasswordController@forgotPassword'));
    Route::post('/forgot-password', array('uses' =>'ForgotPasswordController@postForgotPassword'));
    Route::get('/reset/{email}/{resetCode}', array( 'uses' =>'ForgotPasswordController@resetPassword'));
    Route::post('/reset/{email}/{resetCode}', array( 'uses' =>'ForgotPasswordController@postResetPassword'));

});


Route::group(array('namespace'=>'Backend','prefix'=>'dashboard','middleware' => 'admin','permission'), function(){

    /* General */
    Route::get('/welcome', array('uses' => 'DashboardController@index'));
    Route::get('/chart', array('uses' => 'DashboardController@chart'));
    Route::post('/logout', array( 'uses' => 'LoginController@logout'));

    /* User menu */
    Route::get('/user/edit/{id}', array( 'uses' => 'UserController@viewEditUser'));
    Route::post('/user/edit/{id}', array( 'uses' => 'UserController@editUser', 'as' => 'User.EditUser'));

    Route::get('/user', array( 'uses' => 'UserController@listUser', 'as' => 'User.ListView'));
    Route::get('user/{user}/activate', ['uses' => 'UserController@activate', 'as' => 'User.Activate']);
    Route::get('user/{user}/deactivate', ['uses' => 'UserController@deactivate', 'as' => 'User.Deactivate']);
    

    /* Categories */

    Route::get('/categories', array( 'uses' => 'CategoriesController@listing'));

    Route::get('/categories/add/new', array( 'uses' => 'CategoriesController@Add'));
    Route::post('/categories/add/new', array( 'uses' => 'CategoriesController@postdata'));

    Route::get('/categories/edit/{id}', array( 'uses' => 'CategoriesController@GetEdit'));
    Route::post('/categories/edit/{id}', array( 'uses' => 'CategoriesController@PostEdit'));

    Route::get('/categories/{id}/activate', ['uses' => 'CategoriesController@activate']);
    Route::get('/categories/{id}/deactivate', ['uses' => 'CategoriesController@deactivate']);
    Route::get('/categories/{id}/destroy', ['uses' => 'CategoriesController@destroy']);

    Route::get('/categories/{action}', array( 'uses' => 'CategoriesController@GetBulkAction'));
    Route::post('/categories/{action}', array( 'uses' => 'CategoriesController@PostBulkAction'));


    /* Locations */

    Route::get('/programs', array( 'uses' => 'LocationsController@listing'));

    Route::get('/programs/add/new', array( 'uses' => 'LocationsController@Add'));
    Route::post('/programs/add/new', array( 'uses' => 'LocationsController@postdata'));

    Route::get('/programs/edit/{id}', array( 'uses' => 'LocationsController@GetEdit'));
    Route::post('/programs/edit/{id}', array( 'uses' => 'LocationsController@PostEdit'));

    Route::get('/programs/{id}/activate', ['uses' => 'LocationsController@activate']);
    Route::get('/programs/{id}/deactivate', ['uses' => 'LocationsController@deactivate']);
    Route::get('/programs/{id}/destroy', ['uses' => 'LocationsController@destroy']);

    Route::get('/programs/{action}', array( 'uses' => 'LocationsController@GetBulkAction'));
    Route::post('/programs/{action}', array( 'uses' => 'LocationsController@PostBulkAction'));

    /* Registrations */


    Route::get('/registrations', array( 'uses' => 'RegistrationsController@listing'));

    Route::get('/registrations/add/new', array( 'uses' => 'RegistrationsController@Add'));
    Route::post('/registrations/add/new', array( 'uses' => 'RegistrationsController@postdata'));

    Route::get('/registrations/edit/{id}', array( 'uses' => 'RegistrationsController@GetEdit'));
    Route::post('/registrations/edit/{id}', array( 'uses' => 'RegistrationsController@PostEdit'));

    Route::get('/registrations/{id}/activate', ['uses' => 'RegistrationsController@activate']);
    Route::get('/registrations/{id}/deactivate', ['uses' => 'RegistrationsController@deactivate']);
    Route::get('/registrations/{id}/destroy', ['uses' => 'RegistrationsController@destroy']);

    Route::get('/registrations/{action}', array( 'uses' => 'RegistrationsController@GetBulkAction'));
    Route::post('/registrations/{action}', array( 'uses' => 'RegistrationsController@PostBulkAction'));


    /* Enquiry */

    Route::get('/enquiries', array( 'uses' => 'EnquiryController@listing'));
    Route::get('/feedback', array( 'uses' => 'EnquiryController@feedback'));
    Route::get('/newsletters', array( 'uses' => 'EnquiryController@newsletters'));

    Route::get('/newsletters/{id}/deletenewsletter', array( 'uses' => 'EnquiryController@deletenewsletter'));
    Route::get('/enquiries/{id}/destroy', ['uses' => 'EnquiryController@destroy']);
    Route::get('/feedback/{id}/delete', ['uses' => 'EnquiryController@delete']);

    /* Membership */

    
});


