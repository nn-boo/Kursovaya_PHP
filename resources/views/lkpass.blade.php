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

            <form action="{{route('tickets.lk.passChange')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input required type="password" class="form-control" id="password" name="password"
                           placeholder="Пароль">
                </div>
                <br>
                <button type="submit" class="btn btn-outline-primary">Изменить пароль</button>
                <a href="{{route('tickets.lk')}}" class="btn btn-outline-primary">Вернуться</a>
            </form>
        </div>
    </main>
@endsection
