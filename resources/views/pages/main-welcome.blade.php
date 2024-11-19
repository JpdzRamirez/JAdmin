@extends('layouts.welcome')

@section('content')
    <main class="main">
        {{-- Hero Section --}}
        @include('components.sections.welcome.hero')

        {{-- About Section --}}
        @include('components.sections.welcome.about')

        {{-- Features Section --}}
        @include('components.sections.welcome.features')

        {{-- Call to Action --}}
        @include('components.sections.welcome.call')

        {{-- Services --}}
        @include('components.sections.welcome.services')

        {{-- Portfolio --}}
        @include('components.sections.welcome.portfolio')

        {{-- Testimonials --}}
        @include('components.sections.welcome.testimonials')

        {{-- Pricing --}}
        @include('components.sections.welcome.pricing')

        {{-- FAQ --}}
        @include('components.sections.welcome.faq')

        {{-- Team --}}
        @include('components.sections.welcome.team')

        {{-- Blog --}}
        @include('components.sections.welcome.blog')
        
        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <div id="preloader"></div>

    </main>
@endsection
