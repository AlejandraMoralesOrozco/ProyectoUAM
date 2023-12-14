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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->date('start_date')->nullable();
            $table->date('ending_date')->nullable();
            $table->text('course_objective');
            $table->text('essential_requirements');
            $table->text('optional_requirements');
            $table->text('lessons');


            $table->unsignedBigInteger('status_id')->nullable();
            $table->unsignedBigInteger('period_id')->nullable();
            $table->unsignedBigInteger('academic_activity_id')->nullable();
            $table->unsignedBigInteger('program_id')->nullable();
            $table->unsignedBigInteger('duration_id')->nullable();
            $table->unsignedBigInteger('modality_id')->nullable();
            $table->unsignedBigInteger('audience_id')->nullable();
            $table->unsignedBigInteger('level_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();

            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('set null');
            $table->foreign('period_id')->references('id')->on('periods')->onDelete('set null');
            $table->foreign('academic_activity_id')->references('id')->on('academic_activities')->onDelete('set null');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('set null');
            $table->foreign('duration_id')->references('id')->on('durations')->onDelete('set null');
            $table->foreign('modality_id')->references('id')->on('modalities')->onDelete('set null');
            $table->foreign('audience_id')->references('id')->on('audiences')->onDelete('set null');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
