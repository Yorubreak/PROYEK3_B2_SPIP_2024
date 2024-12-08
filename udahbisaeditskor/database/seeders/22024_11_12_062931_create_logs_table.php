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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_komponen');
            $table->integer('id_admin');
            $table->integer('tahun');
            $table->string('bulan');
            $table->timestamp('last_update')->default(DB::raw('CURRENT_TIMESTAMP'));


            //Foreign Key
            $table->foreign(['id_komponen'])->references(['id_komponen'])->on('komponens')->onDelete('cascade');
            $table->foreign(['tahun', 'bulan'])->references(['tahun', 'bulan'])->on('komponens')->onDelete('cascade');
            $table->foreign('id_admin')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
 