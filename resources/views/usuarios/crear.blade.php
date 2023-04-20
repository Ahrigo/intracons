@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
   <h1>Agregar Usuario</h1>
@stop

@section('content')

<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Formulario Usuarios</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
    

              @if ($errors->any())                                                
              <div class="alert alert-dark alert-dismissible fade show" role="alert">
              <strong>¡Revise los campos!</strong>                        
                  @foreach ($errors->all() as $error)                                    
                      <span class="badge badge-danger">{{ $error }}</span>
                  @endforeach                        
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
          @endif

          {!! Form::open(array('route' => 'usuarios.store','method'=>'POST')) !!}
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <label for="name">Nombre</label>
                      {!! Form::text('name', null, array('class' => 'form-control')) !!}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <label for="email">E-mail</label>
                      {!! Form::text('email', null, array('class' => 'form-control')) !!}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <label for="password">Password</label>
                      {!! Form::password('password', array('class' => 'form-control')) !!}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <label for="confirm-password">Confirmar Password</label>
                      {!! Form::password('confirm-password', array('class' => 'form-control')) !!}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <label for="">Roles</label>
                      {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
                  </div>
              </div>

  <div class="float-right">
  <a href="/usuarios" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button id="btnGuardar" type="submit" class="btn btn-primary" tabindex="6">Guardar</button>
  </div>
</form>

</div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      
    </section>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js') 

<!-- Para incluir jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Para incluir SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">




@stop