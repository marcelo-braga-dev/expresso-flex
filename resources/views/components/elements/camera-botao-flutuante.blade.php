<a class="btn-flutuante btn-warning btn-camera"
   href="{{ route('entregadores.qrcode', [$operacao, $retorno]) }}"
   style="display: none">
    <i style="margin-top:12px" class="fas fa-camera"></i>
</a>
@push('js')
    <script>
        if (typeof Android == 'object') {
            if (Android.isAndroid()) {
                $('.btn-camera').show();
            }
        }
    </script>
@endpush
