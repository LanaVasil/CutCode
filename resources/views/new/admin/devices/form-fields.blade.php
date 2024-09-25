<x-controls.input name="name" label="Назва" :row="$device" placeholder="від 3 до 255 символів" asterisk="asterisk"
    autofocus="autofocus" />

<x-controls.select name="devtype_id" label="Види пристроїв" :row="$device" :item="$devtypes" asterisk />

<x-controls.select name="brand_id" label="Бренд" :row="$device" :item="$brands" asterisk />

<x-controls.input name="status" label="Статус" :row="$device" placeholder="0 або 1" />

{{-- при збереженні видає помилку --}}
{{-- <x-controls.check name="status" label="Статус" :row="$device" /> --}}


<x-forms.form-save-yes-no> href="{{ route('admin.devices.index') }}"</x-forms.form-save-yes-no>
