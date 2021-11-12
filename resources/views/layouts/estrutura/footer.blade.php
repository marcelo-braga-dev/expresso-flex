@stack('js')
<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: "bootstrap4"
        });
    });

    $(function() {
        const href = location.origin + location.pathname;
        const aba_menu = $('.nav-link[href="' + href + '"]');

        aba_menu.addClass('active');
        aba_menu.parent().parent().parent().addClass('show');

        aba = $('#menu_suspenso').val();
        $('.collapse .' + aba).addClass('show');
    })
</script>

<script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

{{-- <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script> --}}

{{-- <script src="/assets/js/jquery.mask.min.js"></script> --}}
<script src="/assets/js/config.js"></script>
{{-- <script src="/assets/js/table/search.js"></script> --}}

<script src="{{ asset('argon') }}/js/argon.min.js?v=2.0.0"></script>

{{-- <script src="/assets/vendor/js-cookie/js.cookie.js"></script> --}}
{{-- <script src="/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script> --}}
{{-- <script src="/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script> --}}


{{-- <script src="/assets/js/argon.js?v=1.2.0"></script> --}}
<script src="/assets/vendor/select2/dist/js/select2.min.js"></script>

<input type="hidden" id="menu_suspenso" value="@if (!empty($menu_suspenso)){{ $menu_suspenso }}@else{{ 'empty' }}@endif">



</body>

</html>
