@include('layouts.header')
@include('components.hader')

<section class="breadcrumb-area" style="background-image: url({{ asset('assets/img/images/etajerka.jpg') }});">
    <div class="container">
        <div class="breadcrumb-text">
            <h2 class="page-title">Вход</h2>
            <ul class="breadcrumb-nav">
                <li><a href="{{ route('home') }}">Начало</a></li>
                <li class="active">Вход</li>
            </ul>
        </div>
    </div>
</section>

<section class="login-sec pt-120 pb-120">
    <div class="container">
        <div class="account-wrapper">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <div class="login-content" style="background-image: url({{ asset('assets/img/images/dekor4.jpg') }});">
                        <div class="description text-center">
                            <h2>Добре дошли</h2>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="login-form">
                        <h2>Вход</h2>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            {{-- EMAIL --}}
                            <div class="input-group input-group-two mb-20">
                                <input
                                    type="email"
                                    name="email"
                                    placeholder="Е-mail"
                                    value="{{ old('email') }}"
                                >
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- PASSWORD --}}
                            <div class="input-group input-group-two mb-30">
                                <input
                                    type="password"
                                    name="password"
                                    placeholder="Парола"
                                >
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <a href="{{ route('password.request') }}">
                                Забравена парола
                            </a>

                            <button type="submit" class="main-btn btn-filled mt-20 login-btn">
                                Вход
                            </button>

                            <div class="form-seperator">
                                <span>ИЛИ</span>
                            </div>

                            <div class="social-buttons">
                                <button type="button" class="main-btn btn-border facebook mb-20">
                                    <i class="fab fa-facebook-f"></i>
                                    Вход с Facebook
                                </button>
                                <button type="button" class="main-btn btn-filled mb-30">
                                    <i class="fab fa-google"></i>
                                    Вход с Google
                                </button>
                            </div>

                            <p>
                                Нямате акаунт?
                                <a href="{{ route('register') }}" class="d-inline-block">
                                    Регистрация
                                </a>
                            </p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')
