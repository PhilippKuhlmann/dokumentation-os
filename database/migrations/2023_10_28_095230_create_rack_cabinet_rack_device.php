<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rack_cabinet_rack_device', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rack_cabinet_id');
            $table->unsignedBigInteger('rack_device_id');
            $table->foreign('rack_cabinet_id')->references('id')->on('rack_cabinets')->onDelete('cascade');
            $table->foreign('rack_device_id')->references('id')->on('rack_devices')->onDelete('cascade');
            $table->integer('position');
            $table->integer('filled_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rack_cabinet_rack_device');
    }
};
