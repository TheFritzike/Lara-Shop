<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('login'); //welcome
})->name('boonVenit');

Route::get('user-registration', 'UserController@index');
Route::post('user-store', 'UserController@userPostRegistration');
Route::get('user-login', 'UserController@userLoginIndex');
Route::post('login', 'UserController@userPostLogin');

Route::group(['middleware' => ['auth']], function () { 
    Route::get('products', 'ProductsController@products');
    Route::get('cart', 'ProductsController@cart');
    Route::get('add-to-cart/{id}', 'ProductsController@addToCart');
    Route::patch('update-cart', 'ProductsController@update');
    Route::delete('remove-from-cart', 'ProductsController@remove');
    Route::get('logout', 'UserController@logout');
});

/********************Ahogy volt
Route::get('/', function () {
    return view('login'); //welcome
});


Route::get('user-registration', 'UserController@index');
Route::post('user-store', 'UserController@userPostRegistration');
Route::get('user-login', 'UserController@userLoginIndex');
Route::post('login', 'UserController@userPostLogin');
Route::get('dashboard', 'UserController@dashboard');
Route::get('logout', 'UserController@logout');
Route::get('products', 'ProductsController@products');


//Route::get('index', 'ProductsController@index'); //afisare pagina de start
Route::get('cart', 'ProductsController@cart'); //cos
Route::get('add-to-cart/{id}', 'ProductsController@addToCart');//adaug in cos
Route::patch('update-cart', 'ProductsController@update'); //modific cos
Route::delete('remove-from-cart', 'ProductsController@remove');//sterg din cos
********************************/


/* Ezt kell majd megoldjam
Route::get('user-registration', 'UserController@index')->middleware(guest);
Route::post('user-store', 'UserController@userPostRegistration')->middleware(guest);
Route::get('user-login', 'UserController@userLoginIndex')->middleware(guest);
Route::post('login', 'UserController@userPostLogin')->middleware(guest);
Route::get('dashboard', 'UserController@dashboard')->middleware(auth);
Route::get('logout', 'UserController@logout')->middleware(auth);
Route::get('products', 'ProductsController@products')->middleware(auth);


//Route::get('index', 'ProductsController@index'); //afisare pagina de start
Route::get('cart', 'ProductsController@cart')->middleware(auth); //cos
Route::get('add-to-cart/{id}', 'ProductsController@addToCart')->middleware(auth);//adaug in cos
Route::patch('update-cart', 'ProductsController@update')->middleware(auth); //modific cos
Route::delete('remove-from-cart', 'ProductsController@remove')->middleware(auth);//sterg din cos
*/

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
