@extends('layouts.app')

@section('title', 'Create New Product')

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

            <label for="libelle">Libelle:</label>
            <input type="text" name="libelle" value="{{ old('libelle') }}" required>
            <br>

            <label for="marque">Marque:</label>
            <input type="text" name="marque" value="{{ old('marque') }}" required>
            <br>

            <label for="prix">Prix:</label>
            <input type="text" name="prix" value="{{ old('prix') }}" required>
            <br>

            <label for="stock">Stock:</label>
            <input type="number" name="stock" value="{{ old('stock') }}" required min="1" max="9999">
            <br>

            <label for="image">Image (optional):</label>
            <input type="file" name="image">
            <br>

            <button type="submit">Create Product</button>
        </form>
    </div>
@endsection
