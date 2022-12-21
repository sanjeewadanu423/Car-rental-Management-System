@extends('layouts.land')


    @section('content')




        <div class="row container">
            @foreach ($cabs as $cab)
                <div class="col-lg-2 col-md-4 ">

                    <div class="team-member">


                        <div class="image">
                            <img src="{{ asset('img/'.$cab->vehicle_photo) }}" width="200px" height="120px" alt="">
                            <div class="social-icons">
                                <a  href="{{ route('prof',[$cab->vehicle_id]) }}"><i></i>&nbsp;</a>

                            </div>
                            <div class="overlay" href=""></div>
                        </div>

                        <p>{{ $cab->vehicle_name }}</p>

                    </div>

                </div>
            @endforeach
        </div>


    @endsection
