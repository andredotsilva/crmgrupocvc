<?php

namespace App\Http\Controllers;

use App\Imports\MunicipalitiesImport;
use Illuminate\Http\Request;
use Excel;

class MunicipalityController extends Controller
{
    //

    public function store(Request $request)
    {
        Excel::import(new MunicipalitiesImport(), $request->file('import'));

        return 'done';
    }
}
