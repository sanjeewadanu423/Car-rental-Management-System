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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('driver_address');
            $table->string('driver_phone');
            $table->string('driber_nic');
            $table->string('driver_photo');
            $table->integer('driver_age');
            $table->enum('driver_type', ['light', 'heavy']);
            $table->enum('driver_status', ['yes', 'no']);
            $table->string('price_per_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
};
