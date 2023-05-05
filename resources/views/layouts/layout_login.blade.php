@extends('layouts.master')

@prepend('css-plugins')
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
@endprepend

@prepend('js-plugins')
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script type="modal" src="{{ asset('assets/js/validate.js') }}"></script>
    <script type="modal" src="{{ asset('assets/js/form.js') }}"></script>
@endprepend
