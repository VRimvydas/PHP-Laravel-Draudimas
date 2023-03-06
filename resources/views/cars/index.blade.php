@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Automobiliai</div>

                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{ route("cars.create") }}" class="btn btn-success float-start">Kurti naują</a>
                        </div>

                        <hr >
                        <form method="post" action="{{ route('cars.search') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Valst. numeris</label>
                                <input class="form-control" type="text" name="reg_number" value="{{ $reg_number }}" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Markė</label>
                                <input class="form-control" type="text" name="brand" value="{{ $brand }}" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Modelis</label>
                                <input class="form-control" type="text" name="model" value="{{ $model }}" >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Savininkas</label>
                                <select class="form-select" name="ownerFilter">
                                    <option value=""></option>
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}"  {{ ($owner->id==$ownerFilter)?'selected':'' }}>{{$owner->name}} {{$owner->surname}} </option>
                                    @endforeach
                                </select>

                            </div>
                            <button class="btn btn-info">Ieškoti</button>
                        </form>
                        <hr>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Valst. numeris</th>
                                <th>Markė</th>
                                <th>Modelis</th>
                                <th>Savininkas</th>
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
                                        <a href="{{ route("cars.edit", $car->id) }}" class="btn btn-success">Redaguoti</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route("cars.destroy", $car->id) }}">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-danger">Ištrinti</button>
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

