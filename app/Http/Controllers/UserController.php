<?php

namespace App\Http\Controllers;

use App\Models\Arrival;
use App\Models\Collection;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        return view('editProfile', compact('user'));
    }

    public function profile(): Application|View|Factory|Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        if (Auth::getUser()->role === "admin") {
            return redirect('admin/profile');
        }
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'nm' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'birth_date' => 'required|date',
            'phone' => 'required|string|max:15',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->name = $request->nm;
        $user->username = $request->username;
        $user->birth_date = $request->birth_date;
        $user->phone = $request->phone;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    public function index(): View|Application|Factory|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.index');
        }
        $collections = Collection::all();
        $arrivals = Arrival::all();
        return view('home', compact('collections', 'arrivals'));
    }
}
