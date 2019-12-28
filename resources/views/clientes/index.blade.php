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
            <form style="float:right">
              <div class="input-group no-border">
                <input id="searchTerm" type="text" onkeyup="doSearch()" class="form-control" placeholder="Buscar...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
              </form>
            </div>

          </div>
            <table id="regTable" class="table" >
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
                      <a href="{{ route('clientes.update', $cliente->id) }}" class="btn btn-round btn-info">Editar</a>
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



@stop
@section('script')

<script type="text/javascript">
function doSearch() {

    var tableReg = document.getElementById('regTable');
    var searchText = document.getElementById('searchTerm').value.toLowerCase();
    for (var i = 1; i < tableReg.rows.length-1; i++) {
        var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        var found = false;
        for (var j = 0; j < cellsOfRow.length && !found; j++) {
            var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
            if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                found = true;
            }
        }
        if (found) {
            tableReg.rows[i].style.display = '';
        } else {
            tableReg.rows[i].style.display = 'none';
        }
    }
}
</script>

@stop
