<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{

    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lokasi_id');
            $table->string('tujuan_id');
            $table->integer('pesawat_id');//->unsigned();
            $table->string('kelas_id');
            $table->string('fasilitas');
            $table->string('harga');
            $table->timestamps();
            //$table->foreign('pesawat_id')->references('id')->on('pesawats')->onUpdate('cascade')->onDelete('cascade');
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
