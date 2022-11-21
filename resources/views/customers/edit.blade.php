@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Customer Profile</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('customers') }}"> Back</a>
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


    <form action="{{ route('customers.update',$customer->id) }}" method="POST">
    	@csrf
        @method('PUT')



        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Customer NIC:</strong>
                    <input type="text" name="customer_nic" value="{{ $customer->customer_nic }}" class="form-control" placeholder="981351363V">

		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Customer Phone:</strong>
                    <input type="text" name="customer_phone" value="{{ $customer->customer_phone }}" class="form-control" placeholder="0775579398">

		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Customer Address:</strong>
		            <input type="text" name="customer_address" value="{{ $customer->customer_address }}" class="form-control" placeholder="Address">
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Customer Job: </strong>
		            <input type="text" name="customer_job" value="{{ $customer->customer_job }}" class="form-control" placeholder="Age">
		        </div>
		    </div>


		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


@endsection
