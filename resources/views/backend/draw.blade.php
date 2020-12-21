@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            Проводим розыгрыш лотереи {{$lottery->name}}
        </x-slot>

        <x-slot name="body">
            Имя победителя - {{$user->name}} <br>
            Email победителя - {{$user->email}} <br>
            Id билета - {{$lottery->winner['id']}} <br>
        </x-slot>
    </x-backend.card>
@endsection
