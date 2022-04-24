<?php

use App\Models\Artikel;
use Illuminate\Support\Facades\Route;
use App\Models\ProdukDaurUlang;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        'count_nasabah' =>  DB::table('users')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->where('role_user.role_id', '2')->count(),
        'artikels' => Artikel::take(3)->orderBy('created_at', 'desc')->get()
    ]);
});

Route::get('/tentang-kami', function () {
    return view('about');
});

Route::get('/kontak', function () {
    return view('contact');
});
Route::post('kontak', 'App\Http\Controllers\KontakController@post');
Route::get('/hapus-pesan/', 'App\Http\Controllers\KontakController@delete');
Route::post('/destroy-pesan/', 'App\Http\Controllers\KontakController@destroy');

Route::get('/artikels', 'App\Http\Controllers\ArtikelController@index'); 
Route::get('/artikels/detail/{id}', 'App\Http\Controllers\ArtikelController@detail'); 


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
    Route::get('/tambah-sampah/{id}/{iduser}', 'App\Http\Controllers\Admin\TransaksiController@index_sampah');
    Route::post('/tambah-sampah/save/{id}/{iduser}', 'App\Http\Controllers\Admin\TransaksiController@store');
    Route::get('/hapus-tambah/', 'App\Http\Controllers\Admin\TransaksiController@delete_tambah');
    Route::post('/destroy-tambah/', 'App\Http\Controllers\Admin\TransaksiController@destroy_tambah');
    Route::post('/transaksi/selesai/{id}/{iduser}', 'App\Http\Controllers\Admin\TransaksiController@konfirmasi');
    Route::get('/riwayat-transaksiNasabah/',  'App\Http\Controllers\Admin\TransaksiController@data_nasabah')->name('riwayat-transaksiNasabah');
    Route::get('/riwayat-transaksiNasabah/detail/{id}', 'App\Http\Controllers\Admin\TransaksiController@riwayat')->name('riwayat-penarikan');

    //nasabah
    Route::get('/user', 'App\Http\Controllers\Admin\NasabahController@index')->name('user');
    Route::get('/hapus-user/', 'App\Http\Controllers\Admin\NasabahController@delete');
    Route::post('/destroy-user/', 'App\Http\Controllers\Admin\NasabahController@destroy');

    //saldo
    Route::get('/saldo', 'App\Http\Controllers\Admin\SaldoController@index')->name('saldo');
    Route::get('/saldo/detail/{id}', 'App\Http\Controllers\Admin\SaldoController@detail_saldo');
    Route::get('/saldo/detail/{id}/{idtransaksi}', 'App\Http\Controllers\Admin\SaldoController@pertransaksi');
    Route::post('/post-penarikan/',  'App\Http\Controllers\Admin\SaldoController@store');
    Route::get('/get-penarikan/',  'App\Http\Controllers\Admin\SaldoController@get');
    Route::get('/penarikan-nasabah/detail/{id}', 'App\Http\Controllers\Admin\SaldoController@riwayat_tarik')->name('riwayat-penarikan');
    Route::get('/saldo/bukti/',  'App\Http\Controllers\Admin\SaldoController@gambar');
    Route::get('/penarikan-nasabah/',  'App\Http\Controllers\Admin\SaldoController@data_nasabah')->name('penarikan-nasabah');
    Route::post('/post-penarikanCash/',  'App\Http\Controllers\Admin\SaldoController@store_cash');
    Route::get('/get-penarikanCash/',  'App\Http\Controllers\Admin\SaldoController@get_cash');

    //saldo tps3r
    Route::get('/tps3r-masuk', 'App\Http\Controllers\Admin\SaldoTPS3RController@index')->name('tps3r-masuk');
    Route::post('/add-tps3r/save', 'App\Http\Controllers\Admin\SaldoTPS3RController@store');
    Route::get('/edit-saldo-tps3r/',  'App\Http\Controllers\Admin\SaldoTPS3RController@edit');
    Route::post('/update-saldo-tps3r/',  'App\Http\Controllers\Admin\SaldoTPS3RController@update');
    Route::get('/hapus-saldo-tps3r/', 'App\Http\Controllers\Admin\SaldoTPS3RController@delete');
    Route::post('/destroy-saldo-tps3r/', 'App\Http\Controllers\Admin\SaldoTPS3RController@destroy');

    //produk daur ulang
    Route::get('produk-daur-ulang', 'App\Http\Controllers\Admin\ProdukDaurUlangController@index')->name('produk-daur-ulang');
    Route::post('/add-produk-daur-ulang/save', 'App\Http\Controllers\Admin\ProdukDaurUlangController@store');
    Route::get('/edit-produk-daur-ulang/',  'App\Http\Controllers\Admin\ProdukDaurUlangController@edit');
    Route::post('/update-produk-daur-ulang/',  'App\Http\Controllers\Admin\ProdukDaurUlangController@update');
    Route::get('/hapus-produk-daur-ulang/', 'App\Http\Controllers\Admin\ProdukDaurUlangController@delete');
    Route::post('/destroy-produk-daur-ulang/', 'App\Http\Controllers\Admin\ProdukDaurUlangController@destroy');

    //artikel
    Route::get('artikel', 'App\Http\Controllers\Admin\ArtikelController@index')->name('artikel');
    Route::post('/add-artikel/save', 'App\Http\Controllers\Admin\ArtikelController@store');
    Route::get('/edit-artikel/',  'App\Http\Controllers\Admin\ArtikelController@edit');
    Route::post('/update-artikel/',  'App\Http\Controllers\Admin\ArtikelController@update');
    Route::get('/hapus-artikel/', 'App\Http\Controllers\Admin\ArtikelController@delete');
    Route::post('/destroy-artikel/', 'App\Http\Controllers\Admin\ArtikelController@destroy');

    //penjualan sampah
    Route::get('penjualan-sampah', 'App\Http\Controllers\Admin\PenjualanSampahController@index')->name('penjualan-sampah');
    Route::post('/add-jualsampah/save', 'App\Http\Controllers\Admin\PenjualanSampahController@store');
    Route::get('/edit-jualsampah/',  'App\Http\Controllers\Admin\PenjualanSampahController@edit');
    Route::post('/update-jualsampah/',  'App\Http\Controllers\Admin\PenjualanSampahController@update');
    Route::get('/hapus-jualsampah/', 'App\Http\Controllers\Admin\PenjualanSampahController@delete');
    Route::post('/destroy-jualsampah/', 'App\Http\Controllers\Admin\PenjualanSampahController@destroy');

    //pengguna jasa tps3r
    Route::get('pengguna-tps3r', 'App\Http\Controllers\Admin\UserTPS3RController@index')->name('pengguna-tps3r');
    Route::post('/add-usertps3r/save', 'App\Http\Controllers\Admin\UserTPS3RController@store');
    Route::get('/edit-user-tps3r/',  'App\Http\Controllers\Admin\UserTPS3RController@edit');
    Route::post('/update-user-tps3r/',  'App\Http\Controllers\Admin\UserTPS3RController@update');
    Route::get('/hapus-user-tps3r/', 'App\Http\Controllers\Admin\UserTPS3RController@delete');
    Route::post('/destroy-user-tps3r/', 'App\Http\Controllers\Admin\UserTPS3RController@destroy');
    
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

    //riwayat transaksi
    Route::get('/riwayat-transaksi', 'App\Http\Controllers\SetorSampahController@riwayat')->name('riwayat-transaksi');
    Route::get('/riwayat-transaksi/detail/{id}', 'App\Http\Controllers\SetorSampahController@detail_transaksi');

    //data sampah
    Route::get('data-sampah', 'App\Http\Controllers\DataSampahController@index')->name('data-sampah');

    //saldo
    Route::get('saldo-nasabah', 'App\Http\Controllers\SaldoController@index')->name('saldo-nasabah');
    Route::get('/saldo-nasabah/detail/{idtransaksi}', 'App\Http\Controllers\SaldoController@pertransaksi');
    Route::post('/metode-penarikan-saldo/{id}', 'App\Http\Controllers\SaldoController@penarikan');
    Route::get('/penarikan-riwayat/',  'App\Http\Controllers\SaldoController@riwayat_penarikan')->name('penarikan-riwayat');

    //profile
    Route::get('/profile-nasabah/',  'App\Http\Controllers\ProfileController@index')->name('profile-nasabah');
    Route::post('profile-nasabah', 'App\Http\Controllers\ProfileController@update');
});


require __DIR__ . '/auth.php';
