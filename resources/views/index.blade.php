@extends('layouts.main')
@section('content')

    <main class="container-fluid fade show bg-light bg-gradient" style="--bs-bg-opacity: .75;">
        <div class="row min-vh-100">
            <div class="col-md-6 m-auto">
                <img class="img-fluid rounded" src="{{asset('images/main.jpg')}}" alt="Flowers">
            </div>
            <div style="font-family: 'Comic Sans MS', serif;" class="col-md-6 text-justify m-auto lh-lg">
                Мы профессионалы своего дела! У нас самые мощные вечеринки в РФ, так как основатель с Ибицы и берем на
                работу мы только тех, у кого в роду были самые отрывные! Самое веселье только тут, заказывайте билеты и приходите!
            </div>
        </div>
    </main>

@endsection
