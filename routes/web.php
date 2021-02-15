<?php

use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Route::get('/callendar/{stade}', function($stade){
    $reservations =Reservation::where('stade',$stade)->get();
    
    return view('callendar',compact('reservations','stade'));
})->name('callendar');


Route::group(['prefix' => 'reservation', 'as' => 'reservation'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'ReservationController@index']);
    Route::post('/total', ['as' => '.total', 'uses' => 'ReservationController@total']);
    Route::get('/create',['as'=>'.create', 'uses' => 'ReservationController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'ReservationController@store']);
    Route::post('/filter', ['as' => '.filter', 'uses' => 'ReservationController@filter']);
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'ReservationController@destroy']); 
    Route::get('/stock/{id_demande}', ['as' => '.stock', 'uses' => 'ReservationController@stock']); 
    Route::get('/print/stock/{id_demande}', ['as' => '.print.stock', 'uses' => 'ReservationController@printStock']); 
       
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'ReservationController@edit']);
    Route::get('/show/{id_reservation}', ['as' => '.show', 'uses' => 'ReservationController@show']);
    Route::post('/update/{reservation}', ['as' => '.update', 'uses' => 'ReservationController@update']);    
    Route::post('/regler/{reservation}', ['as' => '.regler', 'uses' => 'ReservationController@regler']);    
    Route::get('/download/{reservation}', ['as' => '.download', 'uses' => 'ReservationController@download']);    
    
});
Route::get('/', function(){
    return redirect()->route('login.admin');
});
Auth::routes();











Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/login/livreur', 'Auth\LoginController@showLivreurLoginForm')->name('login.Livreur');
Route::get('/login/fournisseur', 'Auth\LoginController@showFournisseurLoginForm')->name('login.Fournisseur');
Route::get('/login/freelancer', 'Auth\LoginController@showFreelancerLoginForm')->name('login.Freelancer');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');
Route::get('/register/livreur', 'Auth\RegisterController@showLivreurRegisterForm')->name('register.Livreur');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/livreur', 'Auth\LoginController@livreurLogin');
Route::post('/login/fournisseur', 'Auth\LoginController@fournisseurLogin');
Route::post('/login/freelancer', 'Auth\LoginController@freelancerLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');
Route::post('/register/livreur', 'Auth\RegisterController@createLivreur')->name('register.Livreur');


Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin');
});

