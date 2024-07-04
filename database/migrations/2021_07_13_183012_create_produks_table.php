<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori');
            $table->string('nama');
            $table->string('deskripsi');
            $table->integer('harga');
            $table->string('gambar');
            $table->timestamps();

            $table->foreign('kategori')
            ->references('id')
            ->on('kategoris')
            ->onDelete('cascade'); // Cascade delete
        });

   

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
