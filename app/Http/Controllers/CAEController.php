<?php

namespace App\Http\Controllers;

use App\Models\CAE;
use Illuminate\Http\Request;

class CAEController extends Controller
{
    public function index()
    {

        $caes = CAE::all();
        return view('pages.cae.index', compact('caes'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'title' => 'required',
        ]);

        CAE::create([
            'code' => $request->code,
            'title' => $request->title,
        ]);

        return redirect()->route('cae.index')
            ->with('success');
    }

    
    public function edit($id)
    {
        $cae = CAE::findOrFail($id);
        return view('pages.cae.edit', compact('cae'));
    }


    public function update(Request $request, $id)
    {
        $cae = CAE::where('id', $id)->first();

        $cae->code = $request->code;
        $cae->title = $request->title;
        $cae->save();

        return redirect()->route('cae.index')->with('success', 'CAE updated successfully!');
    }

    public function destroy($id)
    {
        $cae = CAE::findOrFail($id);

        $cae->delete();

        return redirect()->route('cae.index')->with('success', 'CAE updated successfully!');
    }
}
