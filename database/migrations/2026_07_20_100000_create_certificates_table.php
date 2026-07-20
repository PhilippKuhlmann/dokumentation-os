<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->string('name')->nullable();          // Bezeichnung, z. B. "Wildcard *.kunde.de"
            $table->string('common_name')->nullable();   // Domain / CN
            $table->string('issuer')->nullable();        // Aussteller / CA
            $table->string('type')->nullable();          // SSL/TLS, Wildcard, Code Signing, S/MIME …
            $table->date('issued_date')->nullable();     // Ausgestellt am
            $table->date('expiry_date')->nullable();     // Ablaufdatum
            $table->text('notes')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
