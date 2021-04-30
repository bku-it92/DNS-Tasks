<!doctype html>
<html lang="en" class="h-100">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>IT92 DNS Tasks</title>
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/all.min.css" rel="stylesheet" integrity="sha256-2H3fkXt6FEmrReK448mDVGKb3WW2ZZw35gI7vqHOE4Y=" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </head>
    <body class="d-flex flex-column h-100">
    <header class="px-3 py-2 mb-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="{{ route('home') }}"
                       class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">IT92 DNS Tasks</a>
                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        @can('access admin')
                            <li>
                                <a href="{{ route('admin') }}" class="nav-link text-secondary d-flex flex-column align-items-center">
                                    <i class="fas fa-shield-alt"></i>
                                    Admin
                                </a>
                            </li>
                        @endcan
                        @auth
                            <li>
                                <a href="#" class="nav-link text-secondary d-flex flex-column align-items-center" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                    Abmelden
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </header>

        <form id="logout-form" action="/logout" method="post" style="display: none;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>

        @yield('content')

        @include('partials.footer')
    </body>
</html>
