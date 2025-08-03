<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard.list');
    }

    public function account(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return view('admin.account.update', compact('user'));
    }

    public function update_account(User $user, Request $request)
    {
        $credentials = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if (empty($credentials['password'])) {
            unset($credentials['password']);
        } else {
            $credentials['password'] = Hash::make($credentials['password']);
        }
        // dd($request->all);
        $user->update($credentials);
        return to_route('account')->with('success', 'Account updated successfully!');
    }
}
