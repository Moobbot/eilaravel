<header id="user-header" class="user-header background-white">
    <div class="user-header-container container">
        <div class="user-header-container-inner">
            <div class="user-header-left">
                <div class="header-logo">
                    <img src="{{ asset('/uploads/logo/logo-full.png') }}" alt="Logo EI Germeny" class="img-fluid" />
                </div>
            </div>
            <div class="user-header-right">
                <div class="user-account login-account">
                    <a class="btn btn-login" href="login">
                        <img src="{{ Vite::asset('resources/assets/icon/Login.png') }}" alt=""
                            class="icon-user" />{{ __('Login') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
