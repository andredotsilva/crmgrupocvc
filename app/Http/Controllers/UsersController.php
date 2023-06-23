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

    public function show() {
        if (User::where('id', $id)->exists()) {

            $users = User::where('id', $id)->get()->toJson();
            
        } 
    }

    
}
