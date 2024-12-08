<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
      DB::unprepared("
          CREATE OR REPLACE FUNCTION log_update_komponen()
          RETURNS TRIGGER AS $$
          BEGIN
              INSERT INTO logs (tahun, bulan, last_update, id_admin)
              VALUES (NEW.tahun, NEW.bulan, NOW(), NEW.updated_by);
              RETURN NEW;
          END;
          $$ LANGUAGE plpgsql;
      ");

      DB::unprepared("
          CREATE TRIGGER update_komponen_log
          AFTER UPDATE ON komponens
          FOR EACH ROW
          EXECUTE FUNCTION log_update_komponen();
      ");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        DB::unprepared("DROP TRIGGER IF EXISTS update_komponen_log");
    }
};
