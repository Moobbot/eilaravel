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
    <a href="/login">{{ __('Login') }}</a>
@endsection
