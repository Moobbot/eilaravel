<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
{{-- <html lang="en  "> --}}

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="locale" content="{{ App::getLocale() }}" />
    @stack('meta')
    {{-- @if (isset($page_title) && strlen($page_title) != 0) {{ $page_title }}@else Laravel @endif --}}

    <title>@yield('title', 'Laravel')</title>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {{-- @vite('resources/assets/...'); --}}
    @vite(['resources/assets/plugin/bootstrap-5.0.2-dist/css/bootstrap.css', 'resources/assets/plugin/icons-1.10.4/font/bootstrap-icons.css', 'resources/assets/plugin/themify-icons-font/themify-icons.css'])

    {{-- @vite() --}}
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN THEME GLOBAL STYLES - CSS Plugins for Most Pages -->
    @vite(['resources/css/alter.css', 'resources/css/template.css'])
    @vite('resources/css/responsive.css')
    <style>
        .logo-preload {
            background-image: url('./uploads/logo/logo-preload.svg');
        }
    </style>
    <!-- END THEME GLOBAL STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    @stack('css-plugins') {{-- css plugin for the current view --}}
    @stack('extra_css') {{-- peculiar css for some child parts in view --}}
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    @stack('css-styles') {{-- css custom styles for the current view. Style for holiday/event --}}
    <!-- BEGIN PAGE LEVEL STYLES -->


    {{-- Thêm 1 đoạn code dùng @include, @extends áp dụng cho layout --}}
    {{-- @yield hiện thị 1 phần nội dung (Gọi 1 section được định nghĩa) --}}

</head>

<body>
    <div id="preloader">
        <div class="spinner-border logo-preload" role="status">
            <span class="visually-hidden">{{ __('Loading...') }}</span>
        </div>
    </div>
    {{-- @section('sidebar') @show  Nếu dùng @show sẽ xác định nội dung bên trong section và xây dựng html --}}
    {{-- @yield('content', 'Default content') --}}
    <main
        class="page-{{ Request::is('home/*')
            ? 'home'
            : (Request::is('login', 'login/*', 'register', 'register/*')
                ? 'login'
                : 'abc') }}">
        {{-- class="page-{{ Request::is('home/*') ? 'home' : (Request::is('login') || Request::is('login/*') ? 'login' : 'abc') }}"> --}}
        <div class="wrapper">
            <div class="wrapper-container">
                @section('content')
                    <div class="test-lang"
                        style="position: fixed; top: 20px; right: 20px; z-index: 999; font-size: 20px; background-color: pink; padding: 5px 10px;">
                        <a href="{{ route('app.setLocale', ['locale' => 'en']) }}"
                            style="border-right: 1px solid red; padding: 5px;">EN</a>
                        <a href="{{ route('app.setLocale', ['locale' => 'vi']) }}" style="padding: 5px;">VI</a>
                    </div>
                @show
            </div>
        </div>
    </main>
    {{-- <div id="app">
        @yield('app')
    </div> --}}
    @stack('modals')
</body>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
@vite('resources/assets/plugin/jquery-3.6.4.min.js')
@vite('resources/assets/plugin/popper.min.js')
@vite('resources/assets/plugin/bootstrap-5.0.2-dist/js/bootstrap.js')
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN THEME GLOBAL STYLES - JS Plugins for Most Pages -->
@vite('resources/js/common.js')
<!-- END THEME GLOBAL STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
@stack('js-plugins') {{-- JS plugin for the current view --}}
@stack('extra_js') {{-- peculiar JS for some child parts in view --}}
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL STYLES -->
@stack('js-scripts') {{-- JS custom styles for the current view. Style for holiday/event --}}
<!-- BEGIN PAGE LEVEL STYLES -->

</html>
