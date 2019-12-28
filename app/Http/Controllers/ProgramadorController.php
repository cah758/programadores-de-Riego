<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programador;
use App\Cliente;

use PDF;
use EXCEL;

class ProgramadorController extends Controller
{
  public function store(Request $request)  {

      $this->validate($request,[ 'modelo'=>'required', 'serie'=>'required',
      'alta'=>'required', 'uconexion'=>'required', 'cliente_id'=>'required']);
      $request->uconexion = getdate();
      Programador::create($request->all());
      return redirect()->route('programadores.index')->with('success','Registro creado satisfactoriamente');
  }

  public function index()  {
    $programadores = Programador::all(); //devolverá todos los programadores
    return view('programadores.index')->with('programadores', $programadores);
  }

  /**
 * Muestra el Programador seleccionada por id.
 * @param $Id
 * @return \Illuminate\Http\Response
 */
 public function show($Id)  {
   // Devuelve el programador seleccionado por id.
   $clientes = Cliente::all();
   $programador = Programador::find($Id);
   return view('programadores.show')->with('programador', $programador)->with('clientes', $clientes);
 }

 /**
  * Carga la vista para crear un programador.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()  {
      //
      $clientes = Cliente::all();
      return view('programadores.create')->with('clientes', $clientes);
  }

  public function update(Request $request, $id)  {
      $request->uconexion = getdate();
      Programador::find($id)->update($request->all());
      return redirect()->route('programadores.index');

  }

  public function destroy($id)  {
     Programador::find($id)->delete();
     return back()->with('success','Registro eliminado satisfactoriamente');
  }
  public function pdf()
{
  // Fetch all customers from database
  $programadores= Programador::all();
  // Send data to the view using loadView function of PDF facade
  $pdf = PDF::loadView('programadores.plantilla',  compact('programadores'));
  // If you want to store the generated pdf to the server then you can use the store function
  $pdf->save(storage_path().'_filename.pdf');
  // Finally, you can download the file using download function
  return $pdf->download('programadores.pdf');
}

public function export(){
    return Excel::download(new ProgramadorExport, 'programadores.xlsx');
}
}
