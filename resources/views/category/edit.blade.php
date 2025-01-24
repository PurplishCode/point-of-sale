<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('base.layout')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group
                                mb-3 pt-3">
                                    <label for="name">Category Name</label>
                                    <input type="text" name="catname" class="form-control" id="catname" value="{{ $category->catname }}">
                                    <div class="form-check
                                    row fw-bold pt-2">
                                    <div class="col-12">
                                        <input type="radio" name="status" value="1" id="status" class="form-check-input" @if ($category->status == 1) checked @endif>
                                        <label for="status" class="form-check-label">Active</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="radio" name="status" value="0" id="status" class="form-check-input" @if ($category->status == 0) checked @endif>
                                        <label for="status" class="form-check-label">Inactive</label>
                                    </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>
</html>
