<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This method is responsible for applying the migration changes. It creates three tables related to job processing:
     * 
     * - `jobs`: Stores information about queued jobs.
     *   - `id`: Auto-incrementing primary key for the job.
     *   - `queue`: The name of the queue to which the job belongs.
     *   - `payload`: Long text column storing serialized job data.
     *   - `attempts`: Number of times the job has been attempted.
     *   - `reserved_at`: Timestamp when the job was reserved for processing, nullable.
     *   - `available_at`: Timestamp when the job becomes available for processing.
     *   - `created_at`: Timestamp when the job was created.
     * 
     * - `job_batches`: Stores information about job batches, used to manage groups of jobs.
     *   - `id`: Primary key for the batch.
     *   - `name`: Name of the batch.
     *   - `total_jobs`: Total number of jobs in the batch.
     *   - `pending_jobs`: Number of jobs pending in the batch.
     *   - `failed_jobs`: Number of jobs that have failed in the batch.
     *   - `failed_job_ids`: Long text column storing IDs of failed jobs.
     *   - `options`: Medium text column for additional options related to the batch, nullable.
     *   - `cancelled_at`: Timestamp when the batch was cancelled, nullable.
     *   - `created_at`: Timestamp when the batch was created.
     *   - `finished_at`: Timestamp when the batch was finished, nullable.
     * 
     * - `failed_jobs`: Stores information about jobs that have failed.
     *   - `id`: Auto-incrementing primary key for the failed job.
     *   - `uuid`: Unique identifier for the failed job.
     *   - `connection`: The connection used to dispatch the job.
     *   - `queue`: The queue to which the job was assigned.
     *   - `payload`: Long text column storing serialized job data.
     *   - `exception`: Long text column storing exception details.
     *   - `failed_at`: Timestamp when the job failed, with a default value of the current time.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue')->index();
            $table->longText('payload');
            $table->unsignedTinyInteger('attempts');
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->longText('failed_job_ids');
            $table->mediumText('options')->nullable();
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method is responsible for rolling back the migration changes. It deletes the tables created by the `up` method.
     * This rollback process is useful if you need to revert the schema changes applied by the `up` method.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};
