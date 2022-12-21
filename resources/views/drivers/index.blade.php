@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>drivers</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('drivers.create') }}"> Create New Driver</a>
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
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Status</th>
            <th>NIC</th>
            <th>Photo</th>
            <th>Type</th>
            <th>Price</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($drivers as $driver)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $driver->name }}</td>
	        <td>{{ $driver->email }}</td>
            <td>{{ $driver->driver_address }}</td>
            <td>{{ $driver->driver_phone }}</td>
            <td>
                @if($driver->driver_status == 'yes')
                <button class="btn btn-success">Yes</button>
                @else
                <button class="btn btn-warning">No</button>
                @endif

                @if($driver->driver_status == 'no' )
                        <a href="/DriverstatesYes{{ $driver->id }}" class="btn btn-outline-success">Yes</a>
                @else
                        <a href="/DriverstatesNo{{ $driver->id }}" class="btn btn-outline-danger">No</a>
                @endif
            </td>
            <td>{{ $driver->driber_nic }}</td>
            <td><img class="rounded-circle me-2" width="30" height="30" src="{{asset('img/'.$driver->driver_photo)}}"></td>
            <td>{{ $driver->driver_type }}</td>
            <td>{{ $driver->price_per_date }}</td>
	        <td>
                <form action="{{ route('drivers.destroy',$driver->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('driver_profile',$driver->id) }}">Show</a>
                    @can('driver-edit')
                    <a class="btn btn-primary" href="{{ route('drivers.edit',$driver->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('driver-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {{-- {!! $driver->links() !!} --}}

 {{-- <!-- Add form -->
 <div class="modal fade" id="exampleModal" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <form class="p-lg-5 col-12 row g-2">
            <div>
                <h3>Driver Details</h3>
            </div>

            <div class="col-lg-12">
                <label for="driver_name" class="form-label">Driver Name</label>
                <input type="text" class="form-control" placeholder="Jon" id="driver_name"
                    aria-describedby="emailHelp">
            </div>

            <div class="col-lg-12">
                <label for="email" class="form-label"> Driver Email</label>
                <input type="text" class="form-control" placeholder="sanjeewadanu423@gmail.com" id="driver_email"
                    aria-describedby="emailHelp">
            </div>

            <div class="col-lg-6">
                <label for="driver_tpNo" class="form-label"> Driver Telephone Number</label>
                <input type="text" class="form-control" placeholder="0775579398" id="driver_tpNo"
                    aria-describedby="emailHelp">
            </div>

            <div class="col-lg-6">
                <label for="idNo" class="form-label">Driver ID Number</label>
                <input type="text" class="form-control" placeholder="981351363v" id="idNo"
                    aria-describedby="emailHelp">
            </div>

            <div class="col-12">
                <label for="address" class="form-label">Enter Address</label>
                <textarea name="address" class="form-control" id="address" rows="1">

                </textarea>
            </div>

            <div class="col-6">
                <input class="form-control" type="password" placeholder="Password" id="password" required>
            </div>

            <div class="col-6">
                <input class="form-control" type="password" placeholder="Confirm Password" id="confirm_password" required>
            </div>

            <div class="col-lg-6">
                <label for="age" class="form-label">Age</label>
                <input type="text" class="form-control"  id="age"
                    aria-describedby="emailHelp">
            </div>

            <div class="col-lg-6">
                <span class="form-label">Driver Type</span>
                <select class="form-control" name="type">
                    <option value="heavy">Heavy</option>
                    <option value="light">Light</option>
                </select>
            </div>

            <div class="col-lg-6">
                <label for="price" class="form-label">Price Per Day</label>
                <input type="text" class="form-control"  id="price"
                    aria-describedby="emailHelp">
            </div>

            <div class="col-lg-6">
                <form action="/action_page.php">
                    <input class="form-control" type="file" id="myFile" name="filename">
                  </form>
            </div>

            <div id="dataTable_length" class="dataTables_length container" aria-controls="dataTable">
                <button class="btn btn-primary" type="button"  data-bs-toggle="modal">Add Driver</button>
            </div>

        </form>
    </div>
    </div>
</div> --}}

{!! $drivers->render() !!}

@endsection
