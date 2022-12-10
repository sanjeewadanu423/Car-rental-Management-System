@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Bookings</h2>
            </div>
            <div class="pull-right">
                @can('booking-create')
                <a class="btn btn-success" href="{{ route('bookings.create') }}"> Create New Booking</a>
                @endcan
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
            <th>Booking Date</th>
            <th>Return Date</th>
            <th>Vehicle Name</th>
            <th>Customer Name</th>
            <th>Is Return</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($bookings as $booking)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $booking->booking_date }}</td>
	        <td>{{ $booking->return_date }}</td>
            <td>{{ $booking->vehicle_name }}</td>
	        <td>{{ $booking->customer_name }}</td>
	        <td>{{ $booking->is_return }}</td>
	        <td>
                <form action="{{ route('bookings.destroy',$booking->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('bookings.show',$booking->id) }}">Show</a>
                    @can('booking-edit')
                    <a class="btn btn-primary" href="{{ route('bookings.edit',$booking->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('booking-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {{-- {!! $bookings->links() !!} --}}


@endsection
