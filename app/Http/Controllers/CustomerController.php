<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customers(Request $request)
    {
        $customers = Customer::all();
        return view('admin.customers.list', compact('customers'));
    }

    public function add_customers(Request $request)
    {
        return view('admin.customers.add');
    }

    public function insert_add_customers(Request $request)
    {
        $data = new Customer;
        $data->name = trim($request->name);
        $data->contact_number = trim($request->contact_number);
        $data->address = trim($request->address);
        $data->doctor_name = trim($request->doctor_name);
        $data->doctor_address = trim($request->doctor_address);
        $data->save();

        return to_route('customers')->with('success', "Customer created successfully!");
    }
}
