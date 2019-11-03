@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        </div>
    </div>
</div>
<div class="container">



  <div class="d-flex justify-content-center">
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="Text input" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
  </div>

  <form class="form=group" action="cuestionario" method="POST">

        <div class="main row">
      <div class="col-4">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
          <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
          <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
        </div>
      </div>

      <div class="col-8">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">...</div>
          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
            <ul class="list-group">
      <li class="list-group-item">Cras justo odio</li>
      <li class="list-group-item">Dapibus ac facilisis in</li>
      <li class="list-group-item">Morbi leo risus</li>
      <li class="list-group-item">Porta ac consectetur ac</li>
      <li class="list-group-item">Vestibulum at eros</li>
    </ul>

          </div>
          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
          <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
        </div>
      </div>
      <label></label>
    </div>

  </form>

  <div class="container-fluid">
    <section class="main row">
      <div class="btn-group">
        <a href="">
          <button type="button" class="btn btn-success">Usar</button>
        </a>
        <a href="">
          <button type="button" class="btn btn-info">Borrar</button>
        </a>
        <a href="{{route('creacionCuestionario')}}">
          <button type="button" class="btn btn-danger">Crear nuevo</button>
        </a>
      </div>
    </section>
  </div>

</div>

@endsection
