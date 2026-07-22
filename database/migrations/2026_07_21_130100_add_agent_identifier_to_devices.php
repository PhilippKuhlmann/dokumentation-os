<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('servers', function (Blueprint $table) {
            $table->string('agent_identifier')->nullable()->index();
        });
        Schema::table('vms', function (Blueprint $table) {
            $table->string('agent_identifier')->nullable()->index();
        });
    }

    public function down(): void
    {
        Schema::table('servers', function (Blueprint $table) {
            $table->dropColumn('agent_identifier');
        });
        Schema::table('vms', function (Blueprint $table) {
            $table->dropColumn('agent_identifier');
        });
    }
};
