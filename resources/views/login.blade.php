<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>{{ config('login.page_title', 'Laravel') }}</title> --}}
    {{-- <title>{{ $page_title }}</title> --}}
    <title>
        @if (isset($page_title) && strlen($page_title) != 0)
            {{ $page_title }}
        @else
            Laravel
        @endif
    </title>
    <!-- Fonts -->
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/plugin/bootstrap-5.0.2-dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/icons-1.10.4/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/themify-icons-font/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/alter.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-f6c8e683.css') }}"> --}}
</head>

<body class="page-login" style="background-image:
    url({{ asset('/uploads/background_login.png') }})">
    <div class="wrapper">
        <div class="wrapper-container">
            <div id="preloader">
                <div class="spinner-border" role="status"
                    style="background-image:
            url('./uploads/logo/logo-preload.svg');">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div class="block-login row">
                <div class="login-left">
                    <img src="./uploads/logo/logo-white-432x105.png" alt="Logo EI Germeny" class="img-fluid" />
                </div>
                <div class="login-right">
                    <form action="" id="signin-form" class="open-form js-validateform">
                        <div class="login-top">
                            <a href="/" class="btn btn-back">
                                <img src="{{ asset('assets/icon/left-arrow-0.png') }}" alt=""
                                    class="icon-back" />
                                Đăng nhập</a>
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
                                    <div class="div-input">
                                        <span class="icon ti-email"></span>
                                        <input type="email" id="formAccount" class="form-control"
                                            placeholder="Ex: abc@gmail.com" name="email" autofocus />
                                    </div>
                                </div>
                                <!-- Password input -->
                                <div class="form-outline">
                                    <div class="div-input">
                                        <span class="icon ti-lock"></span>
                                        <input type="password" id="formPassword" class="form-control"
                                            placeholder="Mật khẩu" name="password" />
                                        {{-- <img src="{{ asset('/icon/eye-close.png') }}" alt="" class="icon-back" /> --}}
                                        <span class="btn-showpass"><i class="bi bi-eye-slash"></i></span>
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
                                <img src="{{ asset('assets/icon/left-arrow-0.png') }}" alt=""
                                    class="icon-back" />
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
</body>
{{-- Javascript --}}
{{-- Gọi từ trong forder public --}}
<script src="{{ asset('assets/plugin/jquery-3.6.4.min.js') }}"></script>
<script src="{{ asset('assets/plugin/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugin/bootstrap-5.0.2-dist/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/common.js') }}"></script>
<script type="module" src="{{ asset('assets/js/form.js') }}"></script>
<script src="{{ asset('assets/js/app-v1.js') }}"></script>
<script type="module">
    // sử dụng hàm checkLogin trong file khác
    import  {checkLogin}  from '{{ asset("assets/js/form.js") }}';
    (function ($) {
      $(document).ready(function () {
        $(".js-validateform").submit(function (event) {
          event.preventDefault();
          checkLogin(event, '.js-validateform');
        });
      });
    })(window.jQuery);
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

</html>
