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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('booking_date');
            $table->date('return_date');
            $table->enum('book_status', ['yes', 'no']);
            $table->foreignId('vehicle_id')->constrained();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('offer_id')->nullable()->constrained();
            $table->foreignId('driver_id')->nullable()->constrained();
            $table->enum('is_return', ['yes', 'no']);
            $table->string('price_for_dates');
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
        Schema::dropIfExists('bookings');
    }
};
