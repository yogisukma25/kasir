@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Daftar Transaksi</h1>
    <a href="{{ route('transactions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Transaksi</a>
    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Barang</th>
                <th class="py-2 px-4 border-b">Jumlah</th>
                <th class="py-2 px-4 border-b">Jumlah Total</th>
                <th class="py-2 px-4 border-b">Tanggal</th>
                <th class="py-2 px-4 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
            <tr>
                <td class="py-2 px-4 border-b">{{ $transaction->id }}</td>
                <td class="py-2 px-4 border-b">{{ $transaction->item->name }}</td>
                <td class="py-2 px-4 border-b">{{ $transaction->quantity }}</td>
                <td class="py-2 px-4 border-b">{{ number_format($transaction->total_amount, 2) }}</td>
                <td class="py-2 px-4 border-b">{{ $transaction->created_at->format('d-m-Y H:i') }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('transactions.edit', $transaction->id) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="inline-block">
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
