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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('username', 50)->unique();
            $table->string('password_hash', 255);
            $table->foreignId('gender_id')->nullable()->constrained('genders', 'gender_id');
            $table->string('email', 150)->unique()->nullable();
            $table->foreignId('role_id')->nullable()->constrained('roles', 'role_id');
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_login')->nullable();
            $table->text('profile_picture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
