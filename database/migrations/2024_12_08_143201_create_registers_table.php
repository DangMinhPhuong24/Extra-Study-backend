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
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_id')->nullable()->comment('Môn học');
            $table->longText('class_name')->nullable();
            $table->decimal('quantity')->nullable();
            $table->decimal('registered_quantity')->nullable();
            $table->unsignedBigInteger('study_time_id')->nullable()->comment('Thời gian học');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
