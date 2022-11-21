@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Driver</h2>
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


    <form action="{{ route('drivers.store') }}" method="POST">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>User Name:</strong>
		            <select class="form-control" name="user_id">
                        @foreach ($user as $value)

                        <option value="{{ $value->id }}">{{ $value->name}}</option>
                        @endforeach

                    </select>
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Driver Address:</strong>
		            <textarea class="form-control" style="height:100px" name="driver_address" placeholder="Address"></textarea>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Driver Phone:</strong>
		            <input type="text" class="form-control" name="driver_phone" placeholder="075579398">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Driver Age:</strong>
		            <input type="text" class="form-control" name="driver_age" placeholder="25">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Driver NIC:</strong>
		            <input type="text" class="form-control" name="driber_nic" placeholder="981351363V">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Driver Photo:</strong>
		            <form action="/action_page.php">
                        <input class="form-control" type="file" id="myFile" name="driver_photo">
                      </form>
		        </div>
		    </div>
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
		            <input type="text" class="form-control" name="price_per_date" placeholder="2500">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


@endsection
