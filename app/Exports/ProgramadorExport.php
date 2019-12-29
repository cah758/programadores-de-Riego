<?php

namespace App\Exports;

use App\Programador;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProgramadoreExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'modelo',
            'serie',
            'alta',
            'uconexion'
        ];
    }
    public function collection()
    {
         $clientes = DB::table('programador')->select('modelo','serie', 'alta', 'uconexion')->get();
         return $clientes;

    }
}
