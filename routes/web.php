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

    //BOTH

    //dashboard
    Route::get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('dashboard');

    //ADMIN

    //jenis sampah
    Route::get('jenis-sampah', 'App\Http\Controllers\Admin\JenisSampahController@index')->name('jenis-sampah');
    Route::post('/add-sampah/save', 'App\Http\Controllers\Admin\JenisSampahController@store');
    Route::get('/edit-jenis-sampah/',  'App\Http\Controllers\Admin\JenisSampahController@edit');
    Route::post('/update-jenis-sampah/',  'App\Http\Controllers\Admin\JenisSampahController@update');
    Route::get('/hapus-jenis-sampah/', 'App\Http\Controllers\Admin\JenisSampahController@delete');
    Route::post('/destroy-jenis-sampah/', 'App\Http\Controllers\Admin\JenisSampahController@destroy');

    //transaksi
    Route::get('/transaksi-masuk', 'App\Http\Controllers\Admin\TransaksiController@index')->name('transaksi-masuk');
    Route::get('/edit-status/',  'App\Http\Controllers\Admin\TransaksiController@edit');
    Route::post('/update-status/',  'App\Http\Controllers\Admin\TransaksiController@update');
    Route::get('/transaksi/detail/{id}', 'App\Http\Controllers\Admin\TransaksiController@detail');

    //riwayat
    Route::get('/riwayat', 'App\Http\Controllers\Admin\TransaksiController@riwayat')->name('riwayat');
    Route::get('/tambah-sampah/{id}', 'App\Http\Controllers\Admin\TransaksiController@index_sampah');
    Route::post('/tambah-sampah/save/{id}', 'App\Http\Controllers\Admin\TransaksiController@store');

    //nasabah
    Route::get('/user', 'App\Http\Controllers\Admin\NasabahController@index')->name('user');
    Route::get('/hapus-user/', 'App\Http\Controllers\Admin\NasabahController@delete');
    Route::post('/destroy-user/', 'App\Http\Controllers\Admin\NasabahController@destroy');
    
    //USER (NASABAH)

    //setor sampah (transaksi baru)
    Route::get('/setor-sampah', 'App\Http\Controllers\SetorSampahController@index')->name('setor-sampah');
    Route::get('/setor-sampah/detail/{id}', 'App\Http\Controllers\SetorSampahController@detail');
    Route::get('/add-setor', 'App\Http\Controllers\SetorSampahController@index_setor');
    Route::get('/add-jemput', 'App\Http\Controllers\SetorSampahController@index_jemput');
    Route::post('tambah-sampah/{id}', 'App\Http\Controllers\SetorSampahController@setor');
    Route::delete('sampah/hapus/{id}', 'App\Http\Controllers\SetorSampahController@hapus_sampah');
    Route::post('setor', 'App\Http\Controllers\SetorSampahController@konfirmasi');
    Route::get('/hapus-setor/', 'App\Http\Controllers\SetorSampahController@delete');
    Route::post('/destroy-setor/', 'App\Http\Controllers\SetorSampahController@destroy');
    Route::get('/edit-setor/',  'App\Http\Controllers\SetorSampahController@edit');
    Route::post('/update-setor/',  'App\Http\Controllers\SetorSampahController@update');

    //data sampah
    Route::get('data-sampah', 'App\Http\Controllers\DataSampahController@index')->name('data-sampah');
});


require __DIR__ . '/auth.php';
