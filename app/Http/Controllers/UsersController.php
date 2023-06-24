<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contract;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('pages.users.index', [
            'users' => $users,
        ]);
    }

    public function show($id)
    {
        $users = User::with('roles')->findOrFail($id); 
        return view('pages.users.show', compact('users'));
    }

    public function edit($id)
    {
        $users = User::with('roles')->find($id);

        return view('pages.users.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);

        $users->name = $request->input('name');
        $users->email = $request->input('email');

        $users->save();

        return redirect()->route('users.show', $users->id);
    }


    public function search(Request $request)
    {
        $name = $request->input('name');

        $users = User::with('roles')->where('name', 'LIKE', "%$name%")->get();

        return view('pages.users.index', compact('users'));
    }

    public function destroy(Request $request)
    {
        $delete = User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','Kamar Theresia deleted successfully');
    }


}
