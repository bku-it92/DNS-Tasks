@extends('layouts.authenticated')

@section('content')
<div class="container">
    @if (session('status'))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Aufgaben') }}</div>

                <div class="card-body">
                    <p class="card-text">{{ __('Du hast bereits :answered Fragen von :questions Fragen beantwortet!', ['answered' => $answered, 'questions' => $questions]) }}</p>

                    <a href="{{ route('test') }}" class="btn btn-primary">Zu den Fragen</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
