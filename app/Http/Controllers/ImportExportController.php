<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function silit(){
        return Excel::download(new EmployeeExport, 'employees.xlsx');
    }
    public function export() 
    {
        return Excel::download(new EmployeeExport, 'employees.xlsx');
    }
    public function upload(Request $request){
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
    
        $file = $request->file('file');
        Excel::import(new EmployeeImport, $file);
    
        return redirect()->route('employees.index')->with('success', 'Employees uploaded successfully.');        
    }
}
