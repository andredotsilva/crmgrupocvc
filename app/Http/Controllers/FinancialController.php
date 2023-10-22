<?php

namespace App\Http\Controllers;

use App\Models\Financial;
use Illuminate\Http\Request;

class FinancialController extends Controller
{
    public function index()
    {

        $financials = Financial::all();
        return view('pages.financas.index', compact('financas'));

    }
}
