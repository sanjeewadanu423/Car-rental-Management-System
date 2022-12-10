@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Vehicle Profile</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('vehicles') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('vehicles.update',$vehicle->id) }}" method="POST">
    	@csrf
        @method('PUT')


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vehicle Name:</strong>
                <input type="text" name="vehicle_name" value="{{ $vehicle->vehicle_name }}" class="form-control">
            </div>
        </div>
         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Driver Address:</strong>
		            <select class="form-control" name="vehicle_type_id_id">
                        @foreach ($types as $value)

                        <option value="{{ $value->id }}">{{ $value->vehicle_type_name}}</option>
                        @endforeach

                    </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Registration Number:</strong>
                    <input type="text" name="vehicle_reg_no" value="{{ $vehicle->vehicle_reg_no }}" class="form-control">

		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Driver Type: </strong>
		            <select name="vehicle_l_h" id="vehicle_l_h" class="form-control" selected="{{ $vehicle->vehicle_l_h }}">
                        <option value="light">Light</option>
                        <option value="heavy">Heavy</option>
                    </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Price Per Date:</strong>
                    <input type="text" name="price_per_date" value="{{ $vehicle->price_per_date }}" class="form-control">

		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Passenger:</strong>
                    <input type="text" name="passengers" value="{{ $vehicle->passengers }}" class="form-control">

		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Transmission: </strong>
		            <select name="transmission" id="transmission" class="form-control">
                        <option value="auto">Auto</option>
                        <option value="manual">Manual</option>
                    </select>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Luggage:</strong>
                    <input type="text" name="luggage" value="{{ $vehicle->luggage }}" class="form-control">

		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Air Condition: </strong>
		            <select name="air_condition" id="air_condition" class="form-control">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Fuel: </strong>
		            <select name="fuel" id="fuel" class="form-control">
                        <option value="petrol">Petrol</option>
                        <option value="diesel">Diesel</option>
                    </select>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Status: </strong>
		            <select name="vehicle_states" id="vehicle_states" class="form-control">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Price Extra Km:</strong>
                    <input type="text" name="price_for_extra_km" value="{{ $vehicle->price_for_extra_km }}" class="form-control">

		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Engine Capacity:</strong>
                    <input type="text" name="engine_capacity" value="{{ $vehicle->engine_capacity }}" class="form-control">

		        </div>
		    </div>
            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Driver Photo: </strong>
                    <form action="/action_page.php">
                        <input class="form-control" type="file" id="myFile" name="driver_photo" value="{{ $driver->driver_photo }}">
                      </form>
		        </div>
		    </div> --}}
		    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Driver Type:</strong>
                    <select class="form-control" name="driver_type">
                        <option value="heavy">Heavy</option>
                        <option value="light">Light</option>
                    </select>

		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Price Per Date:</strong>
                    <input type="text" name="price_per_date" value="{{ $driver->price_per_date }}" class="form-control" placeholder="3000">

		        </div>
		    </div> --}}
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


@endsection
