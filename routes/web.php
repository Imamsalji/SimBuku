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
    return view('welcome');
});
Route::get('login', function () {
    return view('user.login');
})->name('login');
Route::post('postlogin', 'LoginController@login')->name('postlogin');
Route::get('logout', 'LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});
Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    Route::get('user', 'UserController@index')->name('user');
    Route::get('create_user', 'UserController@create')->name('create_user');
    Route::post('simpan_user', 'UserController@store')->name('simpan_user');
    Route::get('edit_user/{id}', 'UserController@edit')->name('edit_user');
    Route::post('update_user/{id}', 'UserController@update')->name('update_user');
    Route::get('delete_user/{id}', 'UserController@destroy')->name('delete_user');
    Route::prefix('/admin/buku')->name('buku.')->group(function () {
        Route::get('/', 'BukuController@index')->name('index');
        Route::get('/create', 'BukuController@create')->name('create');
        Route::post('/store', 'BukuController@store')->name('store');
        Route::get('/edit/{id}', 'BukuController@edit')->name('edit');
        Route::post('/update/{id}', 'BukuController@update')->name('ubah');
        Route::get('/delete/{id}', 'BukuController@destroy')->name('delete');
    });
    Route::prefix('/admin/pasok')->name('pasok.')->group(function () {
        Route::get('/', 'PasokController@index')->name('index');
        Route::get('/create', 'PasokController@create')->name('create');
        Route::post('/store', 'PasokController@store')->name('store');
        Route::get('/delete/{id}', 'PasokController@destroy')->name('delete');
    });
    Route::prefix('/admin/distributor')->name('distributor.')->group(function () {
        Route::get('/', 'DistributorController@index')->name('index');
        Route::get('/create', 'DistributorController@create')->name('create');
        Route::post('/store', 'DistributorController@store')->name('store');
        Route::get('/edit/{id}', 'DistributorController@edit')->name('edit');
        Route::post('/update/{id}', 'DistributorController@update')->name('ubah');
        Route::get('/delete/{id}', 'DistributorController@destroy')->name('delete');
    });
    Route::prefix('/penjualan')->name('penjualan.')->group(function () {
        Route::get('/', 'PenjualanController@index')->name('index');
        Route::get('/create', 'DistributorController@create')->name('create');
        Route::post('/store', 'DistributorController@store')->name('store');
        Route::get('/edit/{id}', 'DistributorController@edit')->name('edit');
        Route::post('/update/{id}', 'DistributorController@update')->name('ubah');
        Route::get('/delete/{id}', 'DistributorController@destroy')->name('delete');
    });
    Route::prefix('/laporan')->name('laporan.')->group(function () {
        Route::get('/buku', 'LaporanController@index')->name('buku');
        Route::get('/distributor', 'LaporanController@index')->name('distributor');
        Route::get('/pasok', 'LaporanController@index')->name('pasok');

    });
    
});

