@extends('base.layout')
@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-white">
                    <h4>Edit Product</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" name="productName" class="form-control" value="{{ $product->productName }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Price Number</label>
                            <input type="text" name="price" class="form-control" value="{{ $product->price }}" required>
                        </div>
                        <!-- Category Dropdown -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-select select2">
                                @foreach ($categories as $id => $name)
                                    <option value="{{ $id }}" {{ $id == $product->category_id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Brand Dropdown -->
                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand</label>
                            <select name="brand_id" id="brand_id" class="form-select select2">
                                @foreach ($brands as $id => $name)
                                    <option value="{{ $id }}" {{ $id == $product->brand_id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-warning btn-lg fw-bold shadow-sm text-white">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Initialize Select2 -->
<script>
    $(document).ready(function() {
        $(".select2").select2({
            placeholder: "Search...",
            allowClear: true,
            width: "100%"
        });
    });
</script>

@endsection
