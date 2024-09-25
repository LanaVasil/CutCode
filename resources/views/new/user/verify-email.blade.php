@extends('components.layouts.entry')

{{-- @section('title', 'Лист надіслано на електрону пошту') --}}

@section('content')
    <div class="alert alert-success">
        {{ Auth::user()->name }}, дякуємо за реєстрацію!<br>
        На електронну адресу <strong>{{ Auth::user()->email }}</strong> було надіслано листа.
        Обов'язково перевірте поштову скриньку і завершіть процес реєстрації.<br>
        <br><small>Примітка: Якщо ви не отримаєте електронний лист через кілька хвилин:
            <br>- перевірте папку зі спамом
            <br>- перевірте, чи правильно ви ввели адресу електронної пошти.
        </small>
    </div>
    Ще не отримали підтвердження?
    <x-forms.form action="{{ route('verification.send') }}" method="POST">

        <x-forms.button-go class="entry__submit">
            {{ __('Повторити відправлення') }}
        </x-forms.button-go>

        {{-- <button class="btn btn-link ps-0">Повторити відправлення</button> --}}
    </x-forms.form>

    <div class="entry__group">
        <a class="entry__link" href="{{ route('login') }}" id="register-btn">Логін</a>
        <a class="entry__link" href="{{ route('register') }}" id="register-btn">Реєстрація</a>
    </div>
@endsection
