@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> {{ $car->make }}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('cars.index') }}" title="Go back"> <i class="fa fa-backward"></i> </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Make:</strong>
            {{ $car->make }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Model:</strong>
            {{ $car->model }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Colour:</strong>
            {{ $car->colour }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Top speed:</strong>
            {{ $car->top_speed }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date Created:</strong>
            {{ date_format($car->created_at, 'jS M Y') }}
        </div>
    </div>
</div>
@endsection