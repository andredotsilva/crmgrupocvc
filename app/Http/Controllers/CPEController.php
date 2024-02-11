<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\CPEImport;
use App\Models\Cpe;
use Excel;

ini_set('memory_limit', '-1');

class CPEController extends Controller
{
    //
    public function store(Request $request)
    {
        // dd('aqui');
        // Excel::import(new CPEImport(), $request->file('import'));
        Excel::import(new CPEImport(), storage_path('btn.xlsx'));


        return 'done';
    }

    public function show($id)
    {
        $cpe = Cpe::where('id', $id)->with(['district', 'municipality', 'parish'])->first();

        return response()->json($cpe);
    }


    public function getCpesByNIF($nif)
    {
        $cpes = Cpe::where('nif', $nif)->get();

        return response()->json($cpes);
    }
}
