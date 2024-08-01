<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.4/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <nav class="bg-blue-500 p-4 text-white">
            <div class="container mx-auto flex justify-between">
                <a href="{{ route('items.index') }}" class="text-lg font-bold">Barang</a>
                <a href="{{ route('transactions.index') }}" class="text-lg font-bold">Transaksi</a>
                <a href="{{ route('finances.index') }}" class="text-lg font-bold">Keuangan</a>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
