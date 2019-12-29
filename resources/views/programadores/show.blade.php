
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




<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h5 class="title">Sensores</h5>
    </div>
    <div class="card-body">
      <div class="col-md-8 col-md-offset-2">
        <table class="records_list table table-striped table-bordered table-hover" id="mydatatable" >
          <thead class=" text-primary">
      <tr>
      <th class="text-center">Id sensor</th>
      <th class="text-center">Nombre</th>
      <th class="text-center">fecha</th>
      <th class="text-center">valor</th>
      <th class="text-center">Acciones</th>
      </tr>
      </thead>
      <tfoot>
      <tr>
      <th>Filter..</th>
      <th>Filter..</th>
      <th>Filter..</th>
      <th>Filter..</th>
      <th style="visibility:hidden;">Filter..</th>

      </tr>
      </tfoot>
      <tbody>
      @foreach($programador->sensores as $sensor)
      <tr>
          <td class="text-center">{{ $sensor->id}}</td>
          <td class="text-center">{{ $sensor->nombre}}</td>
          <td class="text-center">{{ $sensor->fecha }}</td>
          <td class="text-center">{{ $sensor->valor}}</td>


          <td class="text-center">

              <a href="{{ route('sensores.show', $sensor->id) }}" class="btn btn-round btn-info">Editar</a>

              <form action="{{route('sensores.destroy', $sensor->id)}}" method="post">
                  {{csrf_field()}}
                  <input name="_method" type="hidden" value="DELETE">

                  <button class="btn btn-round btn-danger" type="submit"> Eliminar</button>
              </form>


          </td>
      </tr>
      @endforeach
      </tbody>
    </table>


    </div>
  </div>
</div>


@stop
@section('script')

<script src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>
<style>
#mydatatable tfoot input{
    width: 100% !important;
}
#mydatatable tfoot {
    display: table-header-group !important;
}
</style>

<script type="text/javascript">
$(document).ready(function() {
    $('#mydatatable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Filtrar.." />' );
    } );

    var table = $('#mydatatable').DataTable({
        "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
        "responsive": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
        "order": [[ 0, "desc" ]],
        "initComplete": function () {
            this.api().columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                        }
                });
            })
        }
    });
});
</script>

@stop
