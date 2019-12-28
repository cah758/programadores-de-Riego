
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
    <div classAF="card-header">
      <h5 class="title">Sensor</h5>
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

      <form method="POST" action="{{ route('sensores.store') }}"  role="form">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Nombre del sensor</label>
              <input type="text" class="form-control" name='nombre' placeholder="Nombre del sensor" value="">
            </div>
          </div>

          <div class="col-md-12 pr-1">
            <div class="form-group">
              <label>valor</label>
              <input type="text" class="form-control" name='valor' placeholder="valor" value=''>
            </div>
          </div>

        </div>
        </div>
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>fecha</label>
              <input type="date" class="form-control"  name='fecha' placeholder="" value="">
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label>Programador</label>
              <select name="progrmador_id" class="form-control">
                @foreach($programadores as $programador)
                        <option value="{{ $programador->id}}">{{ $programador->modelo}}</option>
                @endforeach
              </select>
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
