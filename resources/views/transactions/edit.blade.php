@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Transaksi</h1>
    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST" class="bg-white p-4 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="item_id" class="block text-sm font-medium text-gray-700">Barang</label>
            <select id="item_id" name="item_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                @foreach($items as $item)
                <option value="{{ $item->id }}" {{ $item->id == $transaction->item_id ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="quantity" class="block text-sm font-medium text-gray-700">Jumlah</label>
            <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $transaction->quantity) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
        </div>
        <div class="mb-4">
            <label for="total_amount" class="block text-sm font-medium text-gray-700">Jumlah Total</label>
            <input type="number" id="total_amount" name="total_amount" value="{{ old('total_amount', $transaction->total_amount) }}" step="0.01" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
        </div>
        <div class="mb-4">
            <label for="company_id" class="block text-sm font-medium text-gray-700">Perusahaan</label>
            <select id="company_id" name="company_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                @foreach($companies as $company)
                <option value="{{ $company->id }}" {{ old('company_id', $transaction->company_id ?? '') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('transactions.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Batal</a>
    </form>
</div>
@endsection
