<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class EnergiagasController extends Controller
{
    public function index()
    {
        return view('pages.energia.index');
    }
}
