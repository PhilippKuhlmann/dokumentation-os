<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Entfernt ungenutzte Spalten aus bestehenden Datenbanken.
     * Bei frischen Installationen werden diese Spalten gar nicht mehr angelegt
     * (siehe Create-Migrationen), daher die hasColumn-Absicherung.
     */
    public function up(): void
    {
        // Accesspoint: Raum-Zuordnung wird nicht benötigt
        if (Schema::hasColumn('accesspoints', 'room_id')) {
            Schema::table('accesspoints', function (Blueprint $table) {
                $table->dropForeign(['room_id']);
                $table->dropColumn('room_id');
            });
        }

        // Telefonanlage: zweite und dritte IP werden über "Weitere IP-Adressen" abgebildet
        foreach (['ip2', 'ip3'] as $column) {
            if (Schema::hasColumn('phone_systems', $column)) {
                Schema::table('phone_systems', function (Blueprint $table) use ($column) {
                    $table->dropColumn($column);
                });
            }
        }
    }

    public function down(): void
    {
        if (! Schema::hasColumn('accesspoints', 'room_id')) {
            Schema::table('accesspoints', function (Blueprint $table) {
                $table->foreignId('room_id')->nullable()->constrained('rooms')->onDelete('cascade');
            });
        }

        foreach (['ip2', 'ip3'] as $column) {
            if (! Schema::hasColumn('phone_systems', $column)) {
                Schema::table('phone_systems', function (Blueprint $table) use ($column) {
                    $table->string($column)->nullable();
                });
            }
        }
    }
};
