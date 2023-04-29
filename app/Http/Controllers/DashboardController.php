<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {

        $contracts = Contract::with('client')->get();
        $contractsCount = $contracts->count();

        return view('dashboard', [
            'contracts' => $contracts,
            'contractsCount' => $contractsCount,
        ]);
    }
}
