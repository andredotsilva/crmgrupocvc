<?php

namespace App\Http\Controllers;

use App\Imports\DistrictsImport;

use Illuminate\Http\Request;
use Excel;

class DistrictController extends Controller
{
    public function store(Request $request)
    {
        Excel::import(new DistrictsImport(), $request->file('import'));

        return 'done';
    }
}
