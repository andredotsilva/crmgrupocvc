<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Contract;
use App\Models\Contrato;
use Illuminate\Http\Request;

class ContractsController extends Controller
{
    //
    public function index()
    {
        $contracts = Contrato::all();
        $contractsCount = $contracts->count();

        return view('dashboard', compact(['contracts', 'contractsCount']));
    }

    public function create()
    {
        return view('layouts.formContrato');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contador' => 'required',
            'name' => 'required',
            'nif' => 'required',
            'email' => 'required|email',
            'cod_freguesia' => 'required',
            'freguesia' => 'required',
            'concelho' => 'required',
            'distrito' => 'required',
            'morada' => 'required',
            'postal' => 'required',
            'tensao' => 'required',
            'potencia' => 'required',
            'andar' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $contrato = new Contrato();
        $contrato->contador = $request->contador;
        $contrato->name = $request->name;
        $contrato->nif = $request->nif;
        $contrato->email = $request->email;
        $contrato->cod_freguesia = $request->cod_freguesia;
        $contrato->freguesia = $request->freguesia;
        $contrato->concelho = $request->concelho;
        $contrato->distrito = $request->distrito;
        $contrato->morada = $request->morada;
        $contrato->postal = $request->postal;
        $contrato->tensao = $request->tensao;
        $contrato->potencia = $request->potencia;
        $contrato->andar = $request->andar;
        $contrato->client_id = auth()->id();
        $contrato->save();

        return redirect()->route('contracts.index')->with('success', 'Contrato criado com sucesso!');
    }
}
