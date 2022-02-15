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

    <link type="text/css" href="/assets/css/font-google.css" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=2.0.1" rel="stylesheet">
    <link type="text/css" href="/assets/css/style.css?ver=1.0" rel="stylesheet">
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

@include('layouts.componentes.modal-sucesso')

@stack('js')
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $('.select2').select2({--}}
{{--            theme: "bootstrap4"--}}
{{--        });--}}
{{--    });--}}

{{--    $(function () {--}}
{{--        const href = location.origin + location.pathname;--}}
{{--        const aba_menu = $('.nav-link[href="' + href + '"]');--}}

{{--        aba_menu.addClass('active');--}}
{{--        aba_menu.parent().parent().parent().addClass('show');--}}

{{--        aba = $('#menu_suspenso').val();--}}
{{--        $('.collapse .' + aba).addClass('show');--}}
{{--    })--}}
{{--</script>--}}


<script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

{{-- <script src="/assets/js/jquery.mask.min.js"></script> --}}
<script src="/assets/js/config.js"></script>

<script src="{{ asset('argon') }}/js/argon.min.js?v=2.0.0"></script>
<script src="/assets/vendor/select2/dist/js/select2.min.js"></script>

<input type="hidden" id="menu_suspenso"
       value="@if (!empty($menu_suspenso)){{ $menu_suspenso }}@else{{ 'empty' }}@endif">

</body>

</html>

