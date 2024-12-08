<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE OR REPLACE FUNCTION update_nilai_komponen()
            RETURNS TRIGGER AS $$
            DECLARE
                total_nilai_unsur FLOAT;
            BEGIN
                -- Hitung total nilai_unsur berdasarkan root_id yang sama
                SELECT COALESCE(SUM(nilai_unsur), 0)
                INTO total_nilai_unsur
                FROM komponens
                WHERE root_id = NEW.root_id;

                -- Update nilai_komponen untuk baris dengan root_id yang sama
                UPDATE komponens
                SET nilai_komponen = total_nilai_unsur * bobot_komponen
                WHERE id_komponen = NEW.root_id;

                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;
        ');

        DB::unprepared('
            CREATE TRIGGER before_update_nilai_komponen
            BEFORE UPDATE OF nilai_unsur ON komponens
            FOR EACH ROW
            EXECUTE FUNCTION update_nilai_komponen();
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_update_nilai_komponen ON komponens');
        DB::unprepared('DROP FUNCTION IF EXISTS update_nilai_komponen');
    }
};
