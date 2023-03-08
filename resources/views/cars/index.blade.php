@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __("Cars") }}</div>

                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{ route("cars.create") }}" class="btn btn-success float-start">{{ __("New car") }}</a>
                        </div>

                        <hr >
                        <form method="post" action="{{ route('cars.search') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">{{ __("License plate") }}</label>
                                <input class="form-control" type="text" name="reg_number" value="{{ $reg_number }}" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("Brand") }}</label>
                                <input class="form-control" type="text" name="brand" value="{{ $brand }}" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("Model") }}</label>
                                <input class="form-control" type="text" name="model" value="{{ $model }}" >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __("Owner") }}</label>
                                <select class="form-select" name="ownerFilter">
                                    <option value=""></option>
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}"  {{ ($owner->id==$ownerFilter)?'selected':'' }}>{{$owner->name}} {{$owner->surname}} </option>
                                    @endforeach
                                </select>

                            </div>
                            <button class="btn btn-info">{{ __("Search") }}</button>
                        </form>
                        <hr>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __("License plate") }}</th>
                                <th>{{ __("Brand") }}</th>
                                <th>{{ __("Model") }}</th>
                                <th>{{ __("Owner") }}</th>
                                <th></th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cars as $car)
                                <tr>
                                    <td>{{ $car->reg_number }} </td>
                                    <td>{{ $car->brand }} </td>
                                    <td>{{ $car->model }} </td>
                                    <td>{{ $car->owner->name }} {{$car->owner->surname }} </td>
                                    <td >
                                        <a href="{{ route("cars.edit", $car->id) }}" class="btn btn-success">{{ __("Edit") }}</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route("cars.destroy", $car->id) }}">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-danger">{{ __("Delete") }}</button>
                                        </form>

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

