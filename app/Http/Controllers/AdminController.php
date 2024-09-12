<?php

namespace App\Http\Controllers;

use App\Models\Arrival;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $collections = Collection::all();
        $arrivals = Arrival::all();
        return view('admin.homeAdmin', compact('collections', 'arrivals'));
    }

    public function profile(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::all();
        return view('admin.adminPage', compact('users'));
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
        return view('admin.loginAdmin');
    }

    public function edit($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::findOrFail($id);
        return view('admin.editProfileAdmin', compact('user'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $user = User::findOrFail($id);
        $user->username = $request->username;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.profile')->with('success', 'Profile was successfully deleted');
    }
}
