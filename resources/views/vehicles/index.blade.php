@extends('layouts.master')

@section('style')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.4/css/bootstrap.min.css"  />
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Vehicles</h2>
            </div>
            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('vehicles.create') }}"> Add Vehicle</a>

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
            <th>Reg Number</th>
            <th>Price Per Date</th>
            <th>Photo</th>
            <th>Passenger</th>
            <th>Luggage</th>
            <th>Status</th>
            <th>Engine Capacity</th>
            <th width="260px">Action</th>
        </tr>

	    @foreach ($vehicles as  $vehicle)
	    <tr>

            {{-- {{ dd($vehicle) }} --}}
	        <td>{{ ++$i }}</td>
	        <td>{{ $vehicle->vehicle_name }}</td>
            <td>{{ $vehicle->vehicle_reg_no }}</td>
            <td>{{ $vehicle->price_per_date }}</td>
            <td><img class="rounded-circle me-2" width="30" height="30" src="{{asset('img/'.$vehicle->vehicle_photo)}}"></td>
            <td>{{ $vehicle->passengers }}</td>
            <td>{{ $vehicle->luggage }}</td>
            <td>

                @if($vehicle->vehicle_states == 'yes')
                <button class="btn btn-success">Yes</button>
                @else
                <button class="btn btn-warning">No</button>
                @endif

                @if($vehicle->vehicle_states == 'no' )
                        <a href="/statesYes{{ $vehicle->id }}" class="btn btn-outline-success">Yes</a>
                @else
                        <a href="/statesNo{{ $vehicle->id }}" class="btn btn-outline-danger">No</a>
                @endif

            </td>
            <td>{{ $vehicle->engine_capacity }}</td>
	        <td>




                <form action="{{ route('vehicles.destroy',$vehicle->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('vehicle_profile',$vehicle->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('vehicles.edit',$vehicle->id) }}">Edit</a>



                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>
	        </td>
	    </tr>



	    @endforeach
    </table>
    <script>
        $(function() {
          $('.toggle-class').change(function() {
              var vehicle_states = $(this).prop('checked') == true ? 1 : 0;
              var vehicle_id = $(this).data('id');

              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: '/changeStatus',
                  data: {'vehicle_states': vehicle_states, 'vehicle_id': vehicle_id},
                  success: function(data){
                    console.log(data.success)
                  }
              });
          })
        })
      </script>


    {!! $vehicles->links() !!}


@endsection


