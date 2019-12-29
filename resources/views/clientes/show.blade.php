
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
</div>





    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Lista de programadores</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">

          </div>
          <div class=" container-fluid p-5 table-responsive" id="mydatatable-container">
            <table class="records_list table table-striped table-bordered table-hover" id="mydatatable" >
              <thead class=" text-primary">
      <tr>
          <th class="text-center">Id programador</th>
          <th class="text-center">Modelo</th>
          <th class="text-center">Numero de serie</th>
          <th class="text-center">Alta en el sistema</th>
          <th class="text-center">Ultima conexion</th>
          <th class="text-center">Acciones</th>
      </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Filter..</th>
        <th>Filter..</th>
        <th>Filter..</th>
        <th>Filter..</th>
        <th>Filter..</th>
        <th style="visibility:hidden;">Filter..</th>

    </tr>
</tfoot>
    <tbody>
      @foreach($cliente->programadores as $programador)
          <tr>
              <td class="text-center">{{ $programador->id}}</td>
              <td class="text-center">{{ $programador->modelo}}</td>
              <td class="text-center">{{ $programador->serie }}</td>
              <td class="text-center">{{ $programador->alta}}</td>
              <td class="text-center">{{ $programador->uconexion}}</td>
              <td class="text-center">
                <div class="row">
                  <div class="col-md-6 pr-1">
                    <div class="">
                      <a href="{{ route('programadores.show', $programador->id) }}" class="btn btn-round btn-info">Editar</a>
                    </div>
                  </div>
                  <div class="col-md-6 pl-1">
                    <div class="">
                      <form action="{{route('programadores.destroy', $programador->id)}}" method="post">
                          {{csrf_field()}}
                          <input name="_method" type="hidden" value="DELETE">

                          <button class="btn btn-round btn-danger" type="submit"> Eliminar</button>
                      </form>
                    </div>
                  </div>


                </div>

              </td>
          </tr>
      @endforeach
    </tbody>

  </table>
</div>
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
