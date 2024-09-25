@extends('components.layouts.entry')

@section('title', 'Змінити пароль')

@section('content')
    <x-forms.form action="{{ route('password.update') }}" method="POST">

        <input type="hidden" name="token" value="{{ $token }}">
        <div class="entry__wrapper">

            <x-forms.entry name="email" label="Електрона пошта" />
            <x-forms.entry name="password" label="Пароль" type="password" />
            <x-forms.entry name="password_confirmation" label="Повторити пароль" type="password" />

            <x-forms.button-go class="entry__submit">
                {{ __('Зберегти') }}
            </x-forms.button-go>


        </div>
    </x-forms.form>

    <div class="entry__group">
        <a class="entry__link" href="{{ route('login') }}" id="register-btn">Логін</a>
        <a class="entry__link" href="{{ route('register') }}" id="register-btn">Реєстрація</a>
    </div>
@endsection
