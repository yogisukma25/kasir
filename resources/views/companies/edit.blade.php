@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Perusahaan</h1>
    <form action="{{ route('companies.update', $company->id) }}" method="POST" class="bg-white p-4 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Perusahaan</label>
            <input type="text" id="name" name="name" value="{{ old('name', $company->name) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('companies.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Batal</a>
    </form>
</div>
@endsection
