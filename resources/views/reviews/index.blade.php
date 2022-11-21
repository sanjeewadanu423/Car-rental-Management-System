@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Reviews</h2>
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
            <th>Review</th>
            <th>Email id</th>
            <th width="280px">Review Status</th>
        </tr>
	    @foreach ($reviews as $review)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $review->review }}</td>
	        <td>{{ $review->email_id }}</td>
            <td>{{ $review->review_states }}</td>
	        <td>
                <form action="{{ route('reviews.destroy',$review->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('reviews.show',$review->id) }}">Show</a>
                    @can('review-edit')
                    <a class="btn btn-primary" href="{{ route('reviews.edit',$review->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('review-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $reviews->links() !!}


@endsection
