<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This method is responsible for applying the migration changes. It modifies the `vacation_plan` table
     * by adding a new column `user_id`. This column is an unsigned big integer and is intended to store 
     * the ID of the user associated with the vacation plan.
     *
     * Additionally, an index is created on the `user_id` column to optimize queries that filter or sort 
     * based on this column.
     *
     * A foreign key constraint is also added, linking the `user_id` column to the `id` column in the 
     * `users` table. The `onDelete('cascade')` option ensures that if a user is deleted, all associated 
     * vacation plans are also deleted.
     */
    public function up(): void
    {
        Schema::table('vacation_plan', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');

            // Create an index for the user_id column to optimize query performance
            $table->index('user_id');

            // Add a foreign key constraint linking user_id to the id column on the users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method is responsible for rolling back the migration changes. It removes the `user_id` column 
     * from the `vacation_plan` table, along with its associated foreign key constraint and index.
     *
     * This rollback process is useful if you need to revert the schema changes applied by the `up` method.
     */
    public function down(): void
    {
        Schema::table('vacation_plan', function (Blueprint $table) {
            // Drop the foreign key constraint associated with the user_id column
            $table->dropForeign(['user_id']);

            // Drop the index created for the user_id column
            $table->dropIndex(['user_id']);

            // Remove the user_id column
            $table->dropColumn('user_id');
        });
    }
};
