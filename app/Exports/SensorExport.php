<?php

namespace App\Exports;

use App\Sensor;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SensoreExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'nombre',
            'fecha',
            'valor',
        ];
    }
    public function collection()
    {
         $clientes = DB::table('sensor')->select('nombre','fecha', 'valo')->get();
         return $clientes;

    }
}
