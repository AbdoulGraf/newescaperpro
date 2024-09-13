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
        Schema::create('photos_videos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('placefor');
            $table->foreignId('room_id')->nullable()->unsigned()->constrained('rooms');
            $table->string('photos_img')->nullable();
            $table->string('videos_mp4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos_videos');
    }
};
