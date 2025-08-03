<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::latest()->get();
        return view('admin.stocks.list', compact('stocks'));
    }

    public function create()
    {
        $medicine = Medicine::all();
        return view('admin.stocks.add', compact('medicine'));
    }

    public function store(Request $request)
    {
        $stock_data = $request->validate([
            'medicine_id' => 'required|max:255',
            'batch_id' => 'required|max:255',
            'expiry_date' => 'date',
            'quantity' => 'required|max:255',
            'mrp' => 'required|max:255',
            'rate' => 'required|max:255',
        ]);
        Stock::create($stock_data);
        return to_route('stocks')->with('success', "stock created successfully!");
    }

    public function edit(Stock $stock)
    {
        $medicine = Medicine::all();
        return view('admin.stocks.edit', compact('stock', 'medicine'));
    }

    public function update(Stock $stock, Request $request)
    {
        $stock_data = $request->validate([
            'medicine_id' => 'sometimes|max:255',
            'batch_id' => 'sometimes|max:255',
            'expiry_date' => 'date',
            'quantity' => 'sometimes|max:255',
            'mrp' => 'sometimes|max:255',
            'rate' => 'sometimes|max:255',
        ]);
        $stock->update($stock_data);
        return to_route('stocks')->with('success', "stock updated successfully!");
    }

    public function destroy(Stock $stock)
    {
        $stock = Stock::find($stock->id);
        $stock->delete();
        return to_route('stocks')->with('success', "stock deleted successfully!");
    }
}
