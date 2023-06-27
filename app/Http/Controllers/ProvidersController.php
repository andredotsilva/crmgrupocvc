<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Contract;
use Illuminate\Http\Request;

class ProvidersController extends Controller
{
    public function index()
    {
        $providers = Provider::all();
        return view('pages.providers.index', compact('providers'));
    }

    public function edit($id)
    {
        $providers = Provider::findOrFail($id);

        return view('pages.providers.edit', compact('providers'));
    }

    public function update(Request $request, $id)
    {
        $providers = Provider::where('id', $id)->first();

        $providers->acronym = $request->acronym;
        $providers->title = $request->title;

        $providers->save();

        return redirect('/providers')->with('success', 'Provider updated successfully.');
    }

    public function destroy($id)
    {
        $providers = Provider::findOrFail($id);

        $providers->delete();

        return redirect('/providers')->with('success', 'Provider Deleted successfully.');
    }
}
