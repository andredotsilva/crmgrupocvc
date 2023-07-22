<?php

namespace App\Http\Controllers;

use App\Models\Role;
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
        $user = User::with(['roles', 'client', 'client.contracts', 'client.district', 'client.municipality', 'client.parish'])->findOrFail($id);
        return view('pages.users.show', [
            'user' => $user,
        ]);
    }

    public function edit($id)
    {
        $user = User::with('roles')->where('id', $id)->first();
        $roles = Role::all();

        return view('pages.users.edit', compact(['user', 'roles']));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $roles = ($request->input('role') !== 'Escolher Roles')
            ? $request->input('role')
            : null;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->roles()->sync($roles);

        $user->save();

        return redirect()->route('users.show', $user->id);
    }

    public function fetchUserByCode($code)
    {
        $user = User::where('code', $code)->first();

        return response()->json($user);
    }

    public function search(Request $request)
    {
        $name = $request->input('name');

        $users = User::with('roles')->where('name', 'LIKE', "%$name%")->get();

        return view('pages.users.index', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Kamar Theresia deleted successfully');
    }
}
