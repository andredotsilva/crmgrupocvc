<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractsController extends Controller
{
    //
    public function index()
    {
        $contracts = Contract::all();

        return view('', compact('contracts'));
    }

    public function store(Request $request)
    {
        $contract = new Contract();

        $contract->title = $request->title;
        $contract->contract_date = date('Y-m-d H:i:s');
        $contract->client_id = auth()->id();

        $contract->save();
        
    }
}
