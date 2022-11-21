@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Categorys</h2>
            </div>
            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('categorys.create') }}"> Create New Category</a>

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
            <th>Category Name</th>
            <th>Category Description</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($categorys as $category)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $category->vehicle_cat_name }}</td>
	        <td>{{ $category->vehi_cat_descip }}</td>
	        <td>
                <form action="{{ route('categorys.destroy',$category->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('categorys.show',$category->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('categorys.edit',$category->id) }}">Edit</a>



                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $categorys->links() !!}


@endsection
