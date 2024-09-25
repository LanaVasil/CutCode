{{-- Str::uuid() - функція Helpers, в версії 11 в документації відсутня --}}
@php($id = Str::uuid())

<div class="mb-3 form-check">
  
    <input type="checkbox" {{ $attributes->merge([
        'value' => 1, 'checked'=>true
    ]) }} class="form-check-input"
        id="{{ $id }} " />

    <label class="form-check-label pt-1" for="{{ $id }}">
        {{ $slot }}
    </label>

</div>
