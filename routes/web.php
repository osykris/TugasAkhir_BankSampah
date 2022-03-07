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

//auth route for both 
Route::group(['middleware' => ['auth']], function () {

    //dashboard
    Route::get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('dashboard');

    //setor sampah
    Route::get('/setor-sampah', 'App\Http\Controllers\SetorSampahController@index')->name('setor-sampah');

    //data sampah
    Route::resource('data-sampah', 'App\Http\Controllers\DataSampahController');

});


require __DIR__ . '/auth.php';
