@extends('layouts.app')

@section('Products', 'Product Details')

@section('content')
    <div class="container">
        @isset($product)
            <h1>Product Details</h1>

            <table>
                <tr>
                    <th>Libelle</th>
                    <td>{{ $product->libelle }}</td>
                </tr>
                <tr>
                    <th>Marque</th>
                    <td>{{ $product->marque }}</td>
                </tr>
                <tr>
                    <th>Prix</th>
                    <td>{{ $product->prix }}</td>
                </tr>
                <tr>
                    <th>Stock</th>
                    <td>{{ $product->stock }}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td>{{ $product->image }}</td>
                </tr>
            
            </table>

            <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="button-edit" >Modifier</a>
            <br><br>
            <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')" class="button-supp">Supprimer</button>
            </form>
            <br><br>
            <a href="{{ route('products.index') }}" class="button" >Back to Product List</a>
        @else
            <p>No product details available.</p>
        @endisset
    </div>
@endsection
