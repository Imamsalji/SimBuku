<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTempPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_temp_penjualan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_buku')->unsigned();
            $table->foreign('id_buku')->references('id_buku')->on('tbl_buku')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jumlah_beli');
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
        Schema::dropIfExists('tbl_temp_penjualan');
    }
}
