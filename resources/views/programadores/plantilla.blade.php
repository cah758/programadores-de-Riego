<h4>Lista de Programadores</h4>
<table frame="below">
  <thead>
  <tr>
    <th>ID</th>
    <th>Modelo de programador</th>
    <th>Numero de serie</th>
    <th>fecha de alta en el sistema</th>
    <th>Ultima conexion</th>
  </tr>
</thead>
.<tbody>
  @foreach($programadores as $programador)
    <tr>
      <td>{{ $programador->id  }}</td>
      <td>{{ $programador->modelo }}</td>
      <td>{{ $programador->serie }}</td>
      <td>{{ $programador->alta }}</td>
      <td>{{ $programador->uconexion }}</td>
    </tr>
  @endforeach
</tbody>

</table>
