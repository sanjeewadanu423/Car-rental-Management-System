@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Model</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('types') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Model Name :</strong>
                {{ $type->vehicle_type_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vehicle Category Name :</strong>
                {{ $type->vehicle_cat_name }}
            </div>
        </div>
    </div>
@endsection
