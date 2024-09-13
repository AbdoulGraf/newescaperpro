<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('player');
            $table->string('price');
            $table->foreignId('place_id')->nullable()->unsigned()->constrained('places');
            $table->foreignId('room_id')->nullable()->unsigned()->constrained('rooms');
            $table->foreignId('created_by')->nullable()->unsigned()->constrained('users');
            $table->foreignId('updated_by')->nullable()->unsigned()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->unsigned()->constrained('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
