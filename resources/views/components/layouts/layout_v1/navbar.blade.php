<!-- Top navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-secundario d-none d-md-block" id="navbar-main">
    <div class="container-fluid">
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">{{-- $title --}}</a>

        <ul class="navbar-nav align-items-center d-none d-md-flex">
            {{ $slot }}
        </ul>
    </div>
</nav>
