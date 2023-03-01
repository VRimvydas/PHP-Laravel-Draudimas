@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Automobiliai</div>

                    <div class="card-body">
                        <a href="{{ route("cars.create") }}" class="btn btn-success float-start">Kurti naują</a>
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

