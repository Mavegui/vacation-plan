<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This method is used to create the database tables.
     */
    public function up(): void
    {
        // Create the 'users' table
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key for the users table
            $table->string('firstName'); // User's first name
            $table->string('lastName'); // User's last name
            $table->string('email')->unique(); // User's email address, must be unique
            $table->timestamp('email_verified_at')->nullable(); // Timestamp for when the email was verified
            $table->string('password'); // User's password
            $table->rememberToken(); // Token used for "remember me" functionality
            $table->timestamps(); // Created at and updated at timestamps
        });

        // Create the 'password_reset_tokens' table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Email used as the primary key
            $table->string('token'); // Password reset token
            $table->timestamp('created_at')->nullable(); // Timestamp for when the token was created
        });

        // Create the 'sessions' table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Session ID used as the primary key
            $table->foreignId('user_id')->nullable()->index(); // Foreign key referencing the users table (nullable)
            $table->string('ip_address', 45)->nullable(); // IP address of the user (nullable)
            $table->text('user_agent')->nullable(); // User agent string (nullable)
            $table->longText('payload'); // Serialized session data
            $table->integer('last_activity')->index(); // Timestamp of the last activity (indexed)
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method is used to drop the tables if the migration is rolled back.
     */
    public function down(): void
    {
        Schema::dropIfExists('users'); // Drop the 'users' table
        Schema::dropIfExists('password_reset_tokens'); // Drop the 'password_reset_tokens' table
        Schema::dropIfExists('sessions'); // Drop the 'sessions' table
    }
};
