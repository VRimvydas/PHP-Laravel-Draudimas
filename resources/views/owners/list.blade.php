@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __("Owners") }}</div>

                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{ route("owners.create") }}" class="btn btn-success float-start">{{ __("Create new") }}</a>
                        </div>

                        <hr >
                        <form method="post" action="{{ route('owners.search') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">{{ __("Name") }}</label>
                                <input class="form-control" type="text" name="name" value="{{ $name }}" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("Surname") }}</label>
                                <input class="form-control" type="text" name="surname" value="{{ $surname }}" >
                            </div>
                            <button class="btn btn-info">{{ __("Search") }}</button>
                        </form>
                        <hr>


                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __("Name") }}</th>
                                <th>{{ __("Surname") }}</th>
                                <th>{{ __("Cars") }}</th>
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
                                        <a href="{{ route("owners.update", $owner->id) }}" class="btn btn-success">{{ __("Edit") }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('owners.delete', $owner->id) }}" class="btn btn-danger">{{ __("Delete") }}</a>
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

