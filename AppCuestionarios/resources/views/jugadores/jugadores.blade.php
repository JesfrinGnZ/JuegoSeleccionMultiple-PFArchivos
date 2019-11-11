@extends('layouts.plantilla')

@section('name')
jugadores
@endsection

@section('seccion')
  <h2>Registro de jugadores</h2>
  <form class="form-group" action="/admins" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Codigo de Cuestionario:</label>
        <input type="text" name="user" class="form-control">
        <label for="">NickName:</label>
        <input type="text" name="nombre" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
  </form>
@endsection
