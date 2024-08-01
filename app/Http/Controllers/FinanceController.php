<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinanceController extends Controller
{
    public function index()
    {
        $finances = Finance::latest()->first();
        return view('finances.index', compact('finances'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'income' => 'required|numeric',
            'expenses' => 'required|numeric',
            'balance' => 'required|numeric',
        ]);

        $finance = Finance::latest()->first();

        if ($finance) {
            $finance->update($request->all());
        } else {
            Finance::create($request->all());
        }

        return redirect()->route('finances.index');
    }
}