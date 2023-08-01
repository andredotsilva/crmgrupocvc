<?php

namespace App\Http\Controllers;

use App\Models\CAE;
use Illuminate\Http\Request;

class CAEController extends Controller
{
    public function index()
    {
        $caes = CAE::all();

        return response()->json($caes, 200);
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

        return redirect()->route('')
            ->with('success');
    }

    public function edit($id)
    {
        $cae = CAE::findOrFail($id);

        return view('', [
            $cae => '$cae'
        ]);
    }

    public function update(Request $request, $id)
    {
        $cae = CAE::where('id', $id)->first();

        $cae->code = $request->code;
        $cae->title = $request->title;

        $cae->save();

        return redirect('')->with('success');
    }

    public function destroy($id)
    {
        $cae = CAE::findOrFail($id);

        $cae->delete();

        return redirect('')->with('');
    }
}
