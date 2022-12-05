@extends('layouts.main')
@section('content')

    <main class="container-fluid fade show bg-light bg-gradient" style="--bs-bg-opacity: .75;">
        <h1 class="text-center">Список билетов</h1>
        <div class="container mt-4 min-vh-100">
            <div class="d-flex flex-row flex-wrap justify-content-md-between justify-content-center">

                @foreach($tickets as $ticket)
                <div class="mb-3">
                    <div class="card" id="'item_' + {{$ticket->id}}" style="width: 18rem;">
                        <img src="data:image;base64,{{($ticket->image)}}" style="width: 17.9rem;height: 18rem;" class="card-img-top" alt="ticket">
                        <div class="card-body">
                            <h5 class="card-title">{{$ticket->title}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$ticket->place}}</h6>
                            <h6 class="card-subtitle mb-2 text-warning">Осталось {{$ticket->quantity}}</h6>
                            <h6 class="card-subtitle mb-2 text-dark">{{$ticket->when}}</h6>
                            <p class="card-text">{{$ticket->description}}</p>

                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a role="button" href="reserve/remove/{{$ticket->id}}" class="btn btn-secondary">-</a>
                                @if(!Auth::check())
                                    <button type="button" disabled class="btn btn-warning">0</button>
                                @else
                                    @if(is_null(\App\Models\TicketUser::where('ticket_id', $ticket->id)->where('user_id', Auth::user()->getAuthIdentifier())->first('count')))
                                        <button type="button" disabled class="btn btn-warning">0</button>
                                    @else
                                        <button type="button" disabled class="btn btn-warning">{{\App\Models\TicketUser::where('ticket_id', $ticket->id)->where('user_id', Auth::user()->getAuthIdentifier())->first('count')['count']}}</button>
                                    @endif
                                @endif
                                <a role="button" href="reserve/add/{{$ticket->id}}" class="btn btn-secondary">+</a>
                                <button type="button" disabled class="btn btn-success">{{$ticket->cost}}</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </main>
@endsection
