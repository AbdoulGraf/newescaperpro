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

        Schema::create('request_videos', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phoneNumber');
            $table->string('email');
            $table->string('store')->nullable();
            $table->string('room')->nullable();
            $table->date('date');
            $table->time('time');
            $table->string('video_type');
            $table->string('payment_method');
            $table->string('address_country');
            $table->string('address_city');
            $table->text('video_description');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_videos');
    }
};
