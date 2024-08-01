<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('item')->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $items = Item::all();
        return view('transactions.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer',
            'total_amount' => 'required|numeric',
            'company_id' => 'required|exists:companies,id',
        ]);
    
        Transaction::create($request->all());
        return redirect()->route('transactions.index');
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        $items = Item::all();
        return view('transactions.edit', compact('transaction', 'items'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer',
            'total_amount' => 'required|numeric',
            'company_id' => 'required|exists:companies,id',
        ]);
    
        $transaction->update($request->all());
        return redirect()->route('transactions.index');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index');
    }
}