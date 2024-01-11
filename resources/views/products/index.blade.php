@extends('layouts.app')

@section('title', 'Product List')

@section('content')
    <div class="container">
        @isset($products)
            <h1>Product List</h1>

            <table>
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
                            <td>{{ $product['libelle'] }}</td>
                            <td>{{ $product['marque'] }}</td>
                            <td>{{ $product['prix'] }}</td>
                            <td>{{ $product['stock'] }}</td>
                            <td>{{ $product['image'] }}</td>

                            <td>
                                <a href="{{ route('products.edit', ['product' => $product['id']]) }}">Modifier</a>
                                <form action="{{ route('products.destroy', ['product' => $product['id']]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')">Supprimer</button>
                                </form>
                                <td>
                                <a href="{{ route('products.show', ['product' => $product['id']]) }}">Details</a>
                                </td>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No products available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <a href="{{ route('products.create') }}">Create New Product</a>
        @else
            <p>No products available.</p>
        @endisset
    </div>
@endsection
