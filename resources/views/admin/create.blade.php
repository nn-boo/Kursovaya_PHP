@extends('layouts.admin')
@section('content')
    <h2>Добавить Билет/Ticket</h2>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
        @endforeach
    @endif


    <form action="{{route('tickets.admin.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input required type="text" class="form-control" id="title" name="title" placeholder="title">

            <label for="description">Description</label>
            <input required type="text" class="form-control" id="description" name="description" placeholder="description">

            <label for="place">Place</label>
            <input required type="text" class="form-control" id="place" name="place" placeholder="place">

            <label for="cost">Cost</label>
            <input required type="number" class="form-control" id="cost" name="cost" placeholder="cost">

            <label for="quantity">Quantity</label>
            <input required type="number" class="form-control" id="quantity" name="quantity" placeholder="quantity">

            <br>
            <label for="when">DateTime</label>
            <input type="datetime-local" name="when" id="when">
            <br>
            <label for="image">Image file</label>
            <input required accept="image/*" type="file" class="form-control-file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
