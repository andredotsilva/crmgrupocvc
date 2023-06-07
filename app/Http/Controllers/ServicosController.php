<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ServicosController extends Controller
{
    public function index()
    {
        return view('servicos');
    }
}
