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
        Schema::create('radiocenters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('site_id')->constrained('sites')->onDelete('cascade');
            $table->string('frequency')->nullable();
            $table->string('channel_spacing')->nullable();
            $table->string('power')->nullable();
            $table->string('evaluator')->nullable();
            $table->string('encoder')->nullable();
            $table->string('receipt')->nullable();
            $table->string('pilot_tone')->nullable();
            $table->string('transmission_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('radiocenters');
    }
};
