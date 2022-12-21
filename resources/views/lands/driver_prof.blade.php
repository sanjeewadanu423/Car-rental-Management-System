@extends('layouts.land')

{{-- {{ dd($vehis) }} --}}
    @section('content')

{{-- {{ dd($vehicles) }} --}}
    @foreach ($drivers as $driv )
    @foreach ($vehicles as $vehicle )


    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
{{-- {{ dd($driv) }} --}}




                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="200px" height="190px" src="{{ asset('img/'.$driv->driver_photo) }}">
                        <span class="font-weight-bold"></span><span class="text-black-50">{{ $driv->name }}</span><span> </span></div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">{{ $driv->name }}</h4>
                        </div>

                        <table boarder="0" style="width:85%" style="height:10%">
                            <tr>
                                <td>Age</td>
                                <td>{{ $driv->driver_age }}</td><br>
                            </tr>
                            <tr><td> </td><td> </td></tr>
                            <tr><td>Driver Address</td>
                                <td>{{ $driv->driver_address }}</td><br>
                            </tr>
                            <tr><td> </td><td> </td></tr>
                            <tr>
                                <td>Price Per Date</td>
                                <td>{{ $driv->price_per_date }}</td>
                            </tr>
                            <tr><td><td></td></td></tr>


                        </table>
                </div>
            </div>

                {{-- Bookin Form --}}

                <div class="col-md-4 border-right">
                    <form class="p-lg-10 col-12 row g-4">
                        <div><br></div>
                        <div>
                            <h4>Booking</h4>
                        </div>



                        <div class="row">


                            <div class="col-sm-12">
                                <div >
                                    <span class="form-label">Pickup Date</span>
                                    <input class="form-control" type="date" name="booking_date" required>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div>
                                    <span class="form-label">Return Date</span>
                                    <input class="form-control" type="date" name="return_date" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <label for="tpNo" class="form-label">Vehicle Name</label>
                                <input type="text" class="form-control" id="tpNo" name="vehicle_name"
                                    aria-describedby="emailHelp" value="{{ $vehicle->vehicle_name }}" readonly>
                            </div>

                            <div class="col-lg-12">
                                <label for="tpNo" class="form-label">Driver Name</label>
                                <input type="text" class="form-control" id="tpNo" placeholder="Self Driver" name="driver_name"
                                    aria-describedby="emailHelp"  value="{{ $driv->name }}" readonly>
                            </div>


                        </div>




                        <div class="col-6">
                            <button type="register" class="btn btn-brand">Order</button>
                            <h1><br/></h1>
                        </div>


                    </form>
                </div>








    </div>

    @endforeach
    @endforeach
</div>
</div>

    @endsection

