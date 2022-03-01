<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaksis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jual_id')->unsigned();
            $table->foreign('jual_id')->references('id')->on('penjualan_sampahs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('metode_penyetoran');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('no_hp');
            $table->string('alamat_lengkap');
            $table->date('tanggal');
            $table->string('status');
            $table->string('total_berat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
