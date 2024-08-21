<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This method is responsible for applying the migration changes. It creates a new table named `vacation_plan`
     * with the following columns:
     * 
     * - `id`: An auto-incrementing primary key for the table.
     * - `title`: A string column to store the title of the vacation plan.
     * - `date`: A date column to store the date of the vacation plan.
     * - `description`: A text column to store a detailed description of the vacation plan.
     * - `locale`: A string column to store the location of the vacation plan.
     * - `timestamps`: Two timestamp columns (`created_at` and `updated_at`) to track when the record was created and last updated.
     */
    public function up(): void
    {
        Schema::create('vacation_plan', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->text('description');
            $table->string('locale');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method is responsible for rolling back the migration changes. It deletes the `vacation_plan` table if it exists.
     * This rollback process is useful if you need to revert the schema changes applied by the `up` method.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacation_plan');
    }
};
