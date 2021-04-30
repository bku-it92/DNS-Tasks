@extends('layouts.authenticated')

@section('content')
<div class="container mb-5">
    <div class="row">
        <div class="d-flex flex-row justify-content-between mb-3">
            <h3>Benutzer</h3>
            <a href="{{ route('admin.accounts.create') }}" class="btn btn-primary">Benutzer erstellen</a>
        </div>
    </div>
    <div class="row justify-content-center mb-5">
        <table class="table table-bordered table-striped table-hover align-middle table-sm">
            <colgroup>
                <col class="col-md-1">
                <col class="col-md-10">
                <col class="col-md-1">
            </colgroup>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td scope="row">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td><a href="{{ route('admin.accounts.details', ['id' => $user->id]) }}" class="btn btn-primary btn-sm w-100">Details</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
