<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSampahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_sampahs')->insert([
            'nama_jenisSampah' => 'Pet',
            'harga' => '2500'
        ]);

        DB::table('data_sampahs')->insert([
            'nama_jenisSampah' => 'Botol Minuman',
            'harga' => '2500'
        ]);

        DB::table('data_sampahs')->insert([
            'nama_jenisSampah' => 'Besi',
            'harga' => '4000'
        ]);

        DB::table('data_sampahs')->insert([
            'nama_jenisSampah' => 'Buku',
            'harga' => '2000'
        ]);

        DB::table('data_sampahs')->insert([
            'nama_jenisSampah' => 'HVS',
            'harga' => '2500'
        ]);

        DB::table('data_sampahs')->insert([
            'nama_jenisSampah' => 'Kertas Campur',
            'harga' => '2000'
        ]);

        DB::table('data_sampahs')->insert([
            'nama_jenisSampah' => 'Alumunium',
            'harga' => '12000'
        ]);

        DB::table('data_sampahs')->insert([
            'nama_jenisSampah' => 'Kardus',
            'harga' => '3000'
        ]);

        DB::table('data_sampahs')->insert([
            'nama_jenisSampah' => 'Kaleng',
            'harga' => '2000'
        ]);

        DB::table('data_sampahs')->insert([
            'nama_jenisSampah' => 'Botol Kaca',
            'harga' => '2500'
        ]);

        DB::table('data_sampahs')->insert([
            'nama_jenisSampah' => 'Duplex',
            'harga' => '800'
        ]);

        DB::table('data_sampahs')->insert([
            'nama_jenisSampah' => 'Sak',
            'harga' => '400'
        ]);

        DB::table('data_sampahs')->insert([
            'nama_jenisSampah' => 'Campuran',
            'harga' => '2000'
        ]);

        DB::table('data_sampahs')->insert([
            'nama_jenisSampah' => 'Sandal',
            'harga' => '600'
        ]);

        DB::table('data_sampahs')->insert([
            'nama_jenisSampah' => 'Eggtray',
            'harga' => '500'
        ]);
    }
}
