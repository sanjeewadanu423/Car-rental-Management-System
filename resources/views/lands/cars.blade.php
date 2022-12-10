@extends('layouts.land')


    @section('content')

    @foreach ($vehicles as $vehicle)

    @endforeach
    <div class="row">
        <div class="col-lg-2 col-md-4">
            <div class="team-member">
                <div class="image">
                    <img src="img/gtr.jfif" alt="">
                    <div class="social-icons">
                        <a><i></i></a>
                    </div>
                    <div class="overlay" href=""></div>
                </div>
                <p>Car</p>
            </div>
        </div>
    </div>
    @endforeach

    @endsection
