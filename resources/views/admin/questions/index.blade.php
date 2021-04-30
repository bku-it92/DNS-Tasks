@extends('layouts.authenticated')

@section('content')
    <div class="container mb-5">
        <div class="row">
            <div class="d-flex flex-row justify-content-between mb-3">
                <h3>Fragen</h3>
                <a href="{{ route('admin.questions.create') }}" class="btn btn-primary">Frage erstellen</a>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <table class="table table-bordered table-striped table-hover align-middle table-sm">
                <colgroup>
                    <col class="col-md-1">
                    <col class="col-md-5">
                    <col class="col-md-5">
                    <col class="col-md-1">
                </colgroup>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Frage</th>
                    <th scope="col">Antwort</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                    <tr>
                        <td scope="row">{{ $question->id }}</td>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question->answer }}</td>
                        <td><a href="{{ route('admin.questions.details', ['id' => $question->id]) }}" class="btn btn-primary btn-sm w-100">Details</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
