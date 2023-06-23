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
    
}
