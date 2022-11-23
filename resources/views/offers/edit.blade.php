@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Offer</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('offers') }}"> Back</a>
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


    <form action="{{ route('offers.update',$offer->id) }}" method="POST">
    	@csrf
        @method('PUT')



        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Offer Title:</strong>
                    <input type="text" name="title" value="{{ $offer->title }}" class="form-control">

		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Offer Description:</strong>
                    <input type="text" name="offer_descrip" value="{{ $offer->offer_descrip }}" class="form-control">

		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Offer Coupon:</strong>
		            <input type="text" name="coupon" value="{{ $offer->coupon }}" class="form-control">
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Offer Price: </strong>
		            <input type="text" name="offer_price" value="{{ $offer->offer_price }}" class="form-control">
		        </div>
		    </div>


		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


@endsection
