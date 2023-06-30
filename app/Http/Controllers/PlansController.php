<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Contract;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    public function index(Request $request)
    {
        $plans = Plan::all();
        return view('pages.plans.index', compact('plans'));
    }

    public function show($id)
    {
        if (Plan::where('id', $id)->exists()) {

            $plans = Plan::where('id', $id)->with('providers')->get()->toJson();
            return response($plans, 200);
        } else {

            return response()->json([
                'success'   => false,
                'message'   => __('Erro ao obter o registo.'),
                'data' => [__('Registo não encontrado.')]
            ], 404);
        }
    }

    public function create()
    {
        return view('pages.plans.create');
    }

    public function store(Request $request, $id)
    {
        
    }

    public function edit($id)
    {
       
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
