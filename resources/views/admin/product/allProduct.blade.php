@extends('admin.master')

@section('title')
All-Product
@endsection



@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                All Product
            </header>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Buying Date</th>
                            <th>Buying Price</th>
                            <th>Product Quantity</th>
                            <th>Status</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @php
                            $i = 1;
                        @endphp
                        <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <th> {{ $i++  }}</th>
                            <th> {{ $product->pro_id  }}</th>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->Category->category_name }}</td>
                            <td>{{ $product->product_description }}</td>
                            <td>{{ $product->buying_date }}</td>
                            <td>{{ $product->buying_price }}</td>
                            <td> {{ $product->total_qty }}</td>
                            <td>
                                @if ($product->status === 'Active')
                                    <span class="badge  bg-success text-white  p-1">Active</span>
                                    @else
                                    <span class="badge  bg-danger text-white  p-1">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <img src="{{ asset('product/'. $product->product_img) }}" height="80px" width="70px" alt="">
                            </td>
                            <td>
                                <a href="{{ url('single-product', $product->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                <a href="{{url('product-edit',$product->id)}}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="{{ url('product-delete', $product->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
