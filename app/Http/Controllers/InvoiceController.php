<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::latest()->get();
        return view('admin.invoices.list', compact('invoices'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('admin.invoices.add', compact('customers'));
    }

    public function store(Request $request)
    {
        $invoice_data = $request->validate([
            'customer_id' => 'required|numeric',
            'net_total' => 'required|numeric',
            'invoice_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'total_discount' => 'required|numeric',
        ]);
        Invoice::create($invoice_data);
        return to_route('invoices')->with('success', "invoice created successfully!");
    }

    public function edit(Invoice $invoice)
    {
        $customers = Customer::all();
        return view('admin.invoices.edit', compact('invoice', 'customers'));
    }

    public function update(Invoice $invoice, Request $request)
    {
        $invoice_data = $request->validate([
            'customer_id' => 'sometimes|numeric',
            'net_total' => 'sometimes|numeric',
            'invoice_date' => 'sometimes|date',
            'total_amount' => 'sometimes|numeric',
            'total_discount' => 'sometimes|numeric',
        ]);
        $invoice->update($invoice_data);
        return to_route('invoices')->with('success', "invoice updated successfully!");
    }

    public function destroy(Invoice $invoice)
    {
        $invoice = Invoice::find($invoice->id);
        $invoice->delete();
        return to_route('invoices')->with('success', "invoice deleted successfully!");
    }
}
