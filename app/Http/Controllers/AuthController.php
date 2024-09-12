<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegisterForm(): Application|Factory|View|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return redirect('/admin')->withErrors(['error' => 'You should logout to access this page']);
            } else {
                return redirect('/')->withErrors(['error' => 'You should logout to access this page']);
            }
        }
        return view('register');
    }

    public function register(Request $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'regex:/^[a-zA-Z0-9._%+-]+@(gmail\.com|co\.id)$/i',
                'unique:users',
            ],
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Your account successfully registered, please try logn');
    }

    public function showLoginForm(): Application|Factory|View|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return redirect('/admin')->withErrors(['error' => 'You should logout to access this page']);
            } else {
                return redirect('/')->withErrors(['error' => 'You should logout to access this page']);
            }
        }
        return view('login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt(['username' => $credentials['email'], 'password' => $credentials['password']]) || Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == "admin") {
                return redirect('/admin')->with('success', 'Welcome back, ' . $user->username . '!');
            } else {
                return redirect('/')->with('success', 'Welcome back, ' . $user->username . '!');
            }
        }
        return redirect()->back()->withErrors(['error' => 'The provided credentials do not match our records.']);
    }

    public function logout(): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        Auth::logout();
        return redirect('/login');
    }
}
