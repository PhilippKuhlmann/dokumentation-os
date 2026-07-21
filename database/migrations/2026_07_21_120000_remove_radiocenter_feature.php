<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Entfernt das "Funk"-Feature (Funkzentrale/Radiocenter) vollständig.
     * Idempotent: auf frischen Installationen existiert die Tabelle gar nicht.
     */
    public function up(): void
    {
        Schema::dropIfExists('radiocenters');

        // Verwaiste Berechtigungen (radiocenter_viewAny/create/update/delete) aufräumen
        if (Schema::hasTable('permissions')) {
            $ids = DB::table('permissions')->where('name', 'like', 'radiocenter%')->pluck('id');
            if ($ids->isNotEmpty()) {
                if (Schema::hasTable('permission_role')) {
                    DB::table('permission_role')->whereIn('permission_id', $ids)->delete();
                }
                DB::table('permissions')->whereIn('id', $ids)->delete();
            }
        }
    }

    public function down(): void
    {
        // Das Feature wurde bewusst entfernt – kein Rollback.
    }
};
