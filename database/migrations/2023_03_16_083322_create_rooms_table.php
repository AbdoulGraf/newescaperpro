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
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status')->default(1);
            $table->dateTime('start')->nullable();
            $table->tinyInteger('order');
            $table->foreignId('place_id')->nullable()->unsigned()->constrained('places');
            $table->string('title');
            $table->string('slug');
            $table->string('duration')->nullable();
            $table->string('level')->nullable();
            $table->string('person')->nullable();
            $table->text('description')->nullable();
            $table->string('poster')->nullable();
            $table->string('banner')->nullable();
            $table->string('text_picture')->nullable();
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
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
