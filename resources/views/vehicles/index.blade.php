@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Vehicles</h2>
            </div>
            <div class="pull-right">
                @can('vehicle-create')
                <a class="btn btn-success" href="{{ route('vehicles.create') }}"> Add Vehicle</a>
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
            <th>Name</th>
            <th>Type Name</th>
            <th>Reg Number</th>
            <th>Driver Type</th>
            <th>Price Per Date</th>
            <th>Photo</th>
            <th>Passenger</th>
            <th>Transmision</th>
            <th>Luggage</th>
            <th>Air Condition</th>
            <th>Fuel</th>
            <th>Status</th>
            <th>Price Extra km</th>
            <th>Engine Capacity</th>
            <th>Driver Name</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($vehicles as $index => $vehicle)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $vehicle->vehicle_name }}</td>
	        <td>{{ $cat[$index]->vehicle_type_name }}</td>
            <td>{{ $vehicle->vehicle_reg_no }}</td>
            <td>{{ $vehicle->vehicle_l_h }}</td>
            <td>{{ $vehicle->price_per_date }}</td>
            <td>{{ $vehicle->vehicle_photo }}</td>
            <td>{{ $vehicle->passengers }}</td>
            <td>{{ $vehicle->transmission }}</td>
            <td>{{ $vehicle->luggage }}</td>
            <td>{{ $vehicle->air_condition }}</td>
            <td>{{ $vehicle->fuel }}</td>
            <td>{{ $vehicle->vehicle_states }}</td>
            <td>{{ $vehicle->price_for_extra_km }}</td>
            <td>{{ $vehicle->engine_capacity }}</td>
            <td>{{ $vehicle->price_for_extra_km }}</td>
	        <td>
                <form action="{{ route('vehicles.destroy',$vehicle->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('vehicles.show',$vehicle->id) }}">Show</a>
                    @can('vehicle-edit')
                    <a class="btn btn-primary" href="{{ route('vehicles.edit',$vehicle->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('vehicle-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $vehicles->links() !!}


@endsection
