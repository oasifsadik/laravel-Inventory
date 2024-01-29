@extends('admin.master')

@section('title')
Request Wishlist
@endsection

@section('content')
<div class="container-fluid">
    <h2 class="mb-3"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i></a>|WishList</h2>

<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                All Wishlist
            </header>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Branch Name</th>
                                <th>Employee Name</th>
                                <th>Wishlist product</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $sl = 1;
                            @endphp
                            @foreach ($wishlist as $item)
                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td>{{ $item->user->branch->branch_name }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->wname }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#wishlistModal_{{ $item->id }}">
                                        View
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal for each wishlist item -->
                            <div class="modal fade" id="wishlistModal_{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="wishlistModalLabel_{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="wishlistModalLabel_{{ $item->id }}">Wishlist Product Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ url('wishlist-store',$item->id)}}" enctype="multipart/form-data">
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
                                                            <input type="text" class="form-control" id="name" name="name" value="{{ $item->wname }}" placeholder="Enter Product Name" value="{{ old('name') }}">
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
                                                            <input type="number" class="form-control" id="qty" value="{{ $item->quantity }}" name="qty" placeholder="Enter Your Quantity">
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
                                                    <div class="col-md-12">
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
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
</div>
@endsection
