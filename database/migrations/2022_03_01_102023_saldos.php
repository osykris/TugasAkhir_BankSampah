<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Saldos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('transaksi_id')->unsigned();
            $table->foreign('transaksi_id')->references('id')->on('transaksis')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('penarikan_id')->unsigned()->nullable();
            $table->foreign('penarikan_id')->references('id')->on('penarikan_saldos')->onDelete('cascade')->onUpdate('cascade');
            $table->string('saldo');
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
