@extends('app')
@section('seccion')
Clientes
@stop

@section('panel')
<div class="panel-header panel-header-sm">

</div>
@stop
@section('contenido')

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Lista de clientes</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">

            <div class="">
            <a  style="float:left" target="_blank" href="{{ route('clientes.create') }}" class="btn btn-round btn-primary">Añadir Cliente</a>
            <a style="float:left" class="btn btn-round btn-primary" href="{{ route('clientes.pdf') }}">Exportar a PDF</a>
            <a style="float:left" class="btn btn-round btn-primary" href="{{ route('clientes.export') }}">Exportar a XLS</a>

            </div>

          </div>
          <div class=" container-fluid p-5 table-responsive" id="mydatatable-container">
            <table class="records_list table table-striped table-bordered table-hover" id="mydatatable" >
              <thead class=" text-primary">
      <tr>
          <th class="text-center">Id cliente</th>
          <th class="text-center">Código</th>
          <th class="text-center">Razón social</th>
          <th class="text-center">CIF</th>
          <th class="text-center">Inicio de contrato</th>
          <th class="text-center">Expiración de contrato</th>
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
        <th>Filter..</th>
        <th style="visibility:hidden;">Filter..</th>

    </tr>
</tfoot>
    <tbody>
      @foreach($clientes as $cliente)
          <tr>
              <td class="text-center">{{ $cliente->id}}</td>
              <td class="text-center">{{ $cliente->codigo}}</td>
              <td class="text-center">{{ $cliente->razon }}</td>
              <td class="text-center">{{ $cliente->cif}}</td>
              <td class="text-center">{{ $cliente->fechaInicio}}</td>
              <td class="text-center">{{ $cliente->fechaFin}}</td>
              <td class="text-center">
                <div class="row">
                  <div class="col-md-6 pr-1">
                    <div class="">
                      <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-round btn-info">Editar</a>
                    </div>
                  </div>
                  <div class="col-md-6 pl-1">
                    <div class="">
                      <form action="{{route('clientes.destroy', $cliente->id)}}" method="post">
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
