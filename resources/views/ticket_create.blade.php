@extends('layouts.lottery')

@section('title', 'Купить лотерейный билет {{$lottery->name}}')

@section('content')
<div class="content">
    @include('includes.partials.messages')
    <div class="container">
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
<!--content-->
@endsection