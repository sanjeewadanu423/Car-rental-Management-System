@extends('layouts.land')


    @section('content')



                <div class="container">

                    <div class="row">
                        <div class="col-8">

                    <br>
                    @foreach ($vehicles as $vehicle )
                    <div class="card mb-8 ">
                        <div class="card-body mb-3">

                        <div class="row">



                            <div class="col-4">

                                <img width="150px" height="150px"  src="{{ asset('img/'.$vehicle->vehicle_photo) }}">
                                <div>
                                    <h1><b>{{ $vehicle->vehicle_name }}</b></h1>
                                </div>
                            </div>

                                <div class="col-8">
                                <table boarder="0" class="col-12">
                                    <tr>
                                        <td class="col-sm-9 text-secondary">Registration Number</td>
                                        <td></td>
                                        <td>{{ $vehicle->vehicle_reg_no }}</td><td style="padding-right: 0px">    </td>

                                        <td rowspan="8"  >
                                            <div class="text-secondary ms-5">
                                                LKR </div>
                                                <h1 class="ms-5">32,900</h1>
                                            </div>

                                            <div class="ms-5">
                                                <div class="a">
                                                    <a class="btn btn-info " type="button"
                                                    href="#">Book Now</a>
                                                </div>
                                                </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="col-sm-9 text-secondary">Passengers</td>
                                        <td></td>
                                        <td>{{ $vehicle->passengers }}</td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td class="col-sm-9 text-secondary">Luggage</td>
                                        <td></td>
                                        <td>{{ $vehicle->luggage }}</td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td class="col-sm-9 text-secondary">Fuel</td>
                                        <td></td>
                                        <td>{{ $vehicle->fuel }}</td><td></td>
                                    </tr>

                                    <tr>
                                        <td class="col-sm-9 text-secondary">Air Condition</td>
                                        <td></td>
                                        <td>{{ $vehicle->air_condition }}</td><td></td>
                                    </tr>

                                    <tr>
                                        <td class="col-sm-9 text-secondary">Driver Type</td>
                                        <td></td>
                                        <td>{{ $vehicle->vehicle_l_h }}</td><td></td>
                                    </tr>

                                    <tr>
                                        <td class="col-sm-9 text-secondary">Price for Extra km</td>
                                        <td></td>
                                        <td>{{ $vehicle->price_for_extra_km }}</td><td></td>
                                    </tr>

                                    <tr>
                                        <td class="col-sm-9 text-secondary">Transmission</td>
                                        <td></td>
                                        <td>{{ $vehicle->transmission }}</td><td></td>
                                    </tr>

                                </table>





                        </div>

                        </div>

                        </div>

                    </div>

                    @endforeach
                    </div>
                    <div class="col-4">
                        ad
                    </div>
                    </div>


                </div>


@endsection
