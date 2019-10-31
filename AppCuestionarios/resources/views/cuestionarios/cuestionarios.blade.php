@extends('layouts.plantilla')

@section('name')
cuestionarios
@endsection

@section('seccion')
  <h2>Registro de Cuestionarios</h2>
  <form class="form-group" action="/admins" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Nombre:</label>
        <input type="text" name="nombre" class="form-control">
        <label for="">Descripcion:</label>
        <input type="text" name="descripcion" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
  </form>
@endsection
