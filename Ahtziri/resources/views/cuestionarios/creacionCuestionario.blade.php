@extends('layouts.app')


@section('content')

<form class="form-group" action="cuestionario" method="POST">
<div class="container-fluid">
  <section class="main row">
      <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">

        <label></label>
        <p class="text-center">Creacion de cuestionario.</p>
        <div class="input-group mb-3">
          <input type="text" class="form-control" aria-label="Text input with dropdown button"placeholder="Ingrese la pregunta">
          <div class="input-group-prepend">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tiempo de pregunta</button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
              <a class="dropdown-item" href="#">Separated link</a>
            </div>
          </div>
        </div>


<div class="input-group mb-3">
<div class="input-group-prepend">
<div class="input-group-text">
<input type="checkbox" aria-label="Checkbox for following text input" >
</div>
</div>
<input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Ingrese respuesta 1">
</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
<div class="input-group-text">
<input type="checkbox" aria-label="Checkbox for following text input" >
</div>
</div>
<input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Ingrese respuesta 2">
</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
<div class="input-group-text">
<input type="checkbox" aria-label="Checkbox for following text input" >
</div>
</div>
<input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Ingrese respuesta 3">
</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
<div class="input-group-text">
<input type="checkbox" aria-label="Checkbox for following text input" >
</div>
</div>
<input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Ingrese respuesta 4">
</div>

<button type="button" class="btn btn-success">Guardar pregunta</button>

      </div>
      <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
        <label></label>
        <p classs="text-center">Informacion de cuestionario.</p>
        <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Ingrese nombre">
      </div>
  </section>
</div>
</form>


<div class="container-fluid">
    <section class="main row">
        <div class="col-lg-12">
          <p class="text-center">Preguntas creadas</p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
    </section>
</div>

<div class="text-center">
  <a href="">
    <button type="button" class="btn btn-danger">Guardar cuestionario</button>
  </a>
</div>

@endSection
