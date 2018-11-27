<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tenon') }}</title>
    <meta name="Description" content="">
    <meta name="author" content="Elias Vasconcelos">
    <meta keywords="">
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/resolucao.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="{{ asset('js/valida.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
@yield('content')
</body>