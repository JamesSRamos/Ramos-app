<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        thead {
            background-color: #667eea;
            color: white;
        }
        th {
            padding: 12px;
            text-align: left;
            font-weight: bold;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        tbody tr:hover {
            background-color: #f9f9f9;
        }
        .no-products {
            text-align: center;
            color: #999;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Products</h1>

        @if(empty($products))
            <div class="no-products">
                <p>No products found.</p>
            </div>
        @else
            <table>
<x-layout>
    <x-slot:heading>
        <div class="page-header">
            <span class="page-label">Inventory</span>
            <h1 class="page-title">Product List</h1>
        </div>
    </x-slot:heading>

    <x-table>
        <div class="table-wrapper">
            <table class="product-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product['id'] ?? $product->id }}</td>
                            <td>{{ $product['name'] ?? $product->name }}</td>
                            <td>{{ $product['category'] ?? $product->category }}</td>
                            <td class="col-id">{{ $product['id'] }}</td>
                            <td class="col-name">{{ $product['name'] }}</td>
                            <td class="col-category">
                                <span class="badge">{{ $product['category'] }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <h1>Tasks</h1>
        <ul>
            @foreach ($tasks as $task)
                <li>{{ $task }}</li>
            @endforeach
        </ul>

        <p>Global Variables:</p>
        <p>{{ $sharedVariable }}</p>

        <p>Product Key: {{ $productKey }}</p>
    </div>
</body>
</html>

            @if(empty($products))
                <div class="empty-state">No products found.</div>
            @endif
        </div>
    </x-table>
</x-layout>

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap');

    /* ── Header ── */
    .page-header {
        display: flex;
        flex-direction: column;
        gap: 0.2rem;
        padding: 2.5rem 0 1.5rem;
        animation: fadeUp 0.5s ease both;
    }

    .page-label {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.7rem;
        font-weight: 300;
        letter-spacing: 0.22em;
        text-transform: uppercase;
        color: #9ca3af;
    }

    .page-title {
        font-family: 'DM Serif Display', serif;
        font-size: clamp(1.8rem, 4vw, 3rem);
        font-weight: 400;
        color: #111827;
        margin: 0;
        line-height: 1.1;
    }

    /* ── Table wrapper ── */
    .table-wrapper {
        animation: fadeUp 0.6s ease 0.1s both;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        overflow: hidden;
    }

    /* ── Table ── */
    .product-table {
        width: 100%;
        border-collapse: collapse;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.9rem;
    }

    .product-table thead tr {
        background-color: #f9fafb;
        border-bottom: 1px solid #e5e7eb;
    }

    .product-table thead th {
        padding: 0.85rem 1.25rem;
        text-align: left;
        font-size: 0.68rem;
        font-weight: 500;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: #6b7280;
    }

    .product-table tbody tr {
        border-bottom: 1px solid #f3f4f6;
        transition: background 0.15s ease;
    }

    .product-table tbody tr:last-child {
        border-bottom: none;
    }

    .product-table tbody tr:hover {
        background-color: #f9fafb;
    }

    .product-table td {
        padding: 0.9rem 1.25rem;
        color: #374151;
        vertical-align: middle;
    }

    .col-id {
        font-size: 0.78rem;
        color: #9ca3af !important;
        font-weight: 300;
        width: 60px;
    }

    .col-name {
        font-weight: 400;
        color: #111827 !important;
    }

    /* ── Category badge ── */
    .badge {
        display: inline-block;
        padding: 0.2rem 0.65rem;
        font-size: 0.72rem;
        font-weight: 400;
        letter-spacing: 0.05em;
        color: #374151;
        background: #f3f4f6;
        border: 1px solid #e5e7eb;
        border-radius: 999px;
    }

    /* ── Empty state ── */
    .empty-state {
        padding: 3rem;
        text-align: center;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.9rem;
        color: #9ca3af;
        font-weight: 300;
    }

    /* ── Animation ── */
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>