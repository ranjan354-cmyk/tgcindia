<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ data_get($data ?? [], 'meta_title', 'TGC India — Creative, Digital, Data & AI Courses') }}</title>
    <meta name="description" content="{{ data_get($data ?? [], 'meta_description', 'Build practical skills for creative, digital, data and technology careers with TGC India.') }}">
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/front/redesign/css/tokens.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/redesign/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/redesign/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/redesign/css/layout.css') }}">
    @stack('styles')
    @stack('head')
</head>
<body class="tgc-redesign">
    <a class="tgc-skip-link" href="#main-content">Skip to main content</a>
    @include('frontend.redesign.partials.header')

    <main id="main-content" tabindex="-1">
        @yield('content')
    </main>

    @include('frontend.redesign.partials.footer')
    @include('frontend.redesign.partials.mobile-cta')

    <script src="{{ asset('assets/front/redesign/js/app.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
