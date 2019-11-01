@extends('layouts.plantilla')

@section('name')
administradores
@endsection

@section('seccion')
  <h2>Registro de Administradores</h2>
  @if (session('mensaje'))
    <div class="alert alert-success">
      {{ session('mensaje')}}
    </div>

  @endif
  <form class="form-group" action="{{route('admins.crear')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">User:</label>
        <input type="text" name="user" class="form-control">
        <label for="">Nombre:</label>
        <input type="text" name="nombre" class="form-control">
        <label for="">Password:</label>
        <input type="text" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
  </form>
@endsection
