@extends('layouts.authenticated')

@section('content')
    <div class="container">
        <div class="row">
            <div class="d-flex flex-column mb-3">
                <h3>{{ __('Benutzerdetails') }}</h3>
                <h4>{{ $user->name }}</h4>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Benutzername aktualisieren') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.accounts.edit', ['id' => $user->id]) }}">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Benutzername') }}</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Aktualisieren') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Email aktualisieren') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.accounts.edit', ['id' => $user->id]) }}">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email-Adresse') }}</label>

                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Aktualisieren') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-md-6">
                <div class="alert alert-info">
                    <p>{{$answers}} von {{$questions}} beantwortet. Davon {{$correct}} richtig.</p>
                    <a href="{{route('admin.accounts.details.answers', ['id' => $user->id])}}" class="btn btn-primary">Antworten ansehen</a>
                </div>
            </div>
        </div>
    </div>
@endsection
