<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailTransaksis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaksi_id')->unsigned();
            $table->foreign('transaksi_id')->references('id')->on('transaksis')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('sampah_id')->unsigned();
            $table->foreign('sampah_id')->references('id')->on('data_sampahs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('jenis_sampah');
            $table->integer('total_berat');
            $table->integer('harga');
            $table->integer('total_harga');
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
