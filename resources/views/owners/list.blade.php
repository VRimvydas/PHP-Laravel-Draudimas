@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Savininkai</div>

                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{ route("owners.create") }}" class="btn btn-success float-start">Sukurti savininką</a>
                        </div>

                        <hr >
                        <form method="post" action="{{ route('owners.search') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Vardas</label>
                                <input class="form-control" type="text" name="name" value="{{ $name }}" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pavardė</label>
                                <input class="form-control" type="text" name="surname" value="{{ $surname }}" >
                            </div>
                            <button class="btn btn-info">Ieškoti</button>
                        </form>
                        <hr>


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

