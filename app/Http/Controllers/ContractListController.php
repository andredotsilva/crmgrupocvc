<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractListController extends Controller
{
    public function index()
    {
        $contracts = Contract::with('client')->get();
        $contractsCount = $contracts->count();

        return view('contractList', [
            'contracts' => $contracts,
            'contractsCount' => $contractsCount,
        ]);
    }
}
