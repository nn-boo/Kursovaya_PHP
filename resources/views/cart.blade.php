@extends('layouts.main')
@section('content')
    <main class="container-fluid fade show bg-light bg-gradient" style="--bs-bg-opacity: .75;">
        <div class="row min-vh-100">
            <h1>Корзина</h1>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                @endforeach
            @endif
            @if($not_empty_count > 0)
                <div class="table-responsive-sm">
                    <table class="table table-hover">
                        <tr>
                            <th class="d-none d-md-block">Фото</th>
                            <th>Наименование</th>
                            <th>Цена</th>
                            <th>Количество</th>
                            <th class="d-none d-md-block">Стоимость</th>
                        </tr>
                        @foreach($tickets as $ticket)
                            @if(!is_null(\App\Models\TicketUser::where('ticket_id', $ticket->id)->where('user_id', Auth::user()->getAuthIdentifier())->first()))
                            <tr>
                                <td class="d-none d-md-block"><img class="img-thumbnail"
                                                                   style="width: 20em; height: 20em;"
                                                                   src="data:image;base64,{{($ticket->image)}}"
                                                                   alt="Ticket photo"></td>
                                <td class="align-middle">{{$ticket->title}}</td>
                                <td class="align-middle">{{$ticket->cost}}</td>
                                <td class="align-middle text-center">{{\App\Models\TicketUser::where('ticket_id', $ticket->id)->where('user_id', Auth::user()->getAuthIdentifier())->first('count')['count']}}</td>
                                <td class="align-middle d-none d-md-table-cell">{{(int) \App\Models\TicketUser::where('ticket_id', $ticket->id)->where('user_id', Auth::user()->getAuthIdentifier())->first('count')['count'] * $ticket->cost}}</td>
                            </tr>
                            @endif
                        @endforeach
                    </table>

                    <form method="post" action="{{route('tickets.cart.create')}}" >
                        @csrf
                        <p>Билеты будут зарезервированы на ФИО, указанный в вашем аккаунте,
                            ответы на вопросы читайте в FAQ (<a href="{{route('tickets.about')}}">Клик</a>)</p>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a role="button" class="btn btn-secondary" href="{{route('tickets.cart.clear')}}">Очистить</a>
                            <input value="Заказать" type="submit" role="button" class="btn btn-secondary">
                            <button type="button" disabled class="btn btn-success">{{$summary}}</button>
                        </div>
                    </form>
                </div>
            @else
            <div>
                <h3>Ваша корзина пуста</h3>
            </div>
            @endif
        </div>
        <br>
    </main>
@endsection
