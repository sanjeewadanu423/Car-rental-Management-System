@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Offers</h2>
            </div>
            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('offers.create') }}"> Create New Offer</a>

            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Description</th>
            <th>Coupon</th>
            <th>Offer Price</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($offers as $offer)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $offer->offer_photo }}</td>
	        <td>{{ $offer->title }}</td>
            <td>{{ $offer->offer_descrip }}</td>
            <td>{{ $offer->coupon }}</td>
            <td>{{ $offer->offer_price }}</td>
	        <td>
                <form action="{{ route('offers.destroy',$offer->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('offers.show',$offer->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('offers.edit',$offer->id) }}">Edit</a>



                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $offers->links() !!}


@endsection
