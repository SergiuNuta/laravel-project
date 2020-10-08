@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('cars.create') }}" title="Create a car"> <i class="fa fa-plus-circle"></i>
            </a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered table-responsive-lg">
    <tr>
        <th>No</th>
        <th>Make</th>
        <th>Model</th>
        <th>Colour</th>
        <th>Top Speed</th>
        <th>Date Created</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($cars as $car)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $car->make }}</td>
        <td>{{ $car->model }}</td>
        <td>{{ $car->colour }}</td>
        <td>{{ $car->top_speed }}</td>
        <td>{{ date_format($car->created_at, 'jS M Y') }}</td>
        <td>
            <form action="{{ route('cars.destroy', $car->id) }}" method="POST">

                <a href="{{ route('cars.show', $car->id) }}" title="show" style="margin: 0 10px;">
                    <i class="fa fa-eye text-success fa-lg"></i>
                </a>

                <a href="{{ route('cars.edit', $car->id) }}">
                    <i class="fa fa-edit  fa-lg"></i>

                </a>

                @csrf
                @method('DELETE')

                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                    <i class="fa fa-trash fa-lg text-danger"></i>

                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $cars->links() !!}

@endsection


