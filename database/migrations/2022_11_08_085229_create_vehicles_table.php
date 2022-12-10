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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_type_id')->constrained();
            $table->string('vehicle_reg_no');
            $table->string('vehicle_name');
            $table->enum('vehicle_l_h', ['light'], ['heavy']);
            $table->string('price_per_date');
            $table->string('vehicle_photo');
            $table->integer('passengers');
            $table->enum('transmission',['auto', 'manual']);
            $table->string('luggage');
            $table->string('price_for_extra_km');
            $table->string('engine_capacity');
            $table->enum('fuel', ['petrol', 'diesel']);
            $table->enum('vehicle_states',['yes', 'no']);
            $table->enum('air_condition', ['yes', 'no']);
            $table->timestamps();
        });
    }

    public function changeStatus(Request $request)
    {
        $vehicle = Vehicle::find($request->vehicle_id);
        $vehicle->vehicle_statess = $request->vehicle_statess;
        $vehicle->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
