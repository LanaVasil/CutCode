{{-- <div> --}}
{{-- Auth::user(); --}}
<header class="header">
    <div class="header-middle bg-white">
        <div class="container">
            {{-- <div class="container-fluid"> --}}
            <div class="row align-items-center">
                <div class="col-12 col-sm-8">

                    <a class="icon-link" href="{{ route('home') }}">
                        <svg class="bi" aria-hidden="true">
                            <use xlink:href="#logo"></use>
                        </svg>
                    </a>
                    ДУ «ЦОП Національної поліції України»</span>
                </div>

                <div class="col-12 col-sm-4 cart-buttons text-end">


                    <a href="#" class="btn icon-link">
                        <svg class="bi">
                            <use xlink:href="#birday"></use>
                        </svg>

                        <span class="badge text-bg-warning cart-badge bg-warning rounded-circle">
                            3
                        </span>
                    </a>

                    {{-- Offcanvas-Пакет: Cart 55 --}}
                    <div class="cart-header">
                        <button class="cart-header__icon btn icon-link" id="package-open" type="button"
                            data-bs-toggle="offcanvas_OFF" data-bs-target="#offcanvasCart"
                            aria-controls="offcanvasCart">
                            {{-- додається через JS, коли Device додаємо в Пакет
                            <svg class="bi"><use xlink:href="#bag"></use></svg>
                            <span class="badge text-bg-warning cart-badge bg-warning rounded-circle">55</span> --}}
                        </button>
                        {{-- ./Cart --}}
                    </div>

                </div>

                <!-- offcanvas -->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart"
                    aria-labelledby="offcanvasCartLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasCartLabel">
                            Пакет
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Закрыть"></button>
                    </div>
                    <div class="offcanvas-body">

                        <div class="cart-header__body">
                            <table class="table">
                                <tbody class="cart-header__list cart-list">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="text-end">Разом:</td>
                                        <td class="cart-list__total text-end">325</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="text-end">
                            <a href="#" class="btn btn-outline-warning">
                                {{ __('Оформити') }}
                            </a>
                            {{-- session()->push('cart', $device); --}}
                        </div>

                    </div>
                </div>
                <!-- ./offcanvas -->
            </div>
        </div>
        <!-- ./container-fluid -->
    </div>
    <!-- ./header-middle -->
</header>

<div class="header-bottom sticky-top" id="header-nav">
    <nav class="navbar bg-dark navbar-expand-md bg-body-tertiary" data-bs-theme="dark">

        <div class="container-fluid">

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ active_link('home') }}" aria-current="page">
                            {{ __('Головна') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ active_link('dashboard') }}"
                            aria-current="page">
                            {{ __('Dashboard') }}
                        </a>
                    </li>



                    <!--/ якщо користувач залогінився, то бачать меню -->


                    <li class="nav-item">
                        {{-- <x-forms.nav-link href="/repairs" :active="request()->is('repairs') or request()->is('repairs/*')">Комп'ютери</x-nav-link> --}}
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('admin.devices.index') }}"
                            class="nav-link {{ active_link('admin.devices.index') }}" aria-current="page">
                            {{ __('Картриджі / Техніка') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        {{-- <x-forms.nav-link href="/brands" :active="request()->is('brands')">Бренди</x-nav-link> --}}
                    </li>

                    <li class="nav-item">
                        {{-- <x-forms.nav-link href="/devtypes" :active="request()->is('devtypes')">Типи приладів</x-nav-link> --}}
                    </li>
                    <li class="nav-item">
                        {{-- <x-forms.nav-link href="/units" :active="request()->is('units')">Підрозділи</x-nav-link> --}}
                    </li>

                </ul>

                <a class="btn btn-sm btn-outline-warning" href="{{ route('logout') }}"> {{ auth()->user()->name }}
                    {{-- <svg class="bi" aria-hidden="true">           <use xlink:href="#door-exit"></use>                   </svg> --}}

                    вийти?</a>






            </div>
        </div>
    </nav>
</div>
{{-- ----- /header-bottom ----- --}}
{{-- </div> --}}
