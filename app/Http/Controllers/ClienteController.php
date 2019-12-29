<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use PDF;
use App\Exports\ClienteExport;
use EXCEL;

class ClienteController extends Controller  {

  public function store(Request $request)  {

      $this->validate($request,[ 'codigo'=>'required', 'razon'=>'required',
      'cif'=>'required', 'direccion'=>'required', 'municipio'=>'required',
      'provincia'=>'required', 'fechaInicio'=>'required', 'fechaFin'=>'required']);
      Cliente::create($request->all());
      return redirect()->route('clientes.index')->with('success','Registro creado satisfactoriamente');
  }

  public function index()  {
    $clientes = Cliente::all(); //devolverá todos los clientes
    return view('clientes.index')->with('clientes', $clientes);
  }

  /**
 * Muestra el cliente seleccionada por id.
 * @param $Id
 * @return \Illuminate\Http\Response
 */
 public function show($Id)  {
   // Devuelve el cliente seleccionado por id.
   $cliente = Cliente::find($Id);
   return view('clientes.show')->with('cliente', $cliente);
 }

 /**
  * Carga la vista para crear un cliente.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()  {
      //
      return view('clientes.create');
  }

  public function update(Request $request, $id)    {

      Cliente::find($id)->update($request->all());
      return redirect()->route('clientes.index');

  }

  public function destroy($id)  {
     Cliente::find($id)->delete();
     return back()->with('success','Registro eliminado satisfactoriamente');
  }
  public function pdf()
{
  // Fetch all customers from database
  $clientes = Cliente::all(); //devolverá todos los clientes
  // Send data to the view using loadView function of PDF facade
  $pdf = PDF::loadView('clientes.plantilla',  compact('clientes'));
  // If you want to store the generated pdf to the server then you can use the store function
  $pdf->save(storage_path().'_filename.pdf');
  // Finally, you can download the file using download function
  return $pdf->download('customers.pdf');
}

public function export()
{
    $data = Cliente::get()->toArray();

    return Excel::create('excel_data', function($excel) use ($data) {
        $excel->sheet('mySheet', function($sheet) use ($data)
        {
            $sheet->fromArray($data);
        });
    })->download('xls');
}

}
