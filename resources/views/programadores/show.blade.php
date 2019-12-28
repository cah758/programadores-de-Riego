
programadores
@extends('app')
@section('seccion')
programador
@stop

@section('panel')
<div class="panel-header panel-header-sm">

</div>
@stop
@section('contenido')
<div class="col-md-6">
  <div class="card">
    <div class="card-header">
      <h5 class="title">programador</h5>
    </div>
    <div class="card-body">
      <div class="col-md-8 col-md-offset-2">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <strong>Error!</strong> Revise los campos obligatorios.<br><br>
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        @if(Session::has('success'))
        <div class="alert alert-info">
          {{Session::get('success')}}
        </div>
        @endif
      <form method="POST" action="{{ route('programadores.update',$programador->id) }}"  role="form">
        <input name="_method" type="hidden" value="PUT">
        @csrf
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Modelo del programador</label>
              <input type="text" class="form-control" disabled=""  name="modelo" value="{{ $programador->modelo}}">
            </div>
          </div>
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>Numero de serie</label>
              <input type="text" class="form-control" disabled="" name="serie"  value='{{ $programador->serie }}'>
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label>Cliente</label>
              <select name="cliente_id" class="form-control" >
                @foreach($clientes as $cliente)

                @if ($programador->cliente_id == $cliente->id)
                  <option selected="selected" value="{{ $cliente->id}}">{{ $cliente->razon}}</option>
                @else
                  <option  value="{{ $cliente->id}}">{{ $cliente->razon}}</option>
                @endif
                @endforeach
              </select>
            </div>
          </div>
        </div>

        </div>

        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>Fecha de alta en el sistema</label>
              <input type="date" class="form-control" name="alta" disabled=""  value="{{ $programador->alta}}">
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label>Ultima Conexión</label>
              <input type="date" class="form-control" name="uconexion" value="{{ $programador->uconexion}}">
            </div>
          </div>
        </div>

      <input style="float:right" type="submit"  value="Modificar Informacion" class="btn btn-round btn-primary">

      </form>
    </div>
  </div>
</div>





@stop
