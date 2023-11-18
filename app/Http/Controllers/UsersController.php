<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Role;
use App\Models\User;
use App\Models\Contract;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::all();

        $users = User::with(['roles'])
            ->when($request->filled('name'), function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->input('name') . '%');
            })
            ->when($request->filled('role_id'), function ($query) use ($request) {
                return $query->whereHas('roles', function ($query) use ($request) {
                    $query->where('id', $request->input('role_id'));
                });
            })->paginate(20);

        return view('pages.users.index', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function show($id)
    {
        $contracts = Contract::with('client.user')
            ->whereHas('client.user', function ($query) use ($id) {
                $query->where('id', $id);
            })
            ->get();

        $user = User::with(['roles', 'client', 'client.contracts', 'client.district', 'client.municipality', 'client.parish'])->where('id', $id)->first();

        return view('pages.users.show', [
            'user' => $user,
            'contracts' => $contracts
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

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Kamar Theresia deleted successfully');
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(Request $request)    
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::where('id', 4)->first();

        $user->roles()->attach($role);

        event(new Registered($user));

        return redirect()->route('users.index')
            ->with('success');


    }
}
