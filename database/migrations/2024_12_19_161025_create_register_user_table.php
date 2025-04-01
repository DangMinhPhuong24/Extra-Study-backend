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
        Schema::create('register_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('register_id')->nullable()->comment('Đăng ký học');
            $table->unsignedBigInteger('user_id')->nullable()->comment('Vai trò học sinh');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register_user');
    }
};
