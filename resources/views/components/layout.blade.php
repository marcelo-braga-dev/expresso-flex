<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Expresso Flex</title>
    <!-- Favicon -->
    {{-- <link href="/assets/img/brand/logo-x256.png" rel="icon"> --}}

    <link type="text/css" href="{{ asset('assets') }}/css/font-google.css" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=2.0.1" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets') }}/css/style.css?ver=1.0" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets') }}/select2/css/select2.min.css" rel="stylesheet">

</head>

<body {{ $attributes }}>

@auth()
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endauth

@auth()
    <x-layouts.users>
        {{ $slot }}
    </x-layouts.users>
@endauth

@guest()
    {{ $slot }}
@endguest
<x-elements.modal-session></x-elements.modal-session>
<script>
    if (typeof Android == 'object') {
        if (typeof Android.versaoApp !== 'function') {
            window.location.href = 'https://play.google.com/store/apps/details?id=com.expressoflexapp';
        }
        if (Android.versaoApp() !== 7) window.location.href = 'https://play.google.com/store/apps/details?id=com.expressoflexapp';
    }
</script>

<script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js?v=1.0.0"></script>
<script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js?v=1.0.0"></script>

<script src="{{ asset('assets') }}/js/config.js?v=1.0.0"></script>

<script src="{{ asset('argon') }}/js/argon.min.js?v=2.0.1"></script>
<script src="{{ asset('assets') }}/select2/js/select2.min.js?v=1.0.0"></script>

@stack('js')
</body>

</html>

