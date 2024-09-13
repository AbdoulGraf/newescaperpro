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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status')->default(1);

            $table->foreignId('place_id')->nullable()->unsigned()->constrained('places');
            $table->foreignId('room_id')->nullable()->unsigned()->constrained('rooms');
            $table->foreignId('client_info_id')->nullable()->unsigned()->constrained('client_infos');
            $table->foreignId('payment_info_id')->nullable()->unsigned()->constrained('payment_infos');
            $table->date('reservation_date');
            $table->foreignId('hour_id')->nullable()->unsigned()->constrained('hours');
            $table->string('players');
            $table->string('payment_method');
            $table->string('promotion_code')->nullable();
            $table->string('discount')->nullable();
            $table->text('comment')->nullable();

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
        Schema::dropIfExists('reservations');
    }
};
