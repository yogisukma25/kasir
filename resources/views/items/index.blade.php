@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Daftar Barang</h1>
    <a href="{{ route('items.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Barang</a>
    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Nama</th>
                <th class="py-2 px-4 border-b">Harga</th>
                <th class="py-2 px-4 border-b">Stok</th>
                <th class="py-2 px-4 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td class="py-2 px-4 border-b">{{ $item->id }}</td>
                <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                <td class="py-2 px-4 border-b">{{ number_format($item->price, 2) }}</td>
                <td class="py-2 px-4 border-b">{{ $item->stock }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('items.edit', $item->id) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
