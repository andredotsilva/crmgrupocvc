<?php

namespace App\Http\Controllers;

use App\Imports\MunicipalitiesImport;
use App\Imports\ParishesImport;
use App\Models\Parish;
use Illuminate\Http\Request;
use Excel;

class ParishController extends Controller
{
    //
    public function index()
    {
        $parishes = Parish::whereHas('municipality', function ($query) {
            $query->whereId(request()->input('municipality_id', 0));
        })->get();

        return response()->json($parishes);
    }

    public function store(Request $request)
    {
        Excel::import(new ParishesImport(), $request->file('import'));

        return 'done';
    }
}
