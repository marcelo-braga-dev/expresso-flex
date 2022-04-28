<div class="form-group">
    <label class="form-control-label">{{ $label }}</label>
    <select name="{{ $name }}" {{$attributes}} class="select2">
        {{ $slot }}
    </select>
</div>
