{{-- Gọi bố cục sẽ kế thừa --}}
@extends('layouts.layout_login')
@section('title', 'Đăng ký')
{{-- Section - Định nghĩa 1 phần nội dung. @yield sẽ gọi tên của section --}}
@section('content')
    {{-- @parent viết thêm vào phần content được định nghĩa sẵn ở layouts cha, nếu ko có sẽ ghi đè --}}
    @parent
    <main class="page-login" style="background-image: url({{ asset('/uploads/background_login.png') }})">
        <div class="wrapper">
            <div class="wrapper-container">
                <div id="preloader">
                    <div class="spinner-border" role="status"
                        style="background-image: url('./uploads/logo/logo-preload.svg');">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div class="block-login row">
                    <div class="login-left">
                        <img src="./uploads/logo/logo-white-432x105.png" alt="Logo EI Germeny" class="img-fluid" />
                    </div>
                    <div class="login-right">
                        <form method="POST" action="{{ route('login.custom') }}" id="signin-form"
                            class="open-form js-validateform">
                            @csrf
                            <div class="login-top">
                                <a href="/" class="btn btn-back">
                                    <img src="{{ asset('assets/icon/left-arrow-0.png') }}" alt=""
                                        class="icon-back" />Đăng nhập</a>
                            </div>
                            <div class="login-middle">
                                <img src="{{ asset('/uploads/logo/logo-full-428x104.png') }}" alt="Logo EI Germeny"
                                    class="img-fluid" />
                                <p class="edit-text">Chào mừng bạn đã đến với EI Germany!</p>
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
                                        <input type="checkbox" name="remember" class="me-2"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-login mb-4">Đăng nhập</button>
                            <div class="text-center forgot-password">
                                <!-- Forgot password buttons -->
                                <p><a onclick="ShowHide('#signin-form','#forgot-password-form')"
                                        class="forgot-password-link">Quên mật khẩu?</a></p>
                                <!-- Register buttons -->
                                <p>Chưa có tài khoản?<a href="register.html" class="forgot-password-link"> Đăng
                                        ký</a></p>
                            </div>
                    </div>
                </div>
                </form>
                <form action="" id="forgot-password-form" style="display: none;">
                    <div class="login-top">
                        <a onclick="ShowHide('#signin-form','#forgot-password-form')" class="btn btn-back">
                            <img src="{{ asset('assets/icon/left-arrow-0.png') }}" alt="" class="icon-back" />
                            Quên mật khẩu</a>
                    </div>
                    <div class="login-middle">
                        <img src="./uploads/logo/logo-full-428x104.png" alt="Logo EI Germeny" class="img-fluid" />
                        <p class="edit-text">Hãy nhập email của bạn để bắt đầu lấy lại
                            mật khẩu.</p>
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
                        <a type="button" class="btn btn-login mb-4" href="./otp.html">Tiếp
                            tục</a>
                    </div>
                </form>
            </div>
        </div>
        </div>
        </div>
    </main>
@endsection

@push('extra_js')
    <script type="module" src="{{ asset('assets/js/form.js') }}"></script>
    <script type="module">
    // sử dụng hàm checkLogin trong file khác
    // import  {checkLogin}  from '{{ asset("assets/js/form.js") }}';
    // (function ($) {
    //   $(document).ready(function () {
    //     $(".js-validateform").submit(function (event) {
    //       event.preventDefault();
    //       checkLogin(event, '.js-validateform');
    //     });
    //   });
    // })(window.jQuery);
    </script>
    <script>
        function ShowHide(id_form1, id_form2) {
            let form1 = $(id_form1);
            let form2 = $(id_form2);
            form1.toggle();
            form2.toggle();
            form1.toggleClass("open-form");
            form2.toggleClass("open-form");
            if (form1.hasClass("open-form")) {
                form1.find("input:first").focus();
            } else {
                form2.find("input:first").focus();
            }
        };
        (function($) {
            $(".btn-showpass").click(function(e) {
                e.preventDefault();
                if ($(this).siblings("input").attr("type") == "password") {
                    $(this).siblings('input[type="password"]').attr("type", "text");
                } else {
                    $(this).siblings('input[type="text"]').attr("type", "password");
                }
                $(this).find("i").toggleClass("bi-eye");
                $(this).find("i").toggleClass("bi-eye-slash");
            });
        })(window.jQuery);
    </script>
@endpush
