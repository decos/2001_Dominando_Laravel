<nav class="navbar navbar-light navbar-expand-lg bg-white shadow-sm">

    <div class="container">
        {{--
        <pre>{{ dump(request()->routeIs('home')) }}</pre>
        --}}

        <a class="navbar-brand" href="{{ route('home') }}">
            {{ config('app.name') }}
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link {{ setActive('home') }}"
                        href="{{ route('home') }}">
                        @lang('Home')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('about') }}"
                        href="{{ route('about') }}">
                        @lang('About')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('projects.*') }}"
                        href="{{ route('projects.index') }}">
                        @lang('Projects')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('contact') }}"
                        href="{{ route('contact') }}">
                        @lang('Contact')
                    </a>
                </li>
                @auth
                    {{-- {{ dump(auth()->user()) }} --}}
                    @if (auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link {{ setActive('users') }}"
                                href="{{ route('users.index') }}">
                                @lang('Users')
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>
            <ul class="nav nav-pills ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ setActive('login') }}"
                            href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                @else
                    {{-- <li class="nav-item"> --}}
                        {{--
                        Prevenir la acción por defecto del link de enviarnos a otra página,
                        Obtiene el formulario `logout-form` y ejecuta el método `submit`
                        --}}
                        {{-- <a class="nav-link {{ setActive('logout') }}" href="#" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            Cerrar sesión
                        </a>
                    </li> --}}

                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            data-toggle="dropdown"
                            href="#"
                            role="button">
                            {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a
                                class="dropdown-item"
                                href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>

</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
