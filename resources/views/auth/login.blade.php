{{-- Gọi bố cục sẽ kế thừa --}}
@extends('layouts.layout_login')
@section('title', __('Login'))
{{-- Section - Định nghĩa 1 phần nội dung. @yield sẽ gọi tên của section --}}
@section('content')
    {{-- @parent viết thêm vào phần content được định nghĩa sẵn ở layouts cha, nếu ko có sẽ ghi đè --}}
    @parent
    <main class="page-login">
        <div class="wrapper">
            <div class="wrapper-container">
                <div id="preloader">
                    <div class="spinner-border logo-preload" role="status">
                        <span class="visually-hidden">{{ __('Loading...') }}</span>
                    </div>
                </div>
                <div class="block-login row">
                    <div class="login-left col-lg-7 col-md-6 d-sm-none d-md-flex">
                        <img src="./uploads/logo/logo-white-432x105.png" alt="Logo EI Germeny" class="img-fluid" />
                    </div>
                    <div class="login-right col-12 col-lg-5 col-md-6">
                        <form method="POST" action="{{ route('login.custom') }}" id="signin-form"
                            class="open-form js-validateform">
                            @csrf
                            <div class="login-top">
                                <a href="/" class="btn btn-back">
                                    <img src="{{ Vite::asset('resources/assets/icon/left-arrow-0.png') }}" alt=""
                                        class="icon-back" />{{ __('Login') }}</a>
                            </div>
                            <div class="login-middle">
                                <img src="{{ asset('/uploads/logo/logo-full-428x104.png') }}" alt="Logo EI Germeny"
                                    class="img-fluid" />
                                <p class="edit-text">{{ __('Welcome to EI Germany!') }}</p>
                            </div>
                            <div class="login-middle-after">
                                <div class="login-form">
                                    <!-- Email/phone input -->
                                    <div class="form-outline">
                                        @if ($errors->has('email'))
                                            <div class="div-input form-warning">
                                            @else
                                                <div class="div-input">
                                        @endif
                                        <span class="icon ti-email"></span>
                                        <input type="email" id="formAccount" class="form-control"
                                            placeholder="Ex: abc@gmail.com" name="email" autofocus />
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="error-mes">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <!-- Password input -->
                                <div class="form-outline">
                                    @if ($errors->has('email'))
                                        <div class="div-input form-warning">
                                        @else
                                            <div class="div-input">
                                    @endif
                                    <span class="icon ti-lock"></span>
                                    <input type="password" id="formPassword" class="form-control" placeholder="Mật khẩu"
                                        name="password" />
                                    {{-- <img src="{{ asset('/icon/eye-close.png') }}" alt="" class="icon-back" /> --}}
                                    <span class="btn-showpass"><i class="bi bi-eye-slash"></i></span>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="error-mes">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-outline d-none">
                                <div class="checkbox ms-2">
                                    <label class="d-flex align-items-center">
                                        <input type="checkbox" name="remember" class="me-2"> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-login mb-4">{{ __('Login') }}</button>
                            <div class="text-center forgot-password">
                                <!-- Forgot password buttons -->
                                <p><a class="forgot-password-link js-showhide">{{ __('Forgotten password') }}?</a></p>
                                <!-- Register buttons -->
                                <p>{{ __('No account') }}?<a href="register" class="forgot-password-link">
                                        {{ __('Register') }}</a></p>
                            </div>
                    </div>
                </div>
                </form>
                <form action="" id="forgot-password-form" style="display: none;">
                    <div class="login-top">
                        <a class="btn btn-back js-showhide">
                            <img src="{{ Vite::asset('resources/assets/icon/left-arrow-0.png') }}" alt=""
                                class="icon-back" />{{ __('Forgotten password') }}?</a>
                    </div>
                    <div class="login-middle">
                        <img src="./uploads/logo/logo-full-428x104.png" alt="Logo EI Germeny"
                            class="img-fluid logo-full-428x104" />
                        <p class="edit-text">{{ __('Enter your email to initiate password recovery.') }}</p>
                    </div>
                    <div class="forgot-password-form">
                        <!-- Email/phone input -->
                        <div class="form-outline">
                            <div class="div-input">
                                <span class="icon ti-email"></span>
                                <input type="email" id="forgotAccount" class="form-control" placeholder="Email"
                                    required />
                            </div>
                        </div>
                        <!-- Submit button -->
                        <!-- <button type="button" class="btn btn-login mb-4">Tiếp tục</button> -->
                        <a type="button" class="btn btn-login mb-4" href="./otp.html">{{ __('Continue') }}</a>
                    </div>
                </form>
            </div>
        </div>
        </div>
        </div>
    </main>
@endsection
