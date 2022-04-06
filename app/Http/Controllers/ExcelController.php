<?php

namespace App\Http\Controllers;

use App\Exports\ExcelExport;
use App\Imports\ExcelImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


class ExcelController extends Controller 
{
    public function create() 
    {
        return view('excel.excel');
    }
    
    public function export() 
    {
        return Excel::download(new ExcelExport, 'excel.xlsx');

    }

    

}

