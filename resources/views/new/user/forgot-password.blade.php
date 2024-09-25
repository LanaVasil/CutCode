@extends('components.layouts.entry')

@section('title', 'Забули пароль?')

@section('content')

    <div class="entry__wrapper">
        <small>Надішлимо електроний лист із посилання для зміни пароля.
        </small>
    </div>        

    <x-forms.form action="{{ route('password.email') }}" method="POST">

        <div class="entry__wrapper">
            <x-forms.entry name="email" label="Ел.пошта надана під час реєстрації" autofocus/>

            <x-forms.button-go class="entry__submit">
                {{ __('Надіслати') }}
            </x-forms.button-go>
        </div>

    </x-forms.form>

    <div class="entry__group">
        <a class="entry__link" href="{{ route('login') }}" id="register-btn">Логін</a>
        <a class="entry__link" href="{{ route('register') }}" id="register-btn">Реєстрація</a>
    </div>
@endsection
