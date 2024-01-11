@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>

        <form action="{{ route('products.update', ['product' => $product['id']]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="libelle">Libelle:</label>
                <input type="text" name="libelle" id="libelle" value="{{ $product['libelle'] }}" required>
            </div>

            <div>
                <label for="prix">Prix:</label>
                <input type="text" name="prix" id="prix" value="{{ $product['prix'] }}" required>
            </div>

            <div>
                <label for="marque">Marque:</label>
                <input type="text" name="marque" id="marque" value="{{ $product['marque'] }}" required>
            </div>

            <div>
                <label for="stock">Stock:</label>
                <input type="number" name="stock" id="stock" value="{{ $product['stock'] }}" required>
            </div>


            <div >
                <label for="image">Image:</label>
                <input type="file" name="image" id="image">
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection
