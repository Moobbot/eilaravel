{{-- Gọi bố cục sẽ kế thừa --}}
@extends('layouts.layout_login')
@section('title', __('Register'))
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
                        <img src="./uploads/logo/logo-white-432x105.png" alt="Logo EIGermeny" class="img-fluid" />
                    </div>
                    <div class="login-right col-12 col-lg-5 col-md-6">
                        <form action="{{ route('register.custom') }}" method="POST" id="register-form"
                            class="js-validateform">
                            @csrf
                            <div class="login-top">
                                <a href="/login" class="btn btn-back">
                                    <img src="{{ Vite::asset('resources/assets/icon/left-arrow-0.png') }}" alt=""
                                        class="icon-back" />{{ __('Login') }}</a>
                            </div>
                            <div class="login-middle">
                                <img src="./uploads/logo/logo-full-428x104.png" alt="Logo EI Germeny" class="img-fluid" />
                                <p class="edit-text">{{ __('Welcome to EI Germany!') }}</p>
                            </div>
                            <div class="register-form">
                                <!-- Name input -->
                                <div class="form-outline ">
                                    <div class="div-input @if ($errors->has('name')) form-warning is-invalid @endif">
                                        <span class="icon"><i class="bi bi-person"></i></span>
                                        <input type="text" id="registerName" class="form-control"
                                            placeholder="Ex: Nguyễn Văn A" name="name" value="{{ old('name') }}"
                                            autofocus />
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="error-mes">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <!-- Email input -->
                                <div class="form-outline ">
                                    <div class="div-input @if ($errors->has('email')) form-warning is-invalid @endif">
                                        <span class="icon-email ti-email"></span>
                                        <input type="email" id="registerEmail" class="form-control"
                                            placeholder="Ex:abc@gmail.com" name="email" value="{{ old('email') }}" />
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="error-mes">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <!--Phone input -->
                                <div class="form-outline ">
                                    <div class="div-input @if ($errors->has('phone')) form-warning is-invalid @endif">
                                        <span class="icon"><i class="bi bi-telephone"></i> </span>
                                        <input type="tel" id="registerPhone" class="form-control"
                                            placeholder="Ex:+8433445506" name="phone" value="{{ old('phone') }}" />
                                    </div>
                                    @if ($errors->has('phone'))
                                        <span class="error-mes">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <!-- Password input -->
                                <div class="form-outline ">
                                    <div class="div-input @if ($errors->has('password')) form-warning is-invalid @endif">
                                        <span class="icon ti-lock"></span>
                                        <input type="password" id="registerPassword" class="form-control "
                                            placeholder="{{ __('Password') }}" name="password"
                                            value="{{ old('password') }}" />
                                        <span class="btn-showpass"><i class="bi bi-eye-slash"></i></span>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="error-mes">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <!-- Repeat Password input -->
                                <div class="form-outline ">
                                    <div class="div-input @if ($errors->has('password_confirmation')) form-warning is-invalid @endif">
                                        <span class="icon ti-lock"></span>
                                        <input type="password" id="registerRepeatPassword" class="form-control"
                                            placeholder="{{ __('Repeat password') }}" name="password_confirmation"
                                            value="{{ old('password_confirmation') }}" />
                                        <span class="btn-showpass"><i class="bi bi-eye-slash"></i></span>
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="error-mes">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>
                                <!-- Submit button -->
                                <button type="Submit" class="btn btn-login mb-4">{{ __('Register') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
