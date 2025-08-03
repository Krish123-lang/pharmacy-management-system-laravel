<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Supplier;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::latest()->get();
        return view('admin.purchases.list', compact('purchases'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $invoices = Invoice::all();
        return view('admin.purchases.add', compact('suppliers', 'invoices'));
    }

    public function store(Request $request)
    {
        $purchase_data = $request->validate([
            'supplier_id' => 'required',
            'invoice_id' => 'required',
            'voucher_number' => 'required||string',
            'purchase_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'payment_status' => 'required',
        ]);
        Purchase::create($purchase_data);
        return to_route('purchases')->with('success', "Purchase created successfully!");
    }

    public function edit(Purchase $purchase)
    {
        $suppliers = Supplier::all();
        $invoices = Invoice::all();
        return view('admin.purchases.edit', compact('purchase', 'suppliers', 'invoices'));
    }

    public function update(Purchase $purchase, Request $request)
    {
        $purchase_data = $request->validate([
            'supplier_id' => 'sometimes',
            'invoice_id' => 'sometimes',
            'voucher_number' => 'sometimes||string',
            'purchase_date' => 'sometimes|date',
            'total_amount' => 'sometimes|numeric',
            'payment_status' => 'sometimes',
        ]);
        $purchase->update($purchase_data);
        return to_route('purchases')->with('success', "Purchase updated successfully!");
    }

    public function destroy(Purchase $purchase)
    {
        $purchase = Purchase::find($purchase->id);
        $purchase->delete();
        return to_route('purchases')->with('success', "Purchase deleted successfully!");
    }
}
