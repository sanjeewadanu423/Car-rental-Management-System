@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Vehicle Profile</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('vehicles') }}"> Back</a>
            </div>
        </div>
    </div>

    @foreach ($vehicles as $vehicle )

    <div class="image">
        <img class="rounded-circle mt-5" src="{{ asset('img/'.$vehicle->vehicle_photo) }}" width="200px" height="120px" alt="">
    </div>
    <div><br></div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vehicle Name:</strong>
                {{ $vehicle->vehicle_name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vehicle Type Name:</strong>
                {{ $vehicle->vehicle_type_name }}
            </div>
        </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Registration Number:</strong>
                    {{ $vehicle->vehicle_reg_no }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Driver Type:</strong>
                    {{ $vehicle->vehicle_l_h }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price Per Date:</strong>
                    {{ $vehicle->price_per_date }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Passenger:</strong>
                    {{ $vehicle->passengers }}
                </div>
            </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Transmission:</strong>
                        {{ $vehicle->transmission }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Luggage:</strong>
                        {{ $vehicle->luggage }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Air Condition:</strong>
                        {{ $vehicle->air_condition }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fuel:</strong>
                        {{ $vehicle->fuel }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status:</strong>
                        {{ $vehicle->vehicle_states }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Price Extra Km:</strong>
                        {{ $vehicle->price_for_extra_km }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Engine Capacity:</strong>
                        {{ $vehicle->engine_capacity }}
                    </div>
                </div>
    </div>
    @endforeach

@endsection
