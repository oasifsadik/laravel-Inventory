@extends('admin.master')

@section('title')
Update-Product
@endsection



@section('content')
<div class="container-fluid">
    <h2><a href="{{ url('/All-product') }}"><i class="fa fa-backward"></i></a>|Edit Products</h2>
<div class="row mt-3">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Update Product
            </header>
            <div class="card-body">
                <form method="POST" action="{{ url('product-update',$product->id)}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="" >Select Category</label>
                                <select class="custom-select mb-3" name="cat_id" id="cat_id">
                                    <option selected disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ isset($product) && $product->cat_id === $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                        @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name" value="{{ $product->product_name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="buying_date">Buying Date</label>
                                <input type="date" class="form-control" id="buying_date" name="buying_date" value="{{ $product->buying_date }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="buying_price">Buying Price</label>
                                <input type="number" class="form-control" id="buying_price" name="buying_price" placeholder="Enter Your Buying Price" value="{{$product->buying_price }}">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_img">Product Image</label>
                                <input type="file" class="form-control" id="product_img" name="product_img">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="" >Select Product Status</label>
                                <select class="custom-select mb-3" name="status">
                                    <option selected disabled>Product Status</option>
                                        <option value="Active" {{ $product->status == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ $product->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('product/'. $product->product_img) }}" height="80px" width="70px" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_description">Product Description</label>
                                      <br>
                                <textarea name="product_description" id="product_description" cols="168" rows="5">{{$product->product_description}}</textarea>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </section>
    </div>
</div>
</div>
@endsection
