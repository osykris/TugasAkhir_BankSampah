<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk_daur_ulangs')->insert([
            'user_id' => 1,
            'nama' => 'Tas Brown',
            'deskripsi' => 'Tas berkualitas ramah lingkungan dengan warna coklat, 
            dapat digunakan untuk berberlanja atau yang lainnya.',
            'harga' => '30000',
            'gambar' => 'PR01.jpg'
        ]);

        DB::table('produk_daur_ulangs')->insert([
            'user_id' => 1,
            'nama' => 'Wadah Minuman Gelasan',
            'deskripsi' => 'Wadah ini dapat digunakan untuk menaruh minuman pada
            saat hari raya lebaran yang dapat menambah esetetika ruangan Anda.',
            'harga' => '40000',
            'gambar' => 'PR02.jpg'
        ]);


        DB::table('produk_daur_ulangs')->insert([
            'user_id' => 1,
            'nama' => 'Pouch Blue',
            'deskripsi' => 'Pouch warna biru serba guna yang dapat digunakan untuk
            menaruh uang, perlengkapan sekolah, atau yang lainnya.',
            'harga' => '18000',
            'gambar' => 'PR03.jpg'
        ]);

        DB::table('produk_daur_ulangs')->insert([
            'user_id' => 1,
            'nama' => 'Pouch Pink',
            'deskripsi' => 'Pouch warna pink serba guna yang dapat digunakan untuk
            menaruh uang, perlengkapan sekolah, atau yang lainnya.',
            'harga' => '18000',
            'gambar' => 'PR04.jpg'
        ]);

        DB::table('produk_daur_ulangs')->insert([
            'user_id' => 1,
            'nama' => 'Pouch Rainbow',
            'deskripsi' => 'Pouch berwarna pelangi serba guna yang dapat digunakan untuk
            menaruh uang, perlengkapan sekolah, atau yang lainnya.',
            'harga' => '19000',
            'gambar' => 'PR05.jpg'
        ]);

        DB::table('produk_daur_ulangs')->insert([
            'user_id' => 1,
            'nama' => 'Shoulder Bag',
            'deskripsi' => 'Tas bahu serba guna, tas ramah lingkungan yang dapat digunakan 
            pada berbagai acara. ',
            'harga' => '25000',
            'gambar' => 'PR06.jpg'
        ]);

        DB::table('produk_daur_ulangs')->insert([
            'user_id' => 1,
            'nama' => 'Pouch Batik',
            'deskripsi' => 'Pouch berwarna batik serba guna yang dapat digunakan untuk
            menaruh uang, perlengkapan sekolah, atau yang lainnya.',
            'harga' => '15000',
            'gambar' => 'PR07.jpg'
        ]);

        DB::table('produk_daur_ulangs')->insert([
            'user_id' => 1,
            'nama' => 'Pouch Monochrome',
            'deskripsi' => 'Pouch berwarna hitam dan putih serba guna yang dapat digunakan untuk
            menaruh uang, perlengkapan sekolah, atau yang lainnya.',
            'harga' => '18000',
            'gambar' => 'PR08.jpg'
        ]);

        DB::table('produk_daur_ulangs')->insert([
            'user_id' => 1,
            'nama' => 'Big Pouch',
            'deskripsi' => 'Pouch besar serba guna yang dapat digunakan untuk
            menaruh uang, perlengkapan sekolah, kertas, atau yang lainnya.',
            'harga' => '20000',
            'gambar' => 'PR10.jpg'
        ]);

        DB::table('produk_daur_ulangs')->insert([
            'user_id' => 1,
            'nama' => 'Tas Kerenjang',
            'deskripsi' => 'Tas kerenjang serba guna yang dapat digunakan untuk
            berbelanja atau yang lainnya, awet dan kuat untuk menaruh barang.',
            'harga' => '50000',
            'gambar' => 'PR11.jpg'
        ]);

        DB::table('produk_daur_ulangs')->insert([
            'user_id' => 1,
            'nama' => 'Wadah Tisu',
            'deskripsi' => 'Wadah tisu berwarna coklat dapat digunakan untuk menaruh
            tisu dan sebagai hiasan menambah nilai estetika ruangan Anda.',
            'harga' => '25000',
            'gambar' => 'PR12.jpg'
        ]);

        DB::table('produk_daur_ulangs')->insert([
            'user_id' => 1,
            'nama' => 'Piring',
            'deskripsi' => 'Piring ini dapat digunakan berkali-kali dapat digunakan dengan
            menambahkan kertas minyak diatasnya jadi mudah dan tidak perlu mencucinya.',
            'harga' => '13000',
            'gambar' => 'PR13.jpg'
        ]);

        DB::table('produk_daur_ulangs')->insert([
            'user_id' => 1,
            'nama' => 'Vas Bunga',
            'deskripsi' => 'Vas bunga ramah lingkungan dan terjangkau dapat digunakan sebagai
            hiasan ruang tamu Anda.',
            'harga' => '45000',
            'gambar' => 'PR14.jpg'
        ]);

        DB::table('produk_daur_ulangs')->insert([
            'user_id' => 1,
            'nama' => 'Tas Punggung Ungu',
            'deskripsi' => 'Tas punggung berwarna ungu dengan size kecil yang dapat
            digunakan untuk berpergian, simple, dan elegan.',
            'harga' => '90000',
            'gambar' => 'PR15.jpg'
        ]);

        DB::table('produk_daur_ulangs')->insert([
            'user_id' => 1,
            'nama' => 'Tas Punggung  Merah',
            'deskripsi' => 'Tas punggung berwarna merah dengan size kecil yang dapat
            digunakan untuk berpergian, simple, dan elegan.',
            'harga' => '90000',
            'gambar' => 'PR16.jpg'
        ]);

        DB::table('produk_daur_ulangs')->insert([
            'user_id' => 1,
            'nama' => 'Tas Kerenjang Full',
            'deskripsi' => 'Tas kerenjang dengan dilengkapi tutup dapat digunakan untuk
            berbelanja atau yang lainnya, awet dan kuat untuk menaruh barang.',
            'harga' => '85000',
            'gambar' => 'PR17.jpg'
        ]);

        DB::table('produk_daur_ulangs')->insert([
            'user_id' => 1,
            'nama' => 'Tas Brown Flower',
            'deskripsi' => 'Tas bunga berkualitas ramah lingkungan dengan warna coklat, 
            dapat digunakan untuk berberlanja atau yang lainnya.',
            'harga' => '90000',
            'gambar' => 'PR18.jpg'
        ]);

        DB::table('produk_daur_ulangs')->insert([
            'user_id' => 1,
            'nama' => 'Tas Kerenjang Big',
            'deskripsi' => 'Tas kerenjang besar serba guna yang dapat digunakan untuk
            berbelanja atau yang lainnya, awet dan kuat untuk menaruh barang.',
            'harga' => '90000',
            'gambar' => 'PR19.jpg'
        ]);
    }
}
