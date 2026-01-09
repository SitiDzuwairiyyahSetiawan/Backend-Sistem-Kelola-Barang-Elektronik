<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelBarang extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('kategori_barang');
            $table->string('satuan');
            $table->decimal('harga', 10, 2);
            $table->text('deskripsi')->nullable();
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
        Schema::dropIfExists('tabel_barang');
    }
}