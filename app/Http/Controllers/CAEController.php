<?php

namespace App\Http\Controllers;

use App\Models\CAE;
use Illuminate\Http\Request;

class CAEController extends Controller
{
    public function index()
    {
        $cnaefs = CAE::all();

        return response()->json($cnaefs, 200);
    }
}
