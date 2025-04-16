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
    Schema::create('security_settings', function (Blueprint $table) {
        $table->id();
        $table->unsignedInteger('password_history')->default(24);
        $table->unsignedInteger('password_max_age')->default(30);
        $table->unsignedInteger('password_min_length_normal')->default(10);
        $table->unsignedInteger('password_min_length_admin')->default(14);
        $table->string('password_complexity')->default('A-Z, a-z, 0-9, !$#%');
        $table->unsignedInteger('account_lockout_threshold')->default(10);
        $table->unsignedInteger('lockout_counter_period')->default(30);
        $table->unsignedInteger('session_expiry_minutes')->default(15);
        $table->boolean('avoid_simultaneous_sessions')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('security_settings');
    }
};
