@if ($user === 'admin')
    <x-layouts.layout_v1.template>
        <x-slot name="sidebar_menu">
            <x-layouts.elements.admins.sidebar-menu></x-layouts.elements.admins.sidebar-menu>
        </x-slot>
        <x-slot name="navbar_menu">
            <x-layouts.elements.admins.navbar-dropdown></x-layouts.elements.admins.navbar-dropdown>
        </x-slot>
        {{ $slot }}
    </x-layouts.layout_v1.template>
@endif

@if ($user === 'cliente')
    <x-layouts.layout_v1.template>
        <x-slot name="sidebar_menu">
            <x-layouts.elements.clientes.sidebar-menu></x-layouts.elements.clientes.sidebar-menu>
        </x-slot>
        <x-slot name="navbar_menu">
            <x-layouts.elements.clientes.navbar-dropdown></x-layouts.elements.clientes.navbar-dropdown>
        </x-slot>
        {{ $slot }}
    </x-layouts.layout_v1.template>
@endif

@if ($user === 'conferente')
    <x-layouts.layout_v1.template>
        <x-slot name="sidebar_menu">
            <x-layouts.elements.conferentes.sidebar-menu></x-layouts.elements.conferentes.sidebar-menu>
        </x-slot>
        <x-slot name="navbar_menu">
            <x-layouts.elements.conferentes.navbar-dropdown></x-layouts.elements.conferentes.navbar-dropdown>
        </x-slot>
        {{ $slot }}
    </x-layouts.layout_v1.template>
@endif

@if ($user === 'entregador')
    <x-layouts.layout_v1.template>
        <x-slot name="sidebar_menu">
            <x-layouts.elements.entregadores.sidebar-menu></x-layouts.elements.entregadores.sidebar-menu>
        </x-slot>
        <x-slot name="navbar_menu">
            <x-layouts.elements.entregadores.navbar-dropdown></x-layouts.elements.entregadores.navbar-dropdown>
        </x-slot>
        {{ $slot }}
    </x-layouts.layout_v1.template>
@endif




