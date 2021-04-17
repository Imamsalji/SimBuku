<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPasokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pasok', function (Blueprint $table) {
            $table->increments('id_pasok');
            $table->integer('id_distributor')->unsigned();
            $table->integer('id_buku')->unsigned();
            $table->foreign('id_distributor')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_buku')->references('id_buku')->on('tbl_buku')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jumlah');
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
        Schema::dropIfExists('tbl_pasok');
    }
}
