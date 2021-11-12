@include('layouts.estrutura.header')

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

{{-- Entregador --}}
@if (auth()->user()->tipo === 'entregador')
    @include('layouts.entregadores.sidebar')

    <div class="main-content">
        @include('layouts.entregadores.navbar.navbar-pc')
@endif

{{-- Cliente --}}
@if (auth()->user()->tipo === 'cliente')
    @include('layouts.clientes.sidebar')

    <div class="main-content">
        @include('layouts.clientes.navbar.navbar-pc')
@endif

{{-- Admin --}}
@if (auth()->user()->tipo === 'admin')
    @include('layouts.admin.sidebar')

    <div class="main-content">
        @include('layouts.admin.navbar.navbar-pc')
@endif

{{-- Conferente --}}
@if (auth()->user()->tipo === 'conferente')
    @include('layouts.conferente.sidebar')

    <div class="main-content">
        @include('layouts.conferente.navbar.navbar-pc')
@endif

@yield('content')
</div>

@include('layouts.componentes.modal-sucesso')

@include('layouts.estrutura.footer')
