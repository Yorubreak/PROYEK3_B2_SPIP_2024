<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bulan', function (Blueprint $table) {
          $table->id();
          $table->string('bulan');       // Menyimpan bulan (1-12)
          $table->unsignedBigInteger('tahun_id');  // Kunci asing yang menghubungkan ke tabel tahun
          $table->timestamps();

          // Definisikan relasi ke tabel tahun
          $table->foreign('tahun_id')->references('id')->on('tahun')->onDelete('cascade');
      });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bulan');
    }
};
