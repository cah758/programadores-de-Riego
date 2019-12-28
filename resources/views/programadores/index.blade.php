@extends('app')
@section('seccion')
programadores
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
          <h4 class="card-title"> Lista de programadores</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">

            <div class="">
            <a  style="float:left" target="_blank" href="{{ route('programadores.create') }}" class="btn btn-round btn-primary">Añadir programador</a>
            <a style="float:left" class="btn btn-round btn-primary" href="{{ route('programadores.pdf') }}">Exportar a PDF</a>
            <a style="float:left" class="btn btn-round btn-primary" href="{{ route('programadores.export') }}">Exportar a XLS</a>

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
          <th class="text-center">Id programador</th>
          <th class="text-center">Modelo</th>
          <th class="text-center">Numero de serie</th>
          <th class="text-center">Alta en el sistema</th>
          <th class="text-center">Ultima conexion</th>
          <th class="text-center">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($programadores as $programador)
          <tr>
              <td class="text-center">{{ $programador->id}}</td>
              <td class="text-center">{{ $programador->modelo}}</td>
              <td class="text-center">{{ $programador->serie }}</td>
              <td class="text-center">{{ $programador->alta}}</td>
              <td class="text-center">{{ $programador->uconexion}}</td>
              <td class="text-center">
                <a href="{{ route('programadores.show', $programador->id) }}" class="btn btn-round btn-primary">Ver</a>
                <a href="{{ route('programadores.update', $programador->id) }}" class="btn btn-round btn-info">Editar</a>
                <form action="{{route('programadores.destroy', $programador->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">

                    <button class="btn btn-round btn-danger" type="submit"> Eliminar</button>
                </form

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
