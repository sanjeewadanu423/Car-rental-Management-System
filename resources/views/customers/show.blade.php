@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Customer Profile</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('customers') }}"> Back</a>
            </div>
        </div>
    </div>

@foreach ($customers as $customer )


    <div class="row">

        <div class="image">
            <img class="rounded-circle mt-5" src="{{ asset('img/'.$customer->customer_photo) }}" width="200px" height="120px" alt="">
        </div>
        <div><br></div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $customer->name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $customer->email }}
            </div>
        </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIC:</strong>
                    {{ $customer->customer_nic }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone:</strong>
                    {{ $customer->customer_phone }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    {{ $customer->customer_address }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Job:</strong>
                    {{ $customer->customer_job }}
                </div>
            </div>


    </div>
    @endforeach
@endsection
