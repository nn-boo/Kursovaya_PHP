@extends('layouts.admin')
@section('content')
    <h2>Пользователи/Users</h2>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Роль</th>
            <th>Пароль</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->password}}</td>
            </tr>
        @endforeach
    </table>
@endsection
