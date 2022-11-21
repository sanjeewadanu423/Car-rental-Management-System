@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Driver Profile</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('drivers') }}"> Back</a>
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


    <form action="{{ route('drivers.update',$driver->id) }}" method="POST">
    	@csrf
        @method('PUT')


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Driver Name:</strong>
                <select class="form-control" name="user_id">
                    @foreach ($user as $value)

                    <option value="{{ $value->id }}">{{ $value->name}}</option>
                    @endforeach

                </select>
            </div>
        </div>
         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Driver Address:</strong>
		            <input type="text" name="driver_address" value="{{ $driver->driver_address }}" class="form-control" placeholder="Address">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Driver Phone:</strong>
                    <input type="text" name="driver_phone" value="{{ $driver->driver_phone }}" class="form-control" placeholder="0775579398">

		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Driver Age: </strong>
		            <input type="text" name="driver_age" value="{{ $driver->driver_age }}" class="form-control" placeholder="Age">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Driver NIC:</strong>
                    <input type="text" name="driber_nic" value="{{ $driver->driber_nic }}" class="form-control" placeholder="981351363V">

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
		    <div class="col-xs-12 col-sm-12 col-md-12">
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
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


@endsection
