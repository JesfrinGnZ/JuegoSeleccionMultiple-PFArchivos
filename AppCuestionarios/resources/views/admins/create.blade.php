@extends('layouts.app')

@section('title', 'Admins Created')

@section('content')
  <form class="form-group" action="/admins" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Nombre</label>
        <input type="text" name="name" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary"> save</button>
  </form>

@endsection
