@extends('base.layout')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">✨ Add Product</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="name" class="fw-bold">📌 Product Name</label>
                            <input type="text" name="productname" class="form-control shadow-sm border-primary" id="catname" placeholder="Enter product name" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="fw-bold">Price</label>
                            <input type="text" name="price" class="form-control shadow-sm border-primary" id="price" placeholder="Enter price number" required>
                        </div>

                        <!-- Category Dropdown -->
                        <div class="mb-3">
                            <label for="category" class="fw-bold">📂 Category</label>
                            <select name="category_id" id="category_id" class="form-select shadow-sm border-primary stylish-select">
                                @forelse ($categories as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @empty
                                    <option value="">No Category Found</option>
                                @endforelse
                            </select>
                        </div>

                        <!-- Brand Dropdown -->
                        <div class="mb-3">
                            <label for="brand" class="fw-bold">🏷️ Brand</label>
                            <select name="brand_id" id="brand_id" class="form-select shadow-sm border-primary stylish-select">
                                @forelse ($brands as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @empty
                                    <option value="">No Brand Found</option>
                                @endforelse
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold shadow-sm">💾 Save Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
    .stylish-select {
        background-color: #f8f9fa;
        transition: all 0.3s ease-in-out;
        cursor: pointer;
    }

    .stylish-select:hover {
        background-color: #e9ecef;
        border-color: #0d6efd;
    }

    .stylish-select:focus {
        background-color: #ffffff;
        border-color: #0a58ca;
        box-shadow: 0px 0px 10px rgba(13, 110, 253, 0.5);
    }
</style>
@endsection
