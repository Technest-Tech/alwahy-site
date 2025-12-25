<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Primary Meta Tags -->
    <title>Alwahy Academy - Online Quran Learning & Islamic Education</title>
    <meta name="title" content="Alwahy Academy - Online Quran Learning & Islamic Education">
    <meta name="description" content="Learn the Holy Quran online with qualified teachers. Join Alwahy Academy for Quran Recitation, Tajweed, Hifz, Arabic Language, and Islamic Studies courses. Flexible schedules and personalized learning.">
    <meta name="keywords" content="Quran learning, online Quran classes, Tajweed, Hifz, Arabic language, Islamic studies, Quran recitation, online Islamic education, Quran academy">
    <meta name="author" content="Alwahy Academy">
    <meta name="robots" content="index, follow">
    <meta name="language" content="{{ app()->getLocale() === 'ar' ? 'Arabic' : 'English' }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="Alwahy Academy - Online Quran Learning & Islamic Education">
    <meta property="og:description" content="Learn the Holy Quran online with qualified teachers. Join Alwahy Academy for comprehensive Islamic education courses.">
    <meta property="og:image" content="{{ asset('logo.png') }}">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta property="twitter:title" content="Alwahy Academy - Online Quran Learning & Islamic Education">
    <meta property="twitter:description" content="Learn the Holy Quran online with qualified teachers. Join Alwahy Academy for comprehensive Islamic education courses.">
    <meta property="twitter:image" content="{{ asset('logo.png') }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white">
    @include('partials.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('partials.footer')
    
    @stack('modals')
</body>
</html>

