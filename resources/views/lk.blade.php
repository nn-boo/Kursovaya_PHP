@extends('layouts.main')
@section('content')
    <main class="container-fluid fade show bg-light bg-gradient" style="--bs-bg-opacity: .75;">
        <div class="row min-vh-100">
            <h1>Ваш идентификатор: #{{Auth::user()->id}}</h1>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                @endforeach
            @endif

            <form action="{{route('tickets.lk.change')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input required type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}" placeholder="Имя">

                    <label for="email">Email</label>
                    <input required type="text" class="form-control" id="email" value="{{Auth::user()->email}}" name="email" placeholder="Email">
                </div>
                <br>
                <button type="submit" class="btn btn-outline-primary">Изменить данные</button>
                <a class="btn btn-outline-primary" href="{{route('tickets.lk.pass')}}">Изменить пароль</a>
            </form>
        </div>
    </main>
@endsection
