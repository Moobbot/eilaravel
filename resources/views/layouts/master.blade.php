{{-- resources/views/layouts/master.blade.php --}}
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @stack('meta')
    {{-- @if (isset($page_title) && strlen($page_title) != 0) {{ $page_title }}@else Laravel @endif --}}
    <title>@yield('title', 'Laravel')</title>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/bootstrap-5.0.2-dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/icons-1.10.4/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/themify-icons-font/themify-icons.css') }}">
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN THEME GLOBAL STYLES - CSS Plugins for Most Pages -->
    <link rel="stylesheet" href="{{ asset('assets/css/alter.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/template.css') }}">
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
    {{-- @section('sidebar') @show  Nếu dùng @show sẽ xác định nội dung bên trong section và xây dựng html --}}
    {{-- @yield('content', 'Default content') --}}
    @section('content')
    @show
    {{-- <div id="app">
        @yield('app')
    </div> --}}
    @stack('modals')
</body>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<script src="{{ asset('assets/plugin/jquery-3.6.4.min.js') }}"></script>
<script src="{{ asset('assets/plugin/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugin/bootstrap-5.0.2-dist/js/bootstrap.js') }}"></script>
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN THEME GLOBAL STYLES - JS Plugins for Most Pages -->
<script src="{{ asset('assets/js/common.js') }}"></script>
<!-- END THEME GLOBAL STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
@stack('js-plugins') {{-- JS plugin for the current view --}}
@stack('extra_js') {{-- peculiar JS for some child parts in view --}}
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL STYLES -->
@stack('js-scripts') {{-- JS custom styles for the current view. Style for holiday/event --}}
<!-- BEGIN PAGE LEVEL STYLES -->

</html>
