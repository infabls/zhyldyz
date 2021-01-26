@extends('layouts.lottery')

@section('title', 'Все лотереи от компании dfw.kz')

@section('content')
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
@endsection