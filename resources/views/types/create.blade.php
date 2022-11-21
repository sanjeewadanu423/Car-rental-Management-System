@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Model</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('types') }}"> Back</a>
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


    <form action="{{ route('types.store') }}" method="POST">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Vehicle Model Name:</strong>
		            <input type="text" name="vehicle_type_name" class="form-control" placeholder="Name">
		        </div>
		    </div>
            
		    <div class="col-xs-12 col-sm-12 col-md-12 row">
		        <div class="form-group">
		            <strong>Vehicle Category Name:</strong>
		            <select name="vehicle_cat_id" id="vehicle_cat_id">
                        @foreach ($categorys as $value)

                        <option value="{{ $value->id }}">{{ $value->vehicle_cat_name}}</option>
                        @endforeach
                    </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


@endsection
