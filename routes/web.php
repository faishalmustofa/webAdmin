<?php

use Illuminate\Support\Facades\Route;
use Svg\Tag\Group;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::group(['middleware' => 'auth'], function () {
    
// });

//Dashboard
Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('/grafik', 'DashboardController@grafik')->name('grafik')->middleware('auth');
Route::get('/get-grafik','DashboardController@getGrafik')->name('get-grafik')->middleware('auth');
Route::post('/filter-grafik','DashboardController@filterGrafik')->name('filter.grafik')->middleware('auth');
Route::get('/datatable-sppm-diproses','DashboardController@datatableDiproses')->name('datatable.sppm.diproses')->middleware('auth');
Route::get('/datatable-sppm-selesai','DashboardController@datatableSelesai')->name('datatable.sppm.selesai')->middleware('auth');


// Auth
Route::get('/registration', 'AuthController@registration')->name('registration');
Route::post('/register', 'AuthController@register')->name('register');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/post-login', 'AuthController@postLogin')->name('post-login');
Route::post('/logout', 'AuthController@logout')->name('logout');

//User
Route::get('/profile/{id}', 'UserController@profile')->name('profile')->middleware('auth');
Route::post('/update-profile/{id}', 'UserController@updateProfile')->name('update.profile')->middleware('auth');

Route::get('/user-list', 'UserController@userList')->name('users')->middleware('auth');
Route::get('/edit-user/{id}', 'UserController@editUser')->name('edit.user')->middleware('auth');
Route::post('/update-user/{id}', 'UserController@updateUser')->name('update.user')->middleware('auth');
Route::get('/delete-user/{id}', 'UserController@deleteUser')->name('delete.user')->middleware('auth');
Route::get('/datatable-users','UserController@datatableUsers')->name('datatable.users')->middleware('auth');
Route::get('/verify-users/{id}','UserController@verifyUser')->name('verify.users')->middleware('auth');

// Menu
// DSM
Route::namespace("DSM")->group(function (){
    Route::get('/dsm', 'DSMController@getDsm')->name('dsm')->middleware('auth');
    Route::get('/create-dsm', 'DSMController@createDsm')->name('create.dsm')->middleware('auth');
    Route::post('/store-dsm', 'DSMController@storeDsm')->name('store.dsm')->middleware('auth');
    Route::get('/edit-dsm/{id}', 'DSMController@editDsm')->name('edit.dsm')->middleware('auth');
    Route::post('/update-dsm/{id}', 'DSMController@updateDsm')->name('update.dsm')->middleware('auth');
    Route::get('/delete-dsm/{id}', 'DSMController@deleteDsm')->name('delete.dsm')->middleware('auth');

    Route::get('/datatable-dsm','DSMController@datatables')->name('datatable.dsm')->middleware('auth');
});

// PO
Route::namespace("PO")->group(function (){
    Route::get('/po', 'POController@getPo')->name('po')->middleware('auth');
    Route::get('/create-po', 'POController@createPo')->name('create.po')->middleware('auth');
    Route::post('/store-po', 'POController@storePo')->name('store.po')->middleware('auth');
    Route::get('/edit-po/{id}', 'POController@editPo')->name('edit.po')->middleware('auth');
    Route::post('/update-po/{id}', 'POController@updatePo')->name('update.po')->middleware('auth');
    Route::get('/delete-po/{id}', 'POController@deletePo')->name('delete.po')->middleware('auth');
    Route::get('/get-print-po/{id}', 'POController@getPrintPO')->name('get.print.po')->middleware('auth');

    Route::get('/datatable-po','POController@datatables')->name('datatable.po')->middleware('auth');
});

// SPPM
Route::namespace("SPPM")->group(function (){
    Route::get('/sppm', 'SPPMController@getSppm')->name('sppm')->middleware('auth')->middleware('auth');
    Route::get('/sppm-belum-diproses', 'SPPMController@getSppmBelumDiproses')->name('sppm.belum.diproses')->middleware('auth');
    Route::get('/sppm-diproses', 'SPPMController@getSppmDiproses')->name('sppm.diproses')->middleware('auth');
    Route::get('/sppm-selesai', 'SPPMController@getSppmSelesai')->name('sppm.selesai')->middleware('auth');


    Route::get('/create-sppm', 'SPPMController@createSppm')->name('create.sppm')->middleware('auth');
    Route::post('/store-sppm', 'SPPMController@storeSppm')->name('store.sppm')->middleware('auth');
    Route::get('/edit-sppm/{id}', 'SPPMController@editSppm')->name('edit.sppm')->middleware('auth');
    Route::post('/update-sppm/{id}', 'SPPMController@updateSppm')->name('update.sppm')->middleware('auth');
    Route::get('/delete-sppm/{id}', 'SPPMController@deleteSppm')->name('delete.sppm')->middleware('auth');
    Route::get('/detail-proses-sppm/{id}', 'SPPMController@detailProsesSPPM')->name('detail.proses.sppm')->middleware('auth');
    Route::post('/update-proses-sppm/{id}', 'SPPMController@updateProsesSPPM')->name('update.proses.sppm')->middleware('auth');
    Route::get('/get-print-sppm/{id}', 'SPPMController@getPrintSPPM')->name('get.print.sppm')->middleware('auth');
    Route::get('/print-sppm', 'SPPMController@printSPPM')->name('print.sppm')->middleware('auth');

    Route::get('/datatable-sppm-belumdiproses','SPPMController@datatablesBelumDiproses')->name('datatable.sppm.belum.diproses')->middleware('auth');
    Route::get('/datatable-sppm-diproses','SPPMController@datatablesDiproses')->name('datatable.sppm.diproses')->middleware('auth');
    Route::get('/datatable-sppm','SPPMController@datatables')->name('datatable.sppm')->middleware('auth');
});
