@extends('layouts.land')


    @section('content')




    <div class="row container">
        {{-- {{ dd($cars) }} --}}
        @foreach ($cars as $car)
        <div class="col-lg-2 col-md-4">


            <div class="team-member">

                <div class="image">
                    <img  src="{{ asset('img/'.$car->vehicle_photo) }}" width="200px" height="120px" alt="">
                    <div class="social-icons">
                        <a  href="{{ route('prof',[$car->vehicle_id]) }}"><i></i>&nbsp;</a>

                    </div>
                    <div class="overlay" href=""></div>
                </div>
                <p>{{ $car->vehicle_type_name ." ". $car->vehicle_name  }}</p><br>


            </div>


        </div>
        @endforeach
    </div>


    @endsection
