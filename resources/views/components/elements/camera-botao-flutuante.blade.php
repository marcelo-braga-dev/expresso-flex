<a class="btn-flutuante-{{ $posicao ?? '1' }} {{ $bg ?? 'btn-warning' }} btn-camera"
   href="{{ route('entregadores.qrcode', [$operacao, $retorno]) }}"  id="btn-flutuante-{{ $posicao ?? '1' }}"
   style="display: none">
    <i style="margin-top:12px" class="{{ $icon ?? 'fas fa-camera' }}"></i>
</a>
@push('js')
    <script>
        if (typeof Android == 'object') {
            if (Android.isAndroid()) {
                $('.btn-camera').show();
            }
        }
        $(function () {
            $('.link-btn-flutuante-1').click(function () {
                window.location.href = $('#btn-flutuante-1').attr('href');
            });
            $('.link-btn-flutuante-2').click(function () {
                window.location.href = $('#btn-flutuante-2').attr('href');
            });
        })
    </script>
@endpush
