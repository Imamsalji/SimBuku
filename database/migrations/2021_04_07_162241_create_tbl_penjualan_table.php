<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_penjualan', function (Blueprint $table) {
            $table->id();
            $table->string('id_penjualan',100);
            $table->integer('id_buku')->unsigned();
            $table->integer('id_kasir')->unsigned();
            $table->foreign('id_buku')->references('id_buku')->on('tbl_buku')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kasir')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jumlah_beli');
            $table->integer('bayar');
            $table->integer('kembalian');
            $table->integer('total_harga');
            $table->date('tanggal');
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
        Schema::dropIfExists('tbl_penjualan');
    }
}
