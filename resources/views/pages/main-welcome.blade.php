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
        
    </main>
@endsection
