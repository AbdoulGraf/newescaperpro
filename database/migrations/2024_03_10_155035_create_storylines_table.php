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
        Schema::create('storylines', function (Blueprint $table) {
            $table->id();
            $table->string('header');
            $table->string('header_title');
            $table->text('storyline_description');
            $table->string('placefor');
            $table->foreignId('room_id')->nullable()->unsigned()->constrained('rooms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storylines');
    }
};
