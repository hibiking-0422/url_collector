<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- vue --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">
</head>
<body>
    <header>
        <h1 class="headline">
        <a>UrlCollector</a>
      </h1>
      <ul class="nav-list">
        <li class="nav-list-item"><a href={{ action('UrlController@index') }}>URL</a></li>
        <li class="nav-list-item"><a href={{ action('GenreController@index') }}>Genre</a></li>
      </ul>
    </header>
    <div id="app">
        <main>
            @yield('content')
        </main> 
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>