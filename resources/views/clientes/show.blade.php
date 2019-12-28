
@extends('app')
@section('seccion')
Cliente
@stop

@section('panel')
<div class="panel-header panel-header-sm">

</div>
@stop
@section('contenido')
<div class="col-md-6">
  <div class="card">
    <div class="card-header">
      <h5 class="title">Cliente</h5>
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
      <form method="POST" action="{{ route('clientes.update',$cliente->id) }}"  role="form">
        <input name="_method" type="hidden" value="PUT">
        @csrf
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Codigo de Cliente</label>
              <input type="text" class="form-control" disabled=""  name="codigo" value="{{ $cliente->codigo}}">
            </div>
          </div>
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>Razón social</label>
              <input type="text" class="form-control" disabled="" name="razon"  value='{{ $cliente->razon }}'>
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label>CIF</label>
              <input type="text" class="form-control"disabled="" name="cif"  value="{{ $cliente->cif}}">
            </div>
          </div>
          <div class="col-md-4 pr-1">
            <div class="form-group">
              <label for="exampleInputEmail1">Municipio</label>
              <input type="text" class="form-control" name="municipio" value="{{ $cliente->municipio}}">
            </div>
          </div>
          <div class="col-md-4 px-1">
            <div class="form-group">
              <label for="exampleInputEmail1">provincia</label>
              <input type="text" class="form-control" name="provincia" value="{{ $cliente->provincia}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Direccion</label>
              <input type="text" class="form-control" name="direccion" value="{{ $cliente->direccion}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>Fecha de Inicio de Contrato</label>
              <input type="date" class="form-control" name="fechaInicio" disabled=""  value="{{ $cliente->fechaInicio}}">
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label>Fecha de Fin de Contrato</label>
              <input type="date" class="form-control" name="fechaFin" value="{{ $cliente->fechaFin}}">
            </div>
          </div>
        </div>

      <input style="float:right" type="submit"  value="Modificar Informacion" class="btn btn-round btn-primary">

      </form>
    </div>
  </div>
</div>





@stop
