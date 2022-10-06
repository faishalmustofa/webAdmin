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

// Route::get('/', function () {
//     return view('welcome');
// });

//Dashboard
Route::get('/', 'DashboardController@index')->name('dashboard');

// Auth
Route::get('/register', 'AuthController@register')->name('register');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/post-login', 'AuthController@postLogin')->name('post-login');
Route::post('/logout', 'AuthController@logout')->name('logout');

// Menu
// DSM
Route::namespace("DSM")->group(function (){
    Route::get('/dsm', 'DSMController@getDsm')->name('dsm');
    Route::get('/create-dsm', 'DSMController@createDsm')->name('create.dsm');
    Route::post('/store-dsm', 'DSMController@storeDsm')->name('store.dsm');
    Route::get('/edit-dsm/{id}', 'DSMController@editDsm')->name('edit.dsm');
    Route::post('/update-dsm/{id}', 'DSMController@updateDsm')->name('update.dsm');
    Route::get('/delete-dsm/{id}', 'DSMController@deleteDsm')->name('delete.dsm');

    Route::get('/datatable-dsm','DSMController@datatables')->name('datatable.dsm');
});

// KPI
Route::namespace("KPI")->group(function (){
    Route::get('/kpi', 'KPIController@getKpi')->name('kpi');
    Route::get('/create-kpi', 'KPIController@createKpi')->name('create.kpi');
    Route::post('/store-kpi', 'KPIController@storeKpi')->name('store.kpi');
    Route::get('/edit-kpi/{id}', 'KPIController@editKpi')->name('edit.kpi');
    Route::patch('/update-kpi/{id}', 'KPIController@updateKpi')->name('update.kpi');
    Route::post('/delete-kpi/{id}', 'KPIController@deleteKpi')->name('delete.kpi');
});

// Monitoring
Route::namespace("Monitoring")->group(function (){
    Route::get('/monitoring', 'MonitoringController@getMonitoring')->name('monitoring');
    Route::get('/create-monitoring', 'MonitoringController@createMonitoring')->name('create.monitoring');
    Route::post('/store-monitoring', 'MonitoringController@storeMonitoring')->name('store.monitoring');
    Route::get('/edit-monitoring/{id}', 'MonitoringController@editMonitoring')->name('edit.monitoring');
    Route::patch('/update-monitoring/{id}', 'MonitoringController@updateMonitoring')->name('update.monitoring');
    Route::post('/delete-monitoring/{id}', 'MonitoringController@deleteMonitoring')->name('delete.monitoring');
});

// PO
Route::namespace("PO")->group(function (){
    Route::get('/po', 'POController@getPo')->name('po');
    Route::get('/create-po', 'POController@createPo')->name('create.po');
    Route::post('/store-po', 'POController@storePo')->name('store.po');
    Route::get('/edit-po/{id}', 'POController@editPo')->name('edit.po');
    Route::patch('/update-po/{id}', 'POController@updatePo')->name('update.po');
    Route::post('/delete-po/{id}', 'POController@deletePo')->name('delete.po');

    Route::get('/datatable-po','POController@datatables')->name('datatable.po');
});

// SPPM
Route::namespace("SPPM")->group(function (){
    Route::get('/sppm', 'SPPMController@getSppm')->name('sppm');
    Route::get('/create-sppm', 'SPPMController@createSppm')->name('create.sppm');
    Route::post('/store-sppm', 'SPPMController@storeSppm')->name('store.sppm');
    Route::get('/edit-sppm/{id}', 'SPPMController@editSppm')->name('edit.sppm');
    Route::post('/update-sppm/{id}', 'SPPMController@updateSppm')->name('update.sppm');
    Route::get('/delete-sppm/{id}', 'SPPMController@deleteSppm')->name('delete.sppm');

    Route::get('/datatable-sppm','SPPMController@datatables')->name('datatable.sppm');
});

// Pembinaan
Route::namespace("Pembinaan")->group(function (){
    Route::get('/pembinaan', 'PembinaanController@getPembinaan')->name('pembinaan');
    Route::get('/create-pembinaan', 'PembinaanController@createPembinaan')->name('create.pembinaan');
    Route::post('/store-pembinaan', 'PembinaanController@storePembinaan')->name('store.pembinaan');
    Route::get('/edit-pembinaan/{id}', 'PembinaanController@editPembinaan')->name('edit.pembinaan');
    Route::patch('/update-pembinaan/{id}', 'PembinaanController@updatePembinaan')->name('update.pembinaan');
    Route::post('/delete-pembinaan/{id}', 'PembinaanController@deletePembinaan')->name('delete.pembinaan');
});