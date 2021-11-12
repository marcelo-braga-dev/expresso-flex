<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>
    <!-- Favicon -->
    {{-- <link href="/assets/img/brand/logo-x256.jpg" rel="icon"> --}}

    <!-- Fonts -->
    <link type="text/css" href="/assets/css/font-google.css" rel="stylesheet">


    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=2.0.1" rel="stylesheet">

    {{-- <link type="text/css" href="/assets/css/btn-flutuante.css" rel="stylesheet"> --}}

    {{-- <link type="text/css" href="/assets/css/select2.css" rel="stylesheet"> --}}

    <link type="text/css" href="/assets/css/style.css?ver=1.0" rel="stylesheet">

    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>

</head>

<body class="{{ $class ?? '' }}">
