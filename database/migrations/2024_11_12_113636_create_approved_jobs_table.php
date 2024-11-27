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
        Schema::create('approved_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('requested_jobs');
            $table->foreignId('approved_by_id')->constrained('users');
            $table->foreignId('assigned_to_id')->constrained('users');
            $table->longText('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approved_jobs');
    }
};
