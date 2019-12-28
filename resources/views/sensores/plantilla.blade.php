<h4>Lista de Sensores</h4>
<table frame="below">
  <thead>
  <tr>
    <th>ID</th>
    <th>Nombre del sensor</th>
    <th>fecha</th>
    <th>valor</th>
  </tr>
</thead>
.<tbody>
  @foreach($sensores as $sensor)
    <tr>
      <td>{{ $sensor->id }}</td>
      <td>{{ $sensor->nombre }}</td>
      <td>{{ $sensor->fecha }}</td>
      <td>{{ $sensor->valor }}</td>
    </tr>
  @endforeach
</tbody>

</table>
