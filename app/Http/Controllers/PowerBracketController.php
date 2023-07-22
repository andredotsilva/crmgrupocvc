<?php

namespace App\Http\Controllers;

use App\Models\PowerBracket;
use Illuminate\Http\Request;

class PowerBracketController extends Controller
{
    public function index()
    {
        $powebrackets = PowerBracket::all();

        return response()->json($powebrackets, 200);
    }
}
