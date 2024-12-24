@extends('layouts.admin')

@section('content')
    <h1>Manage Event Categories</h1>

    <!-- Form untuk menambahkan kategori baru -->
    <div class="add-category">
        <h2>Add New Category</h2>
        <form action="{{ route('admin.addCategory') }}" method="POST">
            @csrf
            <label for="name">Category Name:</label>
            <input type="text" name="name" id="name" required>
            <button type="submit">Add Category</button>
        </form>
    </div>

    <!-- Daftar kategori yang ada -->
    <div class="category-list">
        <h2>Existing Categories</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('admin.editCategory', $category->id) }}">Edit</a> |
                            <a href="{{ route('admin.deleteCategory', $category->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
