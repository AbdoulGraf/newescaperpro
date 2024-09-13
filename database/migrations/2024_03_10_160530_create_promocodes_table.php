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
        Schema::create('promocodes', function (Blueprint $table) {
            $table->id();
            $table->string('promocode')->unique();
            $table->decimal('discount', 8, 2); // Assuming discount is a percentage or fixed amount
            $table->date('start_date');
            $table->integer('validity_period')->comment('Validity period in days');
            $table->string('store_validity')->default('60 days'); // Or simply $table->string('store_validity');
            $table->boolean('status')->default(1)->comment('1 for active, 0 for inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promocodes');
    }
};
