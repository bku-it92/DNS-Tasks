@extends('layouts.authenticated')

@section('content')
    <main class="form-signin">
        <form method="post" action="{{ route('login') }}">
            <h1 class="h3 mb-3 fw-normal text-center">Bitte Zugangsdaten eingeben</h1>
            <div class="form-floating">
                <input type="email" class="form-control" id="email" placeholder="Email-Adresse">
                <label for="email">Email-Adresse</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" placeholder="Passwort">
                <label for="password">Passwort</label>
            </div>
            <button type="submit" class="w-100 btn btn-lg btn-primary">Einloggen</button>
        </form>
    </main>
@endsection
