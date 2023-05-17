{{-- <title>
    @if (isset($page_title) && strlen($page_title) != 0)
        {{ $page_title }}
    @else
        Laravel
    @endif
</title> --}}

@extends('layouts.master')

@section('title', __('Home'))

@prepend('css-plugins')
    @vite('resources/css/app.css')
@endprepend

@prepend('js-plugins')
    @vite('resources/js/app_v1.js')
@endprepend

@section('content')
    @parent
    @extends('layouts.partials.header')

    @auth
        <a href="/logout">{{ __('Logout') }}</a>
        <h1>Dashboard</h1>
        <p class="lead">Only authenticated users can access this section.</p>
    @endauth

    @guest
        <a href="/login">{{ __('Login') }}</a>
        <div class="">
            <h1>Đây là trang chủ - chưa đăng nhập</h1>
            <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        </div>
    @endguest
    @extends('layouts.partials.footer')

@endsection
