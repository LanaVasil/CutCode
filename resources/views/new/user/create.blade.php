@extends('components.layouts.entry')

@section('title', 'Реєстрація')

@section('content')

    <x-forms.form action="{{ route('user.store') }}" method="POST">
        <div class="entry__wrapper">
            <x-forms.entry name="name" label="Прізвище та ініціали" asterisk autofocus />
            <x-forms.entry name="email" label="Електрона пошта" asterisk />
            <x-forms.entry name="login" label="Логін (від трьох символів)" asterisk />
            <x-forms.entry name="password" label="Пароль (від трьох символів)" type="password" asterisk />
            <x-forms.entry name="password_confirmation" label="Повторити пароль" type="password" asterisk />

            <x-forms.button-go class="entry__submit">
                {{ __('Розпочати') }}
            </x-forms.button-go>
        </div>
    </x-forms.form>

    <div class="entry__group">
        <a class="entry__link" href="{{ route('login') }}" id="register-btn">Вже зареєстровані?</a>
        <a class="entry__link" href="#"></a>
    </div>
@endsection
