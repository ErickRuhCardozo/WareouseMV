<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check())
            return Redirect::route('home');

        $userNames = User::select('name')
                         ->get()
                         ->map(fn($user) => $user->name);
        return View::make('login.index', compact('userNames'));
    }

    public function authenticate(Request $request)
    {
        $data = $request->validate([
            'user' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('name', $data['user'])->first();

        if (!Hash::check($data['password'], $user->password)) {
            return Redirect::back()->withErrors(['password' =>'Senha Incorreta'])->withInput();
        }

        Auth::login($user, true);
        $request->session()->regenerate();
        return Redirect::route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return Redirect::route('login');
    }
}
