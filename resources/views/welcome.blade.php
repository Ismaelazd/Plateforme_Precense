@extends('layouts/master')

@section('content')


    @include('components/preloader')

    @include('partials/header')

    @include('partials/hero')

    @include('partials/about')

    @include('partials/team')

    @include('partials/testimonial')

    @include('partials/newsletter')

    @include('components/footer')

    @include('components/eof')

    @include('components/modal')
    
@endsection
