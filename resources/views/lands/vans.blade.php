@extends('layouts.land')


    @section('content')




    <div class="row container">
        @foreach ($vans as $van)
        <div class="col-lg-2 col-md-4">


            <div class="team-member">

                <div class="image">
                    <img src="{{ asset('img/'.$van->vehicle_photo) }}" width="200px" height="120px" alt="">
                    <div class="social-icons">
                        <a  href="{{ route('prof',[$van->vehicle_id]) }}"><i></i>&nbsp;</a>
                    </div>
                    <div class="overlay" href=""></div>
                </div>
                <p>{{ $van->vehicle_name }}</p>

            </div>


        </div>
        @endforeach
    </div>


    @endsection
