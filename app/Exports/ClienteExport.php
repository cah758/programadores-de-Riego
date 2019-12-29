<?php

namespace App\Exports;

use App\cliente;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClienteExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'codigo',
            'razon',
            'cif',
            'municipo',
            'provincia',
            'fechaInicio',
            'fechaFin'
        ];
    }
    public function collection()
    {
         $clientes = DB::table('cliente')->select('codigo','razon', 'cif', 'municipio', 'provincia', 'fechaInicio', 'fechaFin')->get();
         return $clientes;

    }
}
