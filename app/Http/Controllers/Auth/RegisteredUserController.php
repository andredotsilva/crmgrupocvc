<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendUserPassword;
use Illuminate\Support\Facades\Log;



class RegisteredUserController extends Controller
{
    
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            // Validação
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                //'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $password = Str::random(10);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($password),
            ]);

            $role = Role::where('id', 4)->first();

            $user->roles()->attach($role);

            Mail::to($user->email)->send(new SendUserPassword($user, $password));

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);

        } catch (\Exception $e) {
            Log::error('Erro no registo de utilizador:', ['error' => $e->getMessage()]);
            return back()->with('error', 'Erro ao criar conta.')->withInput();
        }

        
    }
}
