@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Booking Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('bookings') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Booking Date:</strong>
                    {{ $booking->booking_date}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Return Date:</strong>
                    {{ $booking->return_date }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Vehicle Name:</strong>
                    {{ $booking->vehicle_name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Customer Name:</strong>
                    {{ $booking->customer_name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Booking Status:</strong>
                    {{ $booking->book_status }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Offer:</strong>
                    {{ $booking->offer_id }}
                </div>
            </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Driver name:</strong>
                        {{ $booking->driver_name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Price for Dates:</strong>
                        {{ $booking->price_for_dates }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Is Return:</strong>
                         {{ $booking->is_return }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Price for Dates:</strong>
                        {{ $booking->price_for_dates }}
                    </div>
                </div>


@endsection
