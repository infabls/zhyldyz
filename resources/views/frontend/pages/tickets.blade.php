@extends('frontend.layouts.app')

@section('title', __('Terms & Conditions'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="header">
                        Мои билеты
                    </x-slot>

                    <x-slot name="body">
                     <div class="panel-body" style="overflow-x: scroll;">
                     @if (count($tickets) > 0)
                      <table class="table table-striped task-table">
                        <!-- Заголовок таблицы -->
                        <thead>
                          <th>Лотерея</th>
                          <th>Код</th>
                          <th>Дата проведения</th>
                          <th>Статус</th>
                          <th>Действия</th>
                        </thead>
                        <!-- Тело таблицы -->
                        <tbody>
                          @foreach ($tickets as $ticket)
                            <tr>
                              <!-- Имя клиента -->
                              <td class="table-text">
                                <div><a target="_blank" href="/lottery/{{$ticket->lottery['id']}}">{{ $ticket->lottery['name'] }}</a></div>
                              </td> 
                              <td class="table-text">
                                <div>{{ $ticket->code }}</div>
                              </td> 
                              <td>
                                <div>{{ $ticket->lottery['ends_at'] }}</div>
                              </td>
                               <td class="table-text">
                                @if ($ticket->status == 'not paid')
                                <div>Неуплочено</div>
                                @endif
                                @if ($ticket->status == 'paid')
                                <div>Уплочено</div>
                                @endif
                                @if ($ticket->status == 'winner')
                                <div>Выигрыш</div>
                                @endif
                              </td> 

                              <!-- действия с заявками -->
                              <td class="table-text">
                                <form style='float:left' action="{{ url('tickets/'.$ticket->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">
                                      <i class="fa fa-trash"></i> Удалить
                                    </button>
                                  </form>
                                   <form style='float:left' action="{{ url('tickets/'.$ticket->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <button type="submit" class="btn btn-danger">
                                      <i class="fa fa-pen"></i> Оплатить
                                    </button>
                                  </form>
                              </td> 
                            </tr>
                          @endforeach
                          @else
                          <p>У вас ни одного билета. Хотите купить?</p>
                          @endif
                        </tbody>
                      </table>
                    {!! $tickets->render() !!}
                    </div>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
