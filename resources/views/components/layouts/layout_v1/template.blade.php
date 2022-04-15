<x-layouts.layout_v1.sidebar>
    <ul class="nav align-items-center d-md-none">
        {{ $navbar_menu }}
    </ul>
    {{ $sidebar_menu }}
</x-layouts.layout_v1.sidebar>

<div class="main-content">
    <x-layouts.layout_v1.navbar>
        {{ $navbar_menu }}
    </x-layouts.layout_v1.navbar>
    {{ $slot }}
</div>

