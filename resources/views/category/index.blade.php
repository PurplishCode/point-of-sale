<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
</head>

<body>
    @extends('base.layout')
    @section('content')
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Category</h4>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add Category</a>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->catname }}</td>
                                            <td>
                                                @if ($category->status == 1)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('categories.edit', $category->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <button class="btn btn-danger btn-sm d-inline" data-bs-target="#staticmodal"
                                                    data-bs-toggle="modal">Delete</button>
                                            </td>
                                        </tr>

        <div class="modal" id="staticmodal" tabindex="-1" aria-labelledby="staticmodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this category?</p>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-md">Yes</button>

                            <div class="btn btn-success btn-md" data-bs-dismiss="modal" aria-label="close">Nevermind</div>
                        </form>
                    </div>
                </div>
            </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
</body>

</html>
