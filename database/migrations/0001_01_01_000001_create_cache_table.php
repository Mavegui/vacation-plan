<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This method is used to create the database tables for caching.
     */
    public function up(): void
    {
        // Create the 'cache' table
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary(); // Cache key, used as the primary key
            $table->mediumText('value'); // Cached value, stored as a medium text
            $table->integer('expiration'); // Timestamp or duration for when the cache entry expires
        });

        // Create the 'cache_locks' table
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary(); // Lock key, used as the primary key
            $table->string('owner'); // Identifier for the entity that owns the lock
            $table->integer('expiration'); // Timestamp or duration for when the lock expires
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method is used to drop the tables if the migration is rolled back.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache'); // Drop the 'cache' table
        Schema::dropIfExists('cache_locks'); // Drop the 'cache_locks' table
    }
};
