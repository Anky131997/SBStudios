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
        Schema::create('requested_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_code');
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('service_id')->constrained('services');
            $table->longText('desc');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requested_jobs');
    }
};
