<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Espapaya') }}</title>

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/frontend.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- Fontawesome icons --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    
</head>
<body>
    <div id="app">
       	@include('layouts.header')	
    
       	<main>
            <div class="container-fluid">
                @include('layouts.error')
                @yield('hero')
    			@yield('contentOne')
    			@yield('contentTwo')
    			@yield('contentThree')
    			@yield('contentFour')
    			@yield('contentFive')
                @yield('contentSix')
            </div>
		</main>
    
       	@include('layouts.footer')	
    </div>
    @yield('scripts')
</body>

</html>
