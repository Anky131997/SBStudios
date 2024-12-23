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
        Schema::create('finished_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_code');
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('service_id')->constrained('services');
            $table->foreignId('assigned_to_id')->constrained('users');
            $table->foreignId('approved_by_id')->constrained('users');
            $table->longText('desc');
            $table->string('timespan');
            $table->string('job_report');
            $table->string('job_updates');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finished_jobs');
    }
};
