@extends('layouts.lottery')

@section('title', 'Все лотереи от компании dfw.kz')

@section('content') 
    <div id="app" class="flex-center position-ref full-height">
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
            </div><!--top-right-->

            <div class="content">
                @include('includes.partials.messages')


                @isset($ended)
                    @if ($ended)
                    <h1 style="color: red">ЗАВЕРШЕНА</h1>
                    @endif
                @endisset
                
                <h1>Название: {{$lottery->name}}  </h1>
                <p>Описание: {{$lottery->description}}</p>
                @if ($lottery->ticket_count > 0)
                <p>Количество участников: {{$lottery->ticket_count}}</p>
                @else
                <p>Пока ни одного участника. Хотите стать первым?</p>
                @endif
                <p>Дата начала: {{$lottery->starts_at}}</p>
                <p>Дата окончания: {{$lottery->ends_at}}</p>
                <p>Цена участия: {{$lottery->price}}</p>
                <p>Уже денег: {{$lottery->price * $lottery->ticket_count * 0.8}}</p>

                    <div class="btn btn-danger"><a href="/lottery/{{$lottery->id}}/create">Участвовать</a></div>


            </div><!--content-->
        </div><!--app-->
@endsection