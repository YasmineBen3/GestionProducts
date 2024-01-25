@extends('layouts.app')

@section('Product', 'Create New Product')

@section('content')
    <div class="container">
        <h1>Create New Product</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td><label for="libelle">Libelle:</label></td>
                    <td><input type="text" name="libelle" placeholder="libelle" value="{{ old('libelle') }}" required></td>
                </tr>
                <tr>
                
                <td><label for="marque">Marque:</label></td>
                <td><input type="text" name="marque" placeholder="marque" value="{{ old('marque') }}" required></td>
                </tr>
                <tr>
                <td><label for="prix">Prix:</label></td>
                <td><input type="text" name="prix" placeholder="prix" value="{{ old('prix') }}" required></td>
                </tr>
                <tr>
                <td><label for="stock">Stock:</label></td>
                <td><input type="number" name="stock" placeholder="stock" value="{{ old('stock') }}" required min="1" max="9999"></td>
                </tr>
                <tr>
                <td><label for="image">Image (optional):</label></td>
                <td><input type="file" name="image" placeholder="image"></td>
                </tr>
            </table>

            <button type="submit" class="button" >Create Product</button>
        </form>
    </div>
@endsection
