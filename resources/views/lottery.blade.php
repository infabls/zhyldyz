@extends('layouts.lottery')

@section('title', 'Все лотереи от компании dfw.kz')

@section('content') 
{{--    <div id="app" class="flex-center position-ref full-height">
            <div class="top-right links">
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

            <div class="content">
                @include('includes.partials.messages')



                
    <div class="container">
        <div class="pricing">
        <div class="row">
            <div class="col-md-6">
                <article class="animate fadeIn" data-wow-delay="0.4s">
                    <div class="price-head"> <span class="plan-tittle">Лотерея</span> <span class="plan-price">{{$lottery->price}}<span>тг</span></span> </div>  
                                    @isset($ended)
                                @if ($ended)
                                <h1 style="color: red">ЗАВЕРШЕНА</h1>
                                @endif
                            @endisset
                    <ul>
                      <li>{{$lottery->description}}</li>
                      @if ($lottery->ticket_count > 0)
                      <li>Количество участников: {{$lottery->ticket_count}}<i class="fa fa-check"></i></li>
                      @else
                      <li>Пока ни одного участника. Хотите стать первым?<i class="fa fa-check"></i></li>
                      @endif
                      <li><p>Дата начала: {{$lottery->starts_at}}</p><i class="fa fa-check"></i></li>
                      <li><p>Розыгрыш: {{$lottery->ends_at}}</p><i class="fa fa-check"></i></li>
                      <li><p>Цена участия: {{$lottery->price}}</p><i class="fa fa-check"></i></li>
                      <li><p>Уже денег: {{$lottery->price * $lottery->ticket_count * 0.8}}</p><i class="fa fa-check"></i></li>
                    </ul>
                    <a href="/lottery/{{$lottery->id}}/create" class="btn btn-inverse">Участвовать</a>
                </article>
            </div>
            <div class="col-md-6">
                <h1>Форма   {{$lottery->name}}</h1>
                <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url()->current()}}">
                @csrf
                <div class="box_detail booking">
                    <div class="form-group" id="input-dates">
                        <div class="form-group">
                            <label for="code">Ваш код</label>
                            <input  name="code" type="text" class="form-control" id="code" required="" placeholder="Введите код из 10 символов" minlength='10' maxlength='10'>
                        </div>
                    </div>
                    <div class="form-group" id="input-dates">
                        <div class="form-group">
                            <label for="phone">Номер телефона</label>
                            <input  name="phone" type="tel" class="form-control" id="phone" placeholder="+7 777 333 45 67">
                        </div>
                    </div>
                    <button type="submit" class="add_top_30 btn_1 full-width purchase">Купить билет</button>
                    <div class="text-center"><small>Обязательно сохраните код - иначе горох!</small></div>
                </div>
                </form>
            </div>
        </div>
    </div>


            </div><!--content-->
        </div><!--app-->
@endsection