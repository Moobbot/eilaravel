{{-- Gọi bố cục sẽ kế thừa --}}
@extends('layouts.layout_login')
@section('title', 'Đăng ký')
{{-- Section - Định nghĩa 1 phần nội dung. @yield sẽ gọi tên của section --}}
@section('content')
    {{-- @parent viết thêm vào phần content được định nghĩa sẵn ở layouts cha, nếu ko có sẽ ghi đè --}}
    @parent
    <main class="page-login" style="background-image:
    url('./uploads/background_login.png')">
        <div class="wrapper">
            <div class="wrapper-container">
                <div id="preloader">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">{{ __('Loading...') }}</span>
                    </div>
                </div>
                <div class="block-login row">
                    <div class="login-left">
                        <img src="./uploads/logo/logo-white-432x105.png" alt="Logo EIGermeny" class="img-fluid" />
                    </div>
                    <div class="login-right">
                        <form action="" id="register-form" class="js-validateform">
                            <div class="login-top">
                                <a href="login.html" class="btn btn-back">
                                    <img src="{{ Vite::asset('resources/assets/icon/left-arrow-0.png') }}" alt=""
                                        class="icon-back" />{{ __('Forgotten password') }}</a>
                            </div>
                            <div class="login-middle">
                                <img src="./uploads/logo/logo-full-428x104.png" alt="Logo EI Germeny" class="img-fluid" />
                                <p class="edit-text">{{ __('Welcome to EI Germany!') }}</p>
                            </div>
                            <div class="register-form">
                                <!-- Name input -->
                                <div class="form-outline ">
                                    <div class="div-input">
                                        <span class="icon"><i class="bi bi-person"></i></span>
                                        <input type="text" id="registerName" class="form-control"
                                            placeholder="Ex: Nguyễn Văn A" name="fullname" autofocus />
                                    </div>
                                </div><!-- Email input -->
                                <div class="form-outline ">
                                    <div class="div-input">
                                        <span class="icon-email ti-email"></span>
                                        <input type="email" id="registerEmail" class="form-control"
                                            placeholder="Ex:abc@gmail.com" name="email" />
                                    </div>
                                </div>
                                <!--Phone input -->
                                <div class="form-outline ">
                                    <div class="div-input">
                                        <span class="icon"><i class="bi bi-telephone"></i> </span>
                                        <input type="tel" id="registerPhone" class="form-control"
                                            placeholder="Ex:+8433445506" name="phoneNumber" />
                                    </div>
                                </div>
                                <!-- Password input -->
                                <div class="form-outline ">
                                    <div class="div-input">
                                        <span class="icon ti-lock"></span>
                                        <input type="password" id="registerPassword" class="form-control"
                                            placeholder="{{ __('Password') }}" name="password" />
                                        <span class="btn-showpass"><i class="bi bi-eye-slash"></i></span>
                                    </div>
                                </div>
                                <!-- Repeat Password input -->
                                <div class="form-outline ">
                                    <div class="div-input">
                                        <span class="icon ti-lock"></span>
                                        <input type="password" id="registerRepeatPassword" class="form-control"
                                            placeholder="{{ __('Repeat password') }}" name="re_password" />
                                        <img src="./theme/user_theme/icon/eye-close.svg" alt="">
                                        <span class="btn-showpass"><i class="bi bi-eye-slash"></i></span>
                                    </div>
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
