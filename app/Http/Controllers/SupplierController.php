<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::latest()->get();
        return view('admin.suppliers.list', compact('suppliers'));
    }

    public function create()
    {
        return view('admin.suppliers.add');
    }

    public function store(Request $request)
    {
        $supplier_data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'number' => 'required',
            'address' => 'required',
        ]);
        Supplier::create($supplier_data);
        return to_route('suppliers')->with('success', "supplier created successfully!");
    }

    public function edit(Supplier $supplier)
    {
        return view('admin.suppliers.edit', compact('supplier'));
    }

    public function update(Supplier $supplier, Request $request)
    {
        $supplier_data = $request->validate([
            'name' => 'sometimes|max:255',
            'email' => 'sometimes|email',
            'number' => 'sometimes|max:10',
            'address' => 'sometimes',
        ]);
        $supplier->update($supplier_data);
        return to_route('suppliers')->with('success', "supplier updated successfully!");
    }

    public function destroy(Supplier $supplier)
    {
        $supplier = Supplier::find($supplier->id);
        $supplier->delete();
        return to_route('suppliers')->with('success', "supplier deleted successfully!");
    }
}
