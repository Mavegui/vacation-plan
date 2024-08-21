<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This method is responsible for applying the migration changes. It creates a new table named `personal_access_tokens`
     * with the following columns:
     * 
     * - `id`: An auto-incrementing primary key for the table.
     * - `tokenable_type` and `tokenable_id`: These columns are used for polymorphic relationships, allowing the token to be associated with various models.
     * - `name`: A string column to store the name of the token.
     * - `token`: A unique string column to store the token value, typically used for API authentication.
     * - `abilities`: A text column to store any specific abilities or permissions associated with the token, which may be encoded in JSON format.
     * - `last_used_at`: A timestamp column to record when the token was last used.
     * - `expires_at`: A timestamp column to record when the token expires.
     * - `timestamps`: Two timestamp columns (`created_at` and `updated_at`) to track when the record was created and last updated.
     */
    public function up(): void
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method is responsible for rolling back the migration changes. It deletes the `personal_access_tokens` table if it exists.
     * This rollback process is useful if you need to revert the schema changes applied by the `up` method.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
