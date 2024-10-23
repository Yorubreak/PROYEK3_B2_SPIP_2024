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
        Schema::create('pencapaian_tujuan', function (Blueprint $table) {
          $table->id();
          $table->string('unsur');
          $table->integer('skor')->nullable();
          $table->integer('nilai_unsur')->nullable();
          $table->integer('nilai_komponen')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencapaian_tujuan');
    }
};
