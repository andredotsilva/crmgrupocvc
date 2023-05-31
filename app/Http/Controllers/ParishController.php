<?php

namespace App\Http\Controllers;

use App\Imports\MunicipalitiesImport;
use App\Imports\ParishesImport;
use Illuminate\Http\Request;
use Excel;

class ParishController extends Controller
{
    //

    public function store(Request $request)
    {
        Excel::import(new ParishesImport(), $request->file('import'));

        return 'done';
    }
}
