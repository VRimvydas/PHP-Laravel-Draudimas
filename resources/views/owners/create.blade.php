@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __("Owners") }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route("owners.store") }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">{{ __("Name") }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("Surname") }}</label>
                                <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}">
                                @error('surname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button class="btn btn-success">{{ __("Add") }}</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

