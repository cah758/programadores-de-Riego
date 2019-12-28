
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
    <div classAF="card-header">
      <h5 class="title">Cliente</h5>
    </div>
    <div class="card-body">

      <div class="row">

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

      <form method="POST" action="{{ route('store') }}"  role="form">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Codigo de Cliente</label>
              <input type="text" class="form-control" name='codigo' placeholder="Codigo de Cliente" value="">
            </div>
          </div>
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>Razón social</label>
              <input type="text" class="form-control" name='razon' placeholder="Razon social" value=''>
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label>CIF</label>
              <input type="text" class="form-control" name ='cif'  placeholder="CIF" value="">
            </div>
          </div>
          <div class="col-md-4 pr-1">
            <div class="form-group">
              <label for="exampleInputEmail1">Municipio</label>
              <input type="text" class="form-control" name='municipio' placeholder="">
            </div>
          </div>
          <div class="col-md-4 px-1">
            <div class="form-group">
              <label for="exampleInputEmail1">provincia</label>
              <input type="text" class="form-control" name='provincia' placeholder="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Direccion</label>
              <input type="text" class="form-control" name='direccion' placeholder="" value="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>Fecha de Inicio de Contrato</label>
              <input type="date" class="form-control"  name='fechaInicio' placeholder="" value="">
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label>Fecha de Fin de Contrato</label>
              <input type="date" class="form-control" name='fechaFin' placeholder="" value="">
            </div>
          </div>
        </div>

      <input style="float:right" type="submit"  value="Crear Cliente" class="btn btn-round btn-primary">

      </form>
    </div>
  	</div>

    </div>



  </div>
</div>





@stop
