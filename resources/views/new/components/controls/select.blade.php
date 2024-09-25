{{-- @props(['name' => '', 'label' => '', 'row', 'item', 'asterisk' => false, 'autofocus' => false]) --}}

<div class="form-control-group mb-2">
    {{-- {{ dd($item) }} --}}
    <label class="form-label {{ $asterisk ? 'asterisk' : '' }}">{{ $label }}</label>
    <select id="{{ $id }}" name="{{ $name }}" class="form-select @error($name) is-invalid @enderror">
        <option disabled value="" @selected($selectValue == '') hidden>обрати з переліка</option>

        @foreach ($item as $value => $text)
            <option value="{{ $value }}" @selected($selectValue == $value)> {{ $text }} </option>
            {{-- <option value="{{ $value }}" {{ $select == old($name, $item[$value]) ? 'selected' : '' }}>
                {{ $text }}</option> --}}
        @endforeach



    </select>

    <span class="text-danger">
        @error($name)
            {{ $message }}
        @enderror
    </span>

</div>
