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
        // $data = new Customer;
        // $data->name = trim($request->name);
        // $data->contact_number = trim($request->contact_number);
        // $data->address = trim($request->address);
        // $data->doctor_name = trim($request->doctor_name);
        // $data->doctor_address = trim($request->doctor_address);
        // $data->save();

        $data = $request->validate([
            'name' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
            'doctor_name' => 'required',
            'doctor_address' => 'required',
        ]);
        Customer::create($data);

        return to_route('customers')->with('success', "Customer created successfully!");
    }

    public function edit_customers(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    public function update_customers(Customer $customer, Request $request)
    {
        $data = $request->validate([
            'name' => 'sometimes',
            'contact_number' => 'sometimes|integer|max_digits:10',
            'address' => 'sometimes',
            'doctor_name' => 'sometimes',
            'doctor_address' => 'sometimes',
        ]);
        $customer->update($data);
        return to_route('customers')->with('success', "Customer updated successfully!");
    }

    public function delete_customers(Customer $customer)
    {
        $customer = Customer::find($customer->id);
        $customer->delete();
        return to_route('customers')->with('success', "Customer deleted successfully!");
    }
}
