<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Brand</title>
</head>
<body>
@extends('base.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Brand</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('brands.update', $brands->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group
                            mb-3 pt-3">
                                <label for="name">Brand Name</label>
                                <input type="text" name="brandname" class="form-control" id="brandname" value="{{ $brands->brandname }}">
                                <div class="pt-3">
                                    <label for="status">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="1" {{ $brands->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $brands->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
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
