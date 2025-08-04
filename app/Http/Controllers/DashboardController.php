<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Medicine;
use App\Models\Purchase;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $total_customers = Customer::count();
        $total_medicines = Medicine::count();
        $total_stocks = Stock::count();
        $total_suppliers = Supplier::count();
        $total_invoices = Invoice::count();
        $total_purchase_amount = DB::table('purchases')->sum('total_amount');
        return view('admin.dashboard.list', compact('total_customers', 'total_medicines', 'total_stocks', 'total_suppliers', 'total_invoices', 'total_purchase_amount'));
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
