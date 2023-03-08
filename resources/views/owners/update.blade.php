@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __("Owners") }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route("owners.save", $owner->id) }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">{{ __("Name") }}</label>
                                <input type="text" class="form-control" name="name" value="{{$owner->name}}">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("Surname") }}</label>
                                <input type="text" class="form-control" name="surname" value="{{$owner->surname}}">

                            </div>
                            <button class="btn btn-success">{{ __("Search") }}</button>
                        </form>

                    </div>
                </div>
                <div class="mt-3">
                    {{ __("Owner") }} {{ $owner->name }} {{ $owner->surname }} {{ __("has cars") }}: <br>

                    @foreach($owner->cars as $car)
                        {{$car->brand}} {{$car->model}} <br>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection

