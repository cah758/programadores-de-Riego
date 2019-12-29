<?php

namespace App\Http\Controllers;

use App\Sensor;
use App\Programador;
use PDF;
use EXCEL;

use Illuminate\Http\Request;

class SensorController extends Controller
{
  public function store(Request $request)  {

      $this->validate($request,[ 'nombre'=>'required', 'fecha'=>'required',
      'valor'=>'required','programador_id'=>'required']);
      Sensor::create($request->all());
      return redirect()->route('sensores.index')->with('success','Registro creado satisfactoriamente');
  }

  public function index()  {
    $sensores = Sensor::all(); //devolverá todos los sensores
    return view('sensores.index')->with('sensores', $sensores);
  }

  /**
 * Muestra el Programador seleccionada por id.
 * @param $Id
 * @return \Illuminate\Http\Response
 */
 public function show($Id)  {
   // Devuelve el sensor seleccionado por id.
   $programadores = Programador::all();
   $sensor = Sensor::find($Id);
   return view('sensores.show')->with('sensor', $sensor)->with('programadores', $programadores);
 }

 /**
  * Carga la vista para crear un programador.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()  {
      //
      $programadores = Programador::all();
      return view('sensores.create')->with('programadores', $programadores);
  }

  public function update(Request $request, $id)  {
      Sensor::find($id)->update($request->all());
      return redirect()->route('sensores.index');

  }

  public function destroy($id)  {
     Sensor::find($id)->delete();
     return back()->with('success','Registro eliminado satisfactoriamente');
  }

  public function pdf()
{
  // Fetch all customers from database
  $sensores= Sensor::all();
  // Send data to the view using loadView function of PDF facade
  $pdf = PDF::loadView('sensores.plantilla', compact('sensores'));
  // If you want to store the generated pdf to the server then you can use the store function
  $pdf->save(storage_path().'_filename.pdf');
  // Finally, you can download the file using download function
  return $pdf->download('sensores.pdf');
}

public function export()
{
    $data = Sensor::get()->toArray();

    return Excel::create('excel_data', function($excel) use ($data) {
        $excel->sheet('mySheet', function($sheet) use ($data)
        {
            $sheet->fromArray($data);
        });
    })->download('xls');
}


}
