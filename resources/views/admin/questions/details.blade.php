@extends('layouts.authenticated')

@section('content')
    <div class="container">
        <div class="row">
            <div class="d-flex flex-column mb-3">
                <h3>{{ __('Fragendetails') }}</h3>
                <h4>{{ $question->question }}</h4>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Frage aktualisieren') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.questions.edit', ['id' => $question->id]) }}">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="question" class="col-md-4 col-form-label text-md-right">{{ __('Frage') }}</label>

                                <div class="col-md-8">
                                    <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ old('question') ?? $question->question }}" required>

                                    @error('question')
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
                    <div class="card-header">{{ __('Antwort aktualisieren') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.questions.edit', ['id' => $question->id]) }}">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="answer" class="col-md-4 col-form-label text-md-right">{{ __('Antwort') }}</label>

                                <div class="col-md-8">
                                    <input id="answer" type="answer" class="form-control @error('answer') is-invalid @enderror" name="answer" value="{{ old('answer') ?? $question->answer }}" required autocomplete="email">

                                    @error('answer')
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
                <table class="table table-bordered table-striped table-hover align-middle table-sm">
                    <colgroup>
                        <col class="col-md-3">
                        <col class="col-md-4">
                        <col class="col-md-2">
                        <col class="col-md-3">
                    </colgroup>
                    <thead>
                    <tr>
                        <th scope="col">Person</th>
                        <th scope="col">Antwort</th>
                        <th scope="col">Korrekt?</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($question->answeredQuestions()->get() as $answer)
                        @php
                            /** @var \App\Models\AnsweredQuestion $answer */
                            $user = \App\Models\User::find($answer->user_id);
                        @endphp
                        <tr>
                            <th scope="row">{{ $user->name }}</th>
                            <th>{{ $answer->answer }}</th>
                            <th class="text-center"><input type="checkbox" @if ($answer->is_correct) checked @endif onclick="return false;"></th>
                            <th><a href="{{ route('admin.accounts.details.answers', ['id' => $user->id]) }}" class="btn btn-primary btn-sm w-100">Antworten ansehen</a></th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
