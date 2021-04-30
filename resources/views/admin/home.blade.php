@extends('layouts.authenticated')

@section('content')
    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-md-4 pb-3">
                <div class="card">
                    <div class="card-header">{{ __('Accounts') }}</div>

                    <div class="card-body">
                        <p class="card-text">{{ $accounts }} Accounts in der Datenbank!</p>

                        <a href="{{ route('admin.accounts') }}" class="btn btn-primary">Auflisten</a>
                        <a href="{{ route('admin.accounts.create') }}" class="btn btn-primary">Hinzufügen</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pb-3">
                <div class="card">
                    <div class="card-header">{{ __('Fragen') }}</div>

                    <div class="card-body">
                        <p class="card-text">{{ $questions }} Fragen in der Datenbank!</p>

                        <a href="{{ route('admin.questions') }}" class="btn btn-primary">Auflisten</a>
                        <a href="{{ route('admin.questions.create') }}" class="btn btn-primary">Hinzufügen</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pb-3">
                <div class="card">
                    <div class="card-header">{{ __('Beantwortete Fragen') }}</div>

                    <div class="card-body">
                        <p class="card-text">{{ $answered }} Fragen wurden bereits beantwortet!</p>

                        <a href="{{ route('admin.answered') }}" class="btn btn-primary">Auflisten</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
