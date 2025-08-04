<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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

        if ($request->hasFile('profile_picture')) {
            // deletes old profile picture if exists
            if (!empty($user->profile_picture) && Storage::disk('public')->exists('profile_pictures/' . $user->profile_picture)) {
                Storage::disk('public')->delete('profile_pictures/' . $user->profile_picture);
            }

            $file = $request->file('profile_picture');
            $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('profile_pictures', $filename, 'public');
            $credentials['profile_picture'] = $filename;
        }
        $user->update($credentials);
        return to_route('account')->with('success', 'Account updated successfully!');
    }
}
