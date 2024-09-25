<div class="form-control-group mb-2">
    <label for="{{ $id }}" class="form-label {{ $asterisk }}">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}"
        value="{{ $oldExists ? $old : ($hasRow ? $row[$name] : '') }}" placeholder="{{ $placeholder }}"
        class="form-control @error($name) is-invalid @enderror" id="{{ $id }}" autocomplete="off"
        {{ $autofocus }} />

    <span class="text-danger">
        @error($name)
            {{ $message }}
        @enderror
    </span>
</div>
