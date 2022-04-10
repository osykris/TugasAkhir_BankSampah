<?php

use Illuminate\Support\Facades\Route;
use App\Models\ProdukDaurUlang;
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
    return view('welcome', [
        'items' => ProdukDaurUlang::take(4)->get(),
    ]);
});

Route::get('/tentang-kami', function () {
    return view('about');
});

Route::get('/kontak', function () {
    return view('contact');
});

Route::get('/produk', 'App\Http\Controllers\ProdukDaurUlangController@render');
Route::get('cari', 'App\Http\Controllers\ProdukDaurUlangController@cari');

//auth route for both 
Route::group(['middleware' => ['auth']], function () {

    //ADMIN

    //jenis sampah
    Route::get('jenis-sampah', 'App\Http\Controllers\Admin\JenisSampahController@index')->name('jenis-sampah');
    Route::post('/add-sampah/save', 'App\Http\Controllers\Admin\JenisSampahController@store');
    Route::get('/edit-jenis-sampah/',  'App\Http\Controllers\Admin\JenisSampahController@edit');
    Route::post('/update-jenis-sampah/',  'App\Http\Controllers\Admin\JenisSampahController@update');
    Route::get('/hapus-jenis-sampah/', 'App\Http\Controllers\Admin\JenisSampahController@delete');
    Route::post('/destroy-jenis-sampah/', 'App\Http\Controllers\Admin\JenisSampahController@destroy');

    //dashboard
    Route::get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('dashboard');

    //setor sampah
    Route::get('/setor-sampah', 'App\Http\Controllers\SetorSampahController@index')->name('setor-sampah');
    Route::get('/setor-sampah/detail/{id}', 'App\Http\Controllers\SetorSampahController@detail');
    Route::get('/add-setor', 'App\Http\Controllers\SetorSampahController@index_setor');
    Route::get('/add-jemput', 'App\Http\Controllers\SetorSampahController@index_jemput');
    Route::post('tambah-sampah/{id}', 'App\Http\Controllers\SetorSampahController@setor');
    Route::delete('sampah/hapus/{id}', 'App\Http\Controllers\SetorSampahController@hapus_sampah');
    Route::post('setor', 'App\Http\Controllers\SetorSampahController@konfirmasi');

    //data sampah
    Route::get('data-sampah', 'App\Http\Controllers\DataSampahController@index')->name('data-sampah');
});


require __DIR__ . '/auth.php';
