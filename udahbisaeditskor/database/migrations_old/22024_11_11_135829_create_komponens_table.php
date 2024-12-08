<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('komponens', function (Blueprint $table) {
            $table->id('id_komponen');
            $table->string('nama_komponen');
            $table->string('bulan');
            $table->integer('tahun');
            $table->integer('kom_id_komponen')->nullable();
            $table->string('tipe_komponen');
            $table->boolean('has_child')->nullable();
            $table->float('bobot_komponen')->nullable();
            $table->float('bobot_unsur')->nullable();
            $table->float('nilai_komponen')->nullable();
            $table->float('nilai_unsur')->nullable();
            $table->integer('skor')->nullable();
            $table->unsignedBigInteger('id_org');
            $table->integer('root_id')->nullable();

            // $table->unique(['tahun', 'bulan']);


            //Foreign Key
            $table->foreign(['tahun', 'bulan'])->references(['tahun', 'bulan'])->on('periodes')->onDelete('cascade');
            $table->foreign('kom_id_komponen')->references('id_komponen')->on('komponens')->onDelete('cascade');
            $table->foreign('id_org')->references('id_org')->on('organisasis')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komponens');
    }
};
