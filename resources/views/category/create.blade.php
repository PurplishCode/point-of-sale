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
                            <h4>Add Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('categories.store') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3 pt-3">
                                    <label for="name">Category Name</label>
                                    <input type="text" name="catname" class="form-control" id="catname">
                                    <div class="pt-3">
                                        <label for="status">Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select></div>

                                    {{-- <div class="form-check row fw-bold pt-2">

                                    <div class="col-12"><input type="radio" name="status" value="1" id="status" class="form-check-input"><label for="status" class="form-check-label">Active</label></div>
                                    <div class="col-12"><input type="radio" name="status" value="0" id="status" class="form-check-input">Inactive</input></div>
                                    </div> --}}
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>
</html>
