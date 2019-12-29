
@extends('app')
@section('seccion')
Inicio
@stop

@section('panel')
<div class="panel-header panel-header-sm">

</div>
@stop
@section('contenido')
<div class="row">
<div class="col-lg-4">
<div class="card card-chart">
  <div class="card-header">
    <h5 class="card-category">Clientes</h5>
  </div>
  <div class="card-body">
    <div class="chart-area">
      <a href="{{url('/clientes')}}">
        <i class="now-ui-icons business_badge"></i>
        <p>clientes</p>
    </div>
  </div>
  <div class="card-footer">
  </div>
</div>
</div>

<div class="col-lg-4">
<div class="card card-chart">
  <div class="card-header">
    <h5 class="card-category">Sensores</h5>
  </div>
  <div class="card-body">
    <div class="chart-area">
      <a href="{{url('/programadores')}}">
        <i class="now-ui-icons tech_laptop"></i>
        <p>Programadores</p>
    </div>
  </div>
  <div class="card-footer">
  </div>
</div>
</div>
<div class="col-lg-4">
<div class="card card-chart">
  <div class="card-header">
    <h5 class="card-category">Sensores</h5>
  </div>
  <div class="card-body">
    <div class="chart-area">
      <a href="{{url('/sensores')}}">
        <i class="now-ui-icons users_single-02"></i>
        <p>Sensores</p>
    </div>
  </div>
  <div class="card-footer">
  </div>
</div>
</div>
</div>

@stop
