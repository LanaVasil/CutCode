@props(['name', 'label', 'type' => 'text', 'asterisk' => false, 'autofocus' => false])

{{-- {{ $asterisk ? $asterisk : '0' }} --}}

<div class="entry__box">
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="entry__input"
        autocomplete="new-ids" required {{ $autofocus ? 'autofocus' : '' }} />
    <label for="{{ $name }}" class="entry__label {{ $asterisk ? 'asterisk' : '' }}">{{ $label }}</label>
</div>
