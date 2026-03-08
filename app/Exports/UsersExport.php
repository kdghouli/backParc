<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Vhl;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings


{

use Exportable;


    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Vhl::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nom',
            'Email',
            'Date d\'inscription',
            'Image'
        ];
    }
}