@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Savininkai</div>

                    <div class="card-body">
                        <a href="{{ route("owners.create") }}" class="btn btn-success float-start">Sukurti savininką</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Vardas</th>
                                <th>Pavardė</th>
                                <th>Automobiliai</th>
                                <th></th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($owners as $owner)
                                <tr>
                                    <td>{{ $owner->name }} </td>
                                    <td>{{ $owner->surname }} </td>
                                    <td>@foreach($owner->cars as $car)
                                             {{$car->brand}} {{$car->model}} <br>
                                    @endforeach

                                    </td>

                                    <td >
                                        <a href="{{ route("owners.update", $owner->id) }}" class="btn btn-success">Redaguoti</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('owners.delete', $owner->id) }}" class="btn btn-danger">Ištrinti</a>
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

