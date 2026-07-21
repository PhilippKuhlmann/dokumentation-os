<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('securepoint_umas', function (Blueprint $table) {
            if (! Schema::hasColumn('securepoint_umas', 'manufacturer')) {
                $table->string('manufacturer')->nullable()->after('name');
            }
        });
    }

    public function down(): void
    {
        Schema::table('securepoint_umas', function (Blueprint $table) {
            if (Schema::hasColumn('securepoint_umas', 'manufacturer')) {
                $table->dropColumn('manufacturer');
            }
        });
    }
};
