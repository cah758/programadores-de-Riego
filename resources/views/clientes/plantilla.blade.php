
<h4>Lista de Clientes</h4>
<table frame="below">
  <thead>
  <tr>
    <th>ID</th>
    <th>Codigo de cliente</th>
    <th>Razon social</th>
    <th>Direccion</th>
    <th>Municipio</th>
    <th>Provincia</th>
    <th>Inicio de Contrato</th>
    <th>Fin de Contrato</th>
  </tr>
</thead>
.<tbody>
  @foreach($clientes as $cliente)
    <tr>
      <td>{{ $cliente->id }}</td>
      <td>{{ $cliente->codigo }}</td>
      <td>{{ $cliente->razon }}</td>
      <td>{{ $cliente->direccion }}</td>
      <td>{{ $cliente->municipo }}</td>
      <td>{{ $cliente->provincia }}</td>
      <td>{{ $cliente->fechaInicio }}</td>
      <td>{{ $cliente->fechaInicio }}</td>
    </tr>
  @endforeach
</tbody>

</table>
