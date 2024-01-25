@extends('layouts.app')

@section('Products', 'Product List')

@section('content')
<div class="container">
    @isset($products)
        <h1>Product List</h1>

        <table border="1" rules="all" class="product-table" >
            <thead>
                <tr>
                    <th>Libelle</th>
                    <th>Marque</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Images</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->libelle }}</td>
                        <td>{{ $product->marque }}</td>
                        <td>{{ $product->prix }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->image }}</td>

                        <td>
                            <a href="{{ route('products.show', ['product' => $product->id]) }}" class="button-detail">Details</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No products available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('products.create') }}" class="button">Create New Product</a>
    @else
        <p>No products available.</p>
    @endisset
</div>
