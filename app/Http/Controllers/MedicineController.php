<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::latest()->get();
        return view('admin.medicines.list', compact('medicines'));
    }

    public function create()
    {
        return view('admin.medicines.add');
    }

    public function store(Request $request)
    {
        $medicine_data = $request->validate([
            'medicine_name' => 'required|max:255',
            'packing' => 'required|max:255',
            'generic_name' => 'required|max:255',
            'supplier_name' => 'required|max:255',
        ]);
        Medicine::create($medicine_data);
        return to_route('medicines')->with('success', "Medicine created successfully!");
    }

    public function edit(Medicine $medicine)
    {
        return view('admin.medicines.edit', compact('medicine'));
    }

    public function update(Medicine $medicine, Request $request)
    {
        $medicine_data = $request->validate([
            'medicine_name' => 'sometimes|max:255',
            'packing' => 'sometimes|max:255',
            'generic_name' => 'sometimes|max:255',
            'supplier_name' => 'sometimes|max:255',
        ]);
        $medicine->update($medicine_data);
        return to_route('medicines')->with('success', "Medicine updated successfully!");
    }

    public function destroy(Medicine $medicine)
    {
        $medicine = Medicine::find($medicine->id);
        $medicine->delete();
        return to_route('medicines')->with('success', "Medicine updated successfully!");
    }
}
