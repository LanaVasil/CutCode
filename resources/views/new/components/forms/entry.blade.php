@props(['name', 'label', 'type' => 'text', 'asterisk' => false, 'autofocus' => false])

<div class="entry__box">
    {{-- <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="entry__input @error($name) is-invalid @enderror"  value="{{ old($name) ?? ( isset($item) ? $item[$name] : '' ) }}" autocomplete="off" required /> --}}
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        class="entry__input @error($name) is-invalid @enderror" {{-- @if (old($name)) value="{{ old($name) }}" @endif autocomplete="new-password" required /> --}}
        @if (old($name)) value="{{ old($name) }}" @endif autocomplete="new-ids" required
        {{ $autofocus ? 'autofocus' : '' }} />
    <label for="{{ $name }}" class="entry__label {{ $asterisk ? 'asterisk' : '' }}">{{ $label }}</label>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
