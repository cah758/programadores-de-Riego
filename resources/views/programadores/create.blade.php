
@extends('app')
@section('seccion')
Programador
@stop

@section('panel')
<div class="panel-header panel-header-sm">

</div>
@stop
@section('contenido')
<div class="col-md-6">
  <div class="card">
    <div classAF="card-header">
      <h5 class="title">Programador</h5>
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

      <form method="POST" action="{{ route('programadores.store') }}"  role="form">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Modelo del programador</label>
              <input type="text" class="form-control" name='modelo' placeholder="Modelo del programador" value="">
            </div>
          </div>

          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>Numero de serie</label>
              <input type="text" class="form-control" name='serie' placeholder="Numero de serie" value=''>
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label>Cliente</label>
              <select name="cliente_id" class="form-control">
                @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id}}">{{ $cliente->razon}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>Alta en el sistema</label>
              <input type="date" class="form-control"  name='alta' placeholder="" value="">
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label>Ultima conexion</label>
              <input type="date" class="form-control" name='uconexion' placeholder="" value="">
            </div>
          </div>
        </div>

      <input style="float:right" type="submit"  value="Crear Programador" class="btn btn-round btn-primary">

      </form>
    </div>
  	</div>

    </div>



  </div>
</div>





@stop
