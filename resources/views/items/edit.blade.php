@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Barang</h1>
    <form action="{{ route('items.update', $item->id) }}" method="POST" class="bg-white p-4 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Barang</label>
            <input type="text" id="name" name="name" value="{{ old('name', $item->name) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
        </div>
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
            <input type="number" id="price" name="price" value="{{ old('price', $item->price) }}" step="0.01" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
        </div>
        <div class="mb-4">
            <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock', $item->stock) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
        </div>
        <div class="mb-4">
            <label for="company_id" class="block text-sm font-medium text-gray-700">Perusahaan</label>
            <select id="company_id" name="company_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                @foreach($companies as $company)
                <option value="{{ $company->id }}" {{ old('company_id', $item->company_id ?? '') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('items.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Batal</a>
    </form>
</div>
@endsection
