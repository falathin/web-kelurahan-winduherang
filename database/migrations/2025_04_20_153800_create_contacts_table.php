<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('rw');
            $table->string('rt');
            $table->dateTime('waktu');
            $table->string('lokasi');
            $table->text('deskripsi');
            $table->json('bukti')->nullable(); // Simpan array path gambar dalam JSON
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengaduans');
    }
}