@extends('layouts.authenticated')

@section('content')
    <div class="container mb-5">
        <div class="row">
            <div class="d-flex flex-row justify-content-between mb-3">
                <h3>Antworten</h3>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <table class="table table-bordered table-striped table-hover align-middle table-sm">
                <colgroup>
                    <col class="col-md-1">
                    <col class="col-md-9">
                    <col class="col-md-1">
                    <col class="col-md-1">
                </colgroup>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Frage</th>
                    <th scope="col">Beantwortet</th>
                    <th scope="col">von</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                    <tr>
                        <th scope="row">{{ $question->id }}</th>
                        <th>{{ $question->question }}</th>
                        <th>{{ $question->answeredQuestions()->count() }}</th>
                        <th>{{ $user }}</th>
                        <th><a href="{{ route('admin.questions.details', ['id' => $question->id]) }}" class="btn btn-primary btn-sm w-100">Details</a></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
