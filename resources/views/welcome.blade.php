{{-- <title>
    @if (isset($page_title) && strlen($page_title) != 0)
        {{ $page_title }}
    @else
        Laravel
    @endif
</title> --}}

@extends('layouts.master')
@section('title', __('Home'))
@section('content')
    @parent
    <a href="/login">{{ __('Login') }}</a>
@endsection
