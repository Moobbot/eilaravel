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
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- CSS --}}
    {{-- <link rel="stylesheet" href="{{ asset('resources/css/alter.css') }}"> --}}
    {{-- @vite(['resources/css/alter.css', 'resources/css/template.css', 'resources/css/app-v1.css', 'resources/css/responsive.css']) --}}
    @vite('resources/css/app.css')
    {{-- @vite(['public/jquery-3.6.4.min.js', 'resources/js/common.js', 'resources/js/validate.js', 'resources/js/form.js', 'resources/js/app-v1.js']) --}}
    @vite(['public/jquery-3.6.4.min.js', 'resources/js/app.js'])
    {{-- Javascript --}}
</head>

<body>
    tcvygubhnijmk,lp
    <?php

    ?>
</body>
{{-- Gọi từ trong forder public --}}
{{-- <script src="{{ asset('jquery-3.6.4.min.js') }}"></script> --}}

</html>
