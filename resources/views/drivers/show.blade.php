@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Driver Profile</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('drivers') }}"> Back</a><br>
            </div>
        </div>
    </div>

    {{-- {{ dd($drivers) }} --}}
@foreach ($drivers as $driver )

<br>
    <div class="row">

        <div class="image">
            <img class="rounded-circle mt-5" src="{{ asset('img/'.$driver->driver_photo) }}" width="200px" height="120px" alt="">
        </div>
        <div><br></div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $driver->name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $driver->email }}
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    {{ $driver->driver_address }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone:</strong>
                    {{ $driver->driver_phone }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Age:</strong>
                    {{ $driver->driver_age }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIC:</strong>
                    {{ $driver->driber_nic }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Driver Type:</strong>
                        {{ $driver->driver_type }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Price Per Date:</strong>
                        {{ $driver->price_per_date }}
                    </div>
                </div>
    </div>
    @endforeach
@endsection
