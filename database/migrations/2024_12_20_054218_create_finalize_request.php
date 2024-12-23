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
        Schema::create('finalize_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('approved_jobs');
            $table->string('job_report');
            $table->string('remarks');
            $table->string('status');
            $table->string('daily_updates')->nullable();
            $table->unsignedBigInteger('declined_by_id')->nullable();
            $table->foreign('declined_by_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamp('declined_at')->nullable();
            $table->string('declineRemarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('finalize_requests', function (Blueprint $table) {
            //
        });
    }
};
