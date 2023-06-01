<?php

namespace App\Http\Controllers;

use App\Imports\MunicipalitiesImport;
use App\Models\Municipality;
use Illuminate\Http\Request;
use Excel;

class MunicipalityController extends Controller
{
    //

    public function index()
    {
        $municipalities = Municipality::whereHas('district', function ($query) {
            $query->whereId(request()->input('district_id', 0));
        })->get();

        return response()->json($municipalities);
    }

    public function store(Request $request)
    {
        Excel::import(new MunicipalitiesImport(), $request->file('import'));

        return 'done';
    }
}
