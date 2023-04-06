<header>
    <div class="px-3 py-2 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                {{-- Logo --}}
                <a href="{{route('home')}}"
                   class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                    <h2>{{ config('app.name') }}</h2>
                </a>

                <div class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    {{-- Home --}}
                    <li>
                        <a href="{{route('home')}}" class="nav-link text-white">
                            <img class="bi d-block mx-auto mb-1" width="24" height="24"
                                 src="/img/header/home.png">
                            Главная
                        </a>
                    </li>
                    {{-- Cart --}}
                    <li>
                        <a href="{{route('categories')}}" class="nav-link text-white">
                            <img class="bi d-block mx-auto mb-1" width="24" height="24"
                                 src="/img/header/grid.png">
                            Каталог
                        </a>
                    </li>
                    {{-- Browse --}}
                    <li>
                        <a href="{{route('cart')}}" class="nav-link text-white">
                            <img class="bi d-block mx-auto mb-1" width="24" height="24"
                                 src="/img/header/cart.png">
                            Корзина
                        </a>
                    </li>
                    @auth
                    {{-- Profile --}}
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre>
                                {{-- Profile image --}}
                                <img src="/img/header/profile.png" class="rounded-circle" width="32"
                                     height="32"> </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                {{-- Personal Home Page --}}
                                <a class="dropdown-item" href="{{ route('user') }}">Моя страница</a>
                                {{-- Orders --}}
                                <a class="dropdown-item" href="/user/orders">Мои заказы</a>
                                <hr class="dropdown-divider">
                                {{-- Logout --}}
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                    {{ __('Выйти') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Authentication Links -->
    @guest
        <div class="px-3 py-2 border-bottom mb-3">
            <div class="container d-flex flex-wrap justify-content-center">
                <div class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto"></div>
                <div class="text-end">
                    {{-- Login --}}
                    @if(Route::has('login'))
                        <a href="{{route('login')}}" style="text-decoration:none">
                            <button type="button" class="btn btn-light text-dark me-2">{{ __('Войти') }}</button>
                        </a>
                    @endif
                    {{--Register--}}
                    @if(Route::has('register'))
                        <a href="{{route('register')}}" style="text-decoration:none">
                            <button type="button" class="btn btn-dark">{{ __('Зарегистрироваться') }}</button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endguest
</header>
