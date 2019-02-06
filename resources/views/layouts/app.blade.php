<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name', 'Aya Wellness')}}</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}"> 
        <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Token for ajax call -->
    </head>
    <body>
        <div class="container">
            @include('inc/messages')
            @yield('content')
        </div> 
    </body>
</html>