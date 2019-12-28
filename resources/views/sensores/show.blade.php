
programadores
@extends('app')
@section('seccion')
Sensor
@stop

@section('panel')
<div class="panel-header panel-header-sm">

</div>
@stop
@section('contenido')
<div class="col-md-6">
  <div class="card">
    <div class="card-header">
      <h5 class="title">Sensor</h5>
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
      <form method="POST" action="{{ route('sensores.update',$sensor->id) }}"  role="form">
        <input name="_method" type="hidden" value="PUT">
        @csrf
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control" disabled=""  name="nombre" value="{{ $sensor->nombre}}">
            </div>
          </div>
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>valor</label>
              <input type="text" class="form-control" disabled="" name="serie"  value='{{ $sensor->valor }}'>
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label>Prgramador</label>
              <select name="programdor_id" class="form-control" >
                @foreach($programadores as $programador)

                @if ($sensor->programador_id == $programador->id)
                  <option selected="selected" value="{{ $programador->id}}">{{ $programador->modelo}}</option>
                @else
                  <option  value="{{ $programador->id}}">{{ $programador->modelo}}</option>
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
              <label>Fecha </label>
              <input type="date" class="form-control" name="fecha" disabled=""  value="{{ $sensor->fecha}}">
            </div>
          </div>
        </div>

      <input style="float:right" type="submit"  value="Modificar Informacion" class="btn btn-round btn-primary">

      </form>
    </div>
  </div>
</div>





@stop
