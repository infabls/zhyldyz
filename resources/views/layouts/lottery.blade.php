<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')
    @include('includes.partials.head')
    @include('includes.partials.ga')
</head>
<body>
 <!-- LOADER -->
    <div id="loader">
        <div class="position-center-center">
            <div class="loader"></div>
        </div>
    </div>
    <!-- Page Wrapper -->
    <div id="wrap"> 
        @include('includes.partials.messages')
        <!-- Header -->
        @include('includes.partials.header')
        <!-- Nav -->
        @include('includes.partials.flynav')

    {{--     <div id="app" class="flex-center position-ref full-height"> --}}
{{--         <div class="top-right links">
            @auth
            @if ($logged_in_user->isUser())
            <a href="{{ route('frontend.user.dashboard') }}">@lang('Dashboard')</a>
            @endif

            <a href="{{ route('frontend.user.account') }}">@lang('Account')</a>
            @else
            <a href="{{ route('frontend.auth.login') }}">@lang('Login')</a>

            @if (config('boilerplate.access.user.registration'))
            <a href="{{ route('frontend.auth.register') }}">@lang('Register')</a>
            @endif
            @endauth
        </div><!--top-right--> --}}


{{-- </div>app --}}
@yield('content')
@include('includes.partials.footer')

        <!-- GO TO TOP  --> 
        <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
        <!-- GO TO TOP End --> 
    </div>
<!-- End Page Wrapper --> 
<!-- @stack('before-scripts')
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/frontend.js') }}"></script>
 -->
@include('includes.footerscripts')
<!-- @stack('after-scripts') -->
</body>
</html>