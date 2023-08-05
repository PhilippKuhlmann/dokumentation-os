<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('networks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('site_id')->constrained('sites')->onDelete('cascade');
            $table->string('description')->nullable();
            $table->bigInteger('vlanId')->nullable();
            $table->string('network')->nullable();
            $table->string('subnetmask')->nullable();
            $table->string('cidr')->nullable();
            $table->string('gateway')->nullable();
            $table->string('dns1')->nullable();
            $table->string('dns2')->nullable();
            $table->string('dhcpStart')->nullable();
            $table->string('dhcpEnd')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('networks');
    }
};
