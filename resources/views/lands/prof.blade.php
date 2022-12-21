@extends('layouts.land')

{{-- {{ dd($vehis) }} --}}
    @section('content')


    @foreach ($vehis as $vehi )
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
{{-- {{ dd($vehi) }} --}}




                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="200px" height="170px" src="{{ asset('img/'.$vehi->vehicle_photo) }}">
                        <span class="font-weight-bold">{{ $vehi->vehicle_reg_no }}</span><span class="text-black-50">{{ $vehi->vehicle_name }}</span><span> </span></div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">{{ $vehi->vehicle_type_name . "   " .  $vehi->vehicle_name }}</h4>
                        </div>

                        <table boarder="0" style="width:85%" style="height:10%">
                            <tr>
                                <td>Passengers</td>
                                <td>{{ $vehi->passengers }}</td><br>
                            </tr>
                            <tr><td> </td><td> </td></tr>
                            <tr><td>Transmission</td>
                                <td>{{ $vehi->transmission }}</td><br>
                            </tr>
                            <tr><td> </td><td> </td></tr>
                            <tr>
                                <td>Driver Type</td>
                                <td>{{ $vehi->vehicle_l_h }}</td>
                            </tr>
                            <tr><td><td></td></td></tr>
                            <tr>
                                <td>Air Condition</td>
                                <td>{{ $vehi->air_condition }}</td>
                            </tr>
                            <tr><td><td></td></td></tr>
                            <tr>
                                <td>Fuel Type</td>
                                <td>{{ $vehi->fuel }}</td>
                            </tr>
                            <tr><td><td></td></td></tr>
                            <tr>
                                <td>Luggage</td>
                                <td>{{ $vehi->luggage }}</td>
                            </tr>
                            <tr><td><td></td></td></tr>

                            <tr><td><td></td></td></tr>
                            <tr>
                                <td>Engine Capacity</td>
                                <td>{{ $vehi->engine_capacity }}</td>
                            </tr>
                            <tr><td><td></td></td></tr>
                            <tr>
                                <td>Price for extra km</td>
                                <td>Rs. {{ $vehi->price_for_extra_km }}</td>
                            </tr>
                            <tr><td><td></td></td></tr>
                            <tr>
                                <td>Price per date</td>
                                <td>Rs. {{ $vehi->price_per_date }}</td>
                            </tr>

                        </table>
                </div>









        </div>

        {{-- Bookin Form --}}

        <div class="col-md-4 border-right">
            <form class="p-lg-10 col-12 row g-4" action="{{ route('bookings.store') }}" method="POST">
                @csrf
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
                            aria-describedby="emailHelp" value="{{ $vehi->vehicle_name }}" readonly>
                            <input type="hidden" class="form-control" id="tpNo" name="vehicle_id"
                            aria-describedby="emailHelp" value="{{ $vehi->vehicle_id }}" readonly>
                    </div>

                    <div class="col-lg-12">
                        <label for="tpNo" class="form-label">Driver Name</label>
                        <input type="text" class="form-control" id="tpNo" placeholder="Self Driver" name="driver_name"
                            aria-describedby="emailHelp" readonly>
                    </div>

                    <div class="col-lg-12">
                        <label for="tpNo" class="form-label">Coupon Number</label>
                        <input type="text" class="form-control" id="tpNo" placeholder="If have any offer" name="coupon"
                            aria-describedby="emailHelp">
                    </div>


                </div>




                <div class="col-6">
                    <button type="submit" class="btn btn-brand">Order</button>
                    <h1><br/></h1>
                </div>


            </form>
        </div>

    </div>


    <div class="row container">
        {{-- {{ dd($drivs) }} --}}
        @foreach ($drivs as $driv)

        @if ($vehi->vehicle_l_h == $driv->driver_type)

        @if ($driv->driver_status == 'yes')




        <div class="col-lg-2 col-md-4">
           {{-- {{ dd($driv) }} --}}


            <div class="team-member">

                <div class="image">
                    <img  src="{{ asset('img/'.$driv->driver_photo) }}" width="200px" height="120px" alt="">
                    <div class="social-icons">
                        <a  href="{{ route('driver_prof',[$driv->id, $vehi->vehicle_id]) }}"><i></i>&nbsp;</a>

                    </div>
                    <div class="overlay" href=""></div>
                </div>
                <p>{{  $driv->name  }}</p><br>


            </div>


        </div>
        @endif
        @endif
        @endforeach
    </div>
    @endforeach


    </div>
    </div>




    @endsection
