@extends('layouts.app')

@section('Product', 'Edit Product')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>

        <form action="{{ route('products.update', ['product' => $product['id']]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table>
            <div>
                <tr>
                    <td><label for="libelle">Libelle:</label></td>
                    <td><input type="text" name="libelle" id="libelle" value="{{ $product['libelle'] }}" required></td>
                </tr>
            </div>

            <div>
                <tr>
                    <td><label for="prix">Prix:</label></td>
                    <td><input type="text" name="prix" id="prix" value="{{ $product['prix'] }}" required></td>
                </tr>
            </div>

            <div>
                <tr>
                    <td><label for="marque">Marque:</label></td>
                    <td><input type="text" name="marque" id="marque" value="{{ $product['marque'] }}" required></td>
                </tr>
            </div>

            <div>
                <tr>
                    <td><label for="stock">Stock:</label></td>
                    <td><input type="number" name="stock" id="stock" value="{{ $product['stock'] }}" required></td>
                </tr>
            </div>


            <div>
                <tr>
                    <td><label for="image">Image:</label></td>
                    <td><input type="file" name="image" id="image"></td>
                </tr>
            </div>
        </table>

            <button type="submit" class="button-edit" >Update Product</button>
        </form>
    </div>
@endsection
