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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('order');
            $table->string('title');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('places');
    }
};
