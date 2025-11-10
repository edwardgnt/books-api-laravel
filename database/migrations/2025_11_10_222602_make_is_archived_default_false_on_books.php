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
        // Backfill any existing NULLs
        DB::statement('UPDATE books SET is_archived = 0 WHERE is_archived IS NULL');

        // Set default to false (0) going forward (MySQL)
        DB::statement('ALTER TABLE books MODIFY is_archived TINYINT(1) NOT NULL DEFAULT 0');
    }

    public function down(): void
    {
        // If you want to remove the default on rollback (optional)
        DB::statement('ALTER TABLE books MODIFY is_archived TINYINT(1) NOT NULL');
    }
};
