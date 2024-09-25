@extends('components.layouts.entry')

@section('title', 'Вхід')

@section('content')
    <x-forms.form action="{{ route('login.auth') }}" method="POST">

        <div class="entry__wrapper">
            <x-forms.input-login name="login" label="Логін" asterisk autofocus />
            <x-forms.input-login name="password" label="Пароль" type="password" asterisk />

            <x-forms.checkbox name="remember">
                {{ __('Запам`ятати мене') }}
            </x-forms.checkbox>

            <x-forms.button-go class="entry__submit">
                {{ __('До роботи') }}
            </x-forms.button-go>
        </div>

    </x-forms.form>

    <div class="entry__group">
        <a class="entry__link" href="{{ route('register') }}">Реєстрація</a>
        <a class="entry__link" href="{{ route('password.request') }}">Забули пароль?</a>
    </div>
@endsection
