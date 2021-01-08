<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ appName() }}</title>
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

        <div id="content" class="content">
            @include('includes.partials.messages')
            <!-- Heading -->
            <!-- Pricing -->
            <section class="pad-t-b-130">
              <div class="container">  
                  <div class="heading-block margin-bottom-30">
                      <h3>Список всех лоттерей. Всего ({{count($lotteries)}})</h3>
                      <hr>
                  </div>
                  <div class="intro-small col-md-8 center-auto">
                      <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout..</p>
                  </div>             
                  <div class="pricing">
                      <div class="row"> 

                          @foreach ($lotteries as $lottery)


                          <!-- Basic -->
                          <div class="col-md-4">
                              <article class="animate fadeIn" data-wow-delay="0.4s">
                                <div class="price-head"> <span class="plan-tittle">Лотерея</span> <span class="plan-price">{{$lottery->price}}<span>тг</span></span> </div>
                       
                                <ul>
                                  @if ($lottery->ticket_count > 0)
                                  <li>Описание: {{$lottery->description}}</li>
                                  <li>Количество участников: {{$lottery->ticket_count}}<i class="fa fa-check"></i></li>
                                  @else
                                  <li>Пока ни одного участника. Хотите стать первым?<i class="fa fa-check"></i></li>
                                  @endif
                                  <li><p>Дата начала: {{$lottery->starts_at}}</p><i class="fa fa-check"></i></li>
                                  <li><p>Дата окончания: {{$lottery->ends_at}}</p><i class="fa fa-check"></i></li>
                                  <li><p>Цена участия: {{$lottery->price}}</p><i class="fa fa-check"></i></li>
                                  <li><p>Уже денег: {{$lottery->price * $lottery->ticket_count * 0.8}}</p><i class="fa fa-check"></i></li>
                              </ul>
                              <a href="/lottery/{{$lottery->id}}" class="btn btn-inverse">Подробнее</a> 
                              <a href="/lottery/{{$lottery->id}}/create" class="btn btn-inverse">Участвовать</a>
                          </article>
                      </div>



                      @endforeach
                  </div>
              </div>
          </div>
      </section>
  </div><!--content-->
{{-- </div>app --}}
@include('includes.partials.footer')

<!-- GO TO TOP  --> 
<a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
<!-- GO TO TOP End --> 
</div>
<!-- End Page Wrapper --> 
@stack('before-scripts')
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/frontend.js') }}"></script>

@include('includes.footerscripts')
@stack('after-scripts')
</body>
</html>
