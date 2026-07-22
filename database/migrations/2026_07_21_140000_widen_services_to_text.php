<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * services fasst Freitext (u. a. vom Auto-Doku-Agent: Version, CPU, RAM,
     * Storage …) und sprengte als VARCHAR(255) schnell die Grenze -> "Data too
     * long" auf MySQL. Auf TEXT umstellen. SQLite kennt kein Längenlimit.
     */
    public function up(): void
    {
        if (Schema::getConnection()->getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE servers MODIFY services TEXT NULL');
            DB::statement('ALTER TABLE vms MODIFY services TEXT NULL');
        }
    }

    public function down(): void
    {
        if (Schema::getConnection()->getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE servers MODIFY services VARCHAR(255) NULL');
            DB::statement('ALTER TABLE vms MODIFY services VARCHAR(255) NULL');
        }
    }
};
