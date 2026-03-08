<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ImportExportController extends Controller
{
    /**
     * Exporter tous les utilisateurs
     */
    public function export()
    {
        return Excel::download(new UsersExport, 'utilisateurs.xlsx');
    }

    public function import()
    {
        Excel::import(new UsersImport, 'users.xlsx');

        return redirect('/')->with('success', 'All good!');
    }




}
