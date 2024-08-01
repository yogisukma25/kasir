@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Keuangan</h1>
    @if($finances)
    <form action="{{ route('finances.update') }}" method="POST" class="bg-white p-4 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="income" class="block text-sm font-medium text-gray-700">Pemasukan</label>
            <input type="number" id="income" name="income" value="{{ old('income', $finances->income) }}" step="0.01" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
        </div>
        <div class="mb-4">
            <label for="expenses" class="block text-sm font-medium text-gray-700">Pengeluaran</label>
            <input type="number" id="expenses" name="expenses" value="{{ old('expenses', $finances->expenses) }}" step="0.01" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
        </div>
        <div class="mb-4">
            <label for="balance" class="block text-sm font-medium text-gray-700">Saldo</label>
            <input type="number" id="balance" name="balance" value="{{ old('balance', $finances->balance) }}" step="0.01" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
    @else
    <p class="text-gray-700">Data keuangan belum tersedia.</p>
    @endif
</div>
@endsection
