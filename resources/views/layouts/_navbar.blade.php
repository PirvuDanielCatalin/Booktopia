<nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="position: fixed; width: 100%; z-index: 101">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Booktopia') }}
        </a>
        @auth
            @if(Auth::user()->isAdmin() || Auth::user()->isPartner())
                <a class="navbar-brand" href="{{ url('/control-panel') }}">Control Panel</a>
            @endif
        @endauth
        <button aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}"
                class="navbar-toggler"
                data-target="#navbarSupportedContent"
                data-toggle="collapse"
                type="button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a aria-expanded="false"
                           aria-haspopup="true"
                           class="nav-link dropdown-toggle" data-toggle="dropdown"
                           href="#"
                           id="navbarDropdown"
                           role="button"
                           v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="dropdown-item"
                               href="{{ route('profiles.show',['profile' => '1']) }}">My Profile</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>