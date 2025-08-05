<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login()
    {
        // $password = Hash::make('password123');
        // dd($password);
        return view('auth.login');
    }

    public function login_post(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            if (is_null(Auth::user()->email_verified_at)) {
                Auth::logout();
                return redirect()->back()->with('error', 'Please verify your email before logging in.');
            }
            if (Auth::user()->is_role == 'ADM') {
                return to_route('dashboard');
            } elseif (Auth::user()->is_role == 'USR') {
                // redirect to user dashboard
                return redirect()->route('user.dashboard');
            } else {
                Auth::logout();
                return redirect()->back()->with('error', 'Your account role is not recognized. Please contact support.');
            }
        } else {
            return redirect()->back()->with('error', 'Please enter correct credentials!');
        }
    }

    public function forgot()
    {
        return view('auth.forgot');
    }

    public function forgot_post(Request $request)
    {
        $count = User::where('email', '=', $request->email)->count();
        if ($count > 0) {
            $user = User::where('email', '=', $request->email)->first();
            $user->remember_token = Str::random(50);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'Password reset link has been sent. Please check your spam folder.');
        } else {
            return redirect()->back()->withInput()->with('error', "Email not found!");
        }
    }

    public function getReset($token)
    {
        if (Auth::check()) {
            return redirect('admin/dashboard');
        }

        $user = User::where('remember_token', '=', $token);
        if ($user->count() == 0) {
            abort(403);
        }
        $user = $user->first();
        $data['token'] = $token;
        return view('auth.reset', $data);
    }

    public function postReset($token, ResetPassword $request)
    {
        $user = User::where('remember_token', '=', $token);
        if ($user->count() == 0) {
            abort(403);
        }
        $user = $user->first();
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('/')->with('success', 'Password has been reset!');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerSave(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
        ]);
        // send email verification
        $user->sendEmailVerificationNotification();
        Auth::login($user);
        return redirect()->route('verification.notice')->with('success', 'Registration successful! Please check your email to verify your account.');
    }

    public function user_dashboard()
    {
        return view('user.dashboard');
    }

    public function userAccount()
    {
        $user = Auth::user();
        return view('user.account.update', compact('user'));
    }

    public function userUpdateAccount(User $user, Request $request)
    {
        $validated = $request->validate([
            'name' => 'sometimes|max:100',
            'email' => 'sometimes|email' . $user->id,
            'profile_picture' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048',
            'password' => 'nullable|confirmed|min:6',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if ($request->hasFile('profile_picture')) {
            // deletes old profile picture if exists
            if (!empty($user->profile_picture) && Storage::disk('public')->exists('profile_pictures/' . $user->profile_picture)) {
                Storage::disk('public')->delete('profile_pictures/' . $user->profile_picture);
            }

            $file = $request->file('profile_picture');
            $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('profile_pictures', $filename, 'public');
            // Save only the filename, not the path
            $user->profile_picture = $filename;
        }

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        // if (empty($validated['password'])) {
        //     unset($validated['password']);
        // } else {
        //     $validated['password'] = Hash::make($validated['password']);
        // }
        $user->update($validated);
        return to_route('user.account')->with('success', 'Profile updated successfully!');
    }
}
