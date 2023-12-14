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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->timestamp('issued_at');
            $table->string('xml_invoice');
            $table->string('pdf_invoice');

            $table->unsignedBigInteger('payment_status_id')->nullable();
            $table->unsignedBigInteger('user_id'); // ID del usuario al que se le entrega la constancia
            $table->unsignedBigInteger('course_id'); // ID del curso relacionado
           
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('payment_status_id')->references('id')->on('payment_statuses')->onDelete('set null');
      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
