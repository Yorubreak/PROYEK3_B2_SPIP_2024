<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Buat fungsi trigger
        DB::unprepared('
            CREATE OR REPLACE FUNCTION update_nilai_unsur()
            RETURNS TRIGGER AS $$
            BEGIN
                -- Hitung nilai_unsur berdasarkan skor * bobot_unsur
                NEW.nilai_unsur :=(NEW.skor * NEW.bobot_unsur);
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;
        ');

        // Tambahkan trigger ke tabel komponens
        DB::unprepared('
            CREATE TRIGGER before_update_nilai_unsur
            BEFORE UPDATE OF skor ON komponens
            FOR EACH ROW
            EXECUTE FUNCTION update_nilai_unsur();
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus trigger dan fungsi saat rollback
        DB::unprepared('DROP TRIGGER IF EXISTS before_update_nilai_unsur ON komponens');
        DB::unprepared('DROP FUNCTION IF EXISTS update_nilai_unsur');
    }
};
