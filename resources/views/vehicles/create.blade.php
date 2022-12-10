@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Vehicle</h2>
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


    <form action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data">
    	@csrf


         <div class="row">
		    <div class="col-xs-6 col-sm-6 col-md-6">
		        <div class="form-group">
		            <strong>Vehicle Name:</strong>
		            <input type="text" name="vehicle_name" class="form-control" placeholder="Name">
		        </div>
		    </div>

		    <div class="col-xs-6 col-sm-6 col-md-6 row">
		        <div class="form-group">
		            <strong>Vehicle Model Name:</strong>
		            <select name="vehicle_type_id" id="vehicle_type_id" class="form-control">
                        @foreach ($types as $value)

                        <option value="{{ $value->id }}">{{ $value->vehicle_type_name}}</option>
                        @endforeach
                    </select>
		        </div>
		    </div>

            {{-- <div class="col-xs-6 col-sm-6 col-md-6">
		        <div class="form-group">
		            <strong>Vehicle Model Name:</strong>
		            <input type="text" name="vehicle_type_name" class="form-control" >
		        </div>
		    </div> --}}
            <div class="col-xs-6 col-sm-6 col-md-6">
		        <div class="form-group">
		            <strong>Registration Number:</strong>
		            <input type="text" name="vehicle_reg_no" class="form-control">
		        </div>
		    </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
		        <div class="form-group">
		            <strong>Driver Type:</strong>
                    <select name="vehicle_l_h" id="vehicle_l_h" class="form-control">
                        <option value="light">Light</option>
                        <option value="heavy">Heavy</option>
                    </select>
		        </div>
		    </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
		        <div class="form-group">
		            <strong>Price Per Date:</strong>
		            <input type="text" name="price_per_date" class="form-control">
		        </div>
		    </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
		        <div class="form-group">
		            <strong>Passenger:</strong>
		            <input type="text" name="passengers" class="form-control">
		        </div>
		    </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
		        <div class="form-group">
		            <strong>Transmission:</strong>
                    <select name="transmission" id="transmission" class="form-control">
                        <option value="auto">Auto</option>
                        <option value="manual">Manual</option>
                    </select>
		        </div>
		    </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
		        <div class="form-group">
		            <strong>Luggage:</strong>
		            <input type="text" name="luggage" class="form-control">
		        </div>
		    </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
		        <div class="form-group">
		            <strong>Air Condition:</strong>
                    <select name="air_condition" id="air_condition" class="form-control">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
		        </div>
		    </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
		        <div class="form-group">
		            <strong>Fuel:</strong>
                    <select name="fuel" id="fuel" class="form-control">
                        <option value="petrol">Petrol</option>
                        <option value="diesel">Diesel</option>
                    </select>
		        </div>
		    </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
		        <div class="form-group">
		            <strong>Status:</strong>
                    <select name="vehicle_states" id="vehicle_states" class="form-control">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
		        </div>
		    </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
		        <div class="form-group">
		            <strong>Price Extra Km:</strong>
		            <input type="text" name="price_for_extra_km" class="form-control">
		        </div>
		    </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
		        <div class="form-group">
		            <strong>Engine Capacity:</strong>
		            <input type="text" name="engine_capacity" class="form-control">
		        </div>
		    </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
		        <div class="form-group">
		            <strong>Vehicle Photo:</strong>
		            <form action="/action_page.php">
                        <input class="form-control" id="myFile" type="file" name="file">
                    </form>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>

		</div>


    </form>


@endsection
