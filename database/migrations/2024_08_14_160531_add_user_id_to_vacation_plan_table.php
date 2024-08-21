<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This method is responsible for applying the migration changes. In this case, it adds a new column
     * `user_id` to the `vacation_plan` table. The column is set as an unsigned big integer and it is 
     * intended to store the ID of the user associated with the vacation plan. A foreign key constraint
     * is also added to ensure referential integrity, linking the `user_id` column to the `id` column
     * in the `users` table. The `onDelete('cascade')` option ensures that if a user is deleted, all
     * associated vacation plans are also deleted.
     */
    public function up(): void
    {
        Schema::table('vacation_plan', function (Blueprint $table) {
            if (!Schema::hasColumn('vacation_plan', 'user_id')) {
                $table->unsignedBigInteger('user_id')->after('id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method is responsible for rolling back the migration changes. It removes the `user_id` column
     * from the `vacation_plan` table, along with the associated foreign key constraint. This is useful 
     * if you need to revert the schema changes applied by the `up` method.
     */
    public function down(): void
    {
        Schema::table('vacation_plan', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
