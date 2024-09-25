<div class="row me-5">
    <div class="col-6 col-md-8">
        <x-forms.button-go class="btn btn-outline-warning w-100">
            {{ __('Зберегти') }}
        </x-forms.button-go>
    </div>
    <div class="col-6 col-md-4">
        <a {{ $slot }} class="btn btn-outline-second">
            {{ __('Не треба') }}
        </a>
    </div>
</div>
