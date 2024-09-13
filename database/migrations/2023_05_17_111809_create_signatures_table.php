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
        Schema::create('signatures', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->binary('signature');
            $table->boolean('terms');
            $table->boolean('privacy');
            $table->boolean('refund');
            $table->boolean('liability');
            $table->foreignId('room_id')->nullable()->unsigned()->constrained('rooms');
            $table->foreignId('deleted_by')->nullable()->unsigned()->constrained('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signatures');
    }
};
