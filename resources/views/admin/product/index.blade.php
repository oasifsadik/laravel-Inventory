@extends('admin.master')

@section('title')
Add-Product
@endsection



@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Add Product
            </header>
            <div class="card-body">
                <form method="POST" action="{{ url('dashboard/product-save')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="" >Select Category</label>
                                <select class="custom-select mb-3" name="cat_id" id="cat_id">
                                    <option selected disabled>Select Category</option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}" {{ old('cat_id') == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('cat_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name" value="{{ old('name') }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="buying_date">Buying Date</label>
                                <input type="date" class="form-control" id="buying_date" name="buying_date" value="{{ old('buying_date') }}">
                                @error('buying_date')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="buying_price">Buying Price</label>
                                <input type="number" class="form-control" id="buying_price" name="buying_price" placeholder="Enter Your Buying Price" value="{{ old('buying_price') }}">
                                @error('buying_price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="qty">Product Quantity</label>
                                <input type="number" class="form-control" id="qty" name="qty" placeholder="Enter Your Quantity">
                            </div>
                                @error('qty')
                                  <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="buying_date">Stock Date</label>
                                <input type="date" class="form-control" id="stock_date" name="stock_date" value="{{ old('stock_date') }}">
                                @error('stock_date')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_img">Product Image</label>
                                <input type="file" class="form-control" id="product_img" name="product_img">
                                @error('product_img')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="" >Select Product Status</label>
                                <select class="custom-select mb-3" name="status">
                                    <option selected disabled>Product Status</option>
                                        <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_description">Product Description</label>
                                      <br>
                                <textarea name="product_description" id="product_description" cols="168" rows="5">{{ old('product_description') }}</textarea>
                                    @error('product_description')
                                       <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </section>
    </div>
</div>
@endsection
