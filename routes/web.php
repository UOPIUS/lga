<?php

/*
https://imo.evas.com.ng/hackney_permit/187922
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|	password: 7G3W++Mni]!=
	user : webappco_lga
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

//Auth::routes();
Route::post('login', 'LoginController@login');


Route::get('users/register', 'RegisterController@registerForm');
Route::get('users/index', 'UserController@index');
Route::get('users/{id}', 'UserController@show');

Route::resource('configurations', 'PriceConfiguration');
Route::resource('payments', 'PaymentController');
Route::resource('roles', 'RoleController');

Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Web Routes Added by PIUS Starts
|--------------------------------------------------------------------------
|
*/

Route::resource('tax-payer', 'TaxPayerController');
Route::get('fetchlga', 'TaxPayerController@fetchLGA'); //fetch lga
Route::get('autocomplete', 'TaxPayerController@autocomplete');
Route::post('tax-payer/photo/upload', 'TaxPayerController@taxPayerPhotoUpload');
Route::get('/tax-payer/ajax/search', 'TaxPayerController@ajaxClientRecords');
Route::get('tax_payer/photo/edit/{id}', 'TaxPayerController@changePicture');
Route::post('/tenement', 'TenementController@saveTenement'); //save new tenement rate
Route::post('fetchlga', 'TenementController@searchTaxServiceCode'); 
Route::get('transactions/tax_transaction', function(){return view('pages/transactions/tax_transaction');})->name('tax_transaction');
/*
|--------------------------------------------------------------------------
| Web Routes Added by PIUS Ends
|--------------------------------------------------------------------------
|
*/