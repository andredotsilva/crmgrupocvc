<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Contract;
use App\Models\Provider;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    public function index(Request $request)
    {
        $plans = Plan::all();
        return view('pages.plans.index', compact('plans'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'provider_id' => 'required',
            'title' => 'required',
        ]);

        $plans = new Plan();
        $plans->title = $request->title;

        $provider = Provider::findOrFail($request->provider_id);
        $provider->plans()->save($plans);

        return redirect()->route('plans.index')
            ->with('success');
    }



    public function create()
    {
        $providers = Provider::all();
        $plans = Plan::all();

        return view('pages.plans.create', compact('providers', 'plans'));
    }

    public function edit(Provider $provider, Plan $plan)
    {
        $providers = Provider::all();
        return view('pages.plans.edit', compact('provider', 'plan', 'providers'));
    }

    public function update(Request $request, Provider $provider, Plan $plan)
    {
        $request->validate([
            'provider_id' => 'required',
            'title' => 'required',
        ]);

        $plan->provider_id = $request->provider_id;
        $plan->title = $request->title;
        $plan->save();

        return redirect()->route('plans.index')->with('success', 'Plan updated successfully!');
    }

    public function destroy($id)
    {
        $plans = Plan::findOrFail($id);

        $plans->delete();

        return redirect('/plans')->with('success', 'Provider Deleted successfully.');
    }

    public function plansbyproviderid()
    {
        $plans = Plan::whereHas('provider', function ($query) {
            $query->whereId(request()->input('provider_id', 0));
        })->get();

        return response()->json($plans);
    }

    
}
