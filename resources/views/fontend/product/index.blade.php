<!-- Your Blade Template -->
@extends('fontend.master')
@section('u-title')
Employee-All-Product
@endsection
@section('fontend')
<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h1>All Product</h1>
                    <form action="{{ url('/all-pro') }}" method="GET">
                        <div class="col-md-6 form-group d-flex ">
                            <input class="form-control m-2" type="text" name="search" placeholder="Enter Product Name">
                            <button class="btn btn-secondary m-2">search</button>
                            <a href="{{ url('/all-pro') }}" class="btn btn-success m-2">refresh</a>
                        </div>

                    </form>
                </header>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#sl</th>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Product Name</th>
                                    <th>Product Quantity</th>
                                    <th>Photo</th>
                                    <th>Quantity to Request</th> <!-- Added this column -->
                                    <th>Sent Request</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($Products) > 0)
                                @foreach ($Products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->pro_id }}</td>
                                    <td>{{ $product->Category->category_name }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>
                                        @if ($product->stock->sum('qty') > 0)
                                        <p class="badge bg-success">In Stock</p>
                                        @else
                                        <p class="badge bg-danger">Out of Stock</p>
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset('product/'. $product->product_img) }}" height="80px" width="70px" alt="">
                                    </td>
                                    <form action="{{ url('product/request/'.$product->id) }}" method="POST">
                                        @csrf
                                        <td>

                                            <input type="number" name="quantity" min="1" max="2">
                                        </td>
                                        <td>
                                            @if ($product->stock->sum('qty') > 0)


                                            <button class="btn btn-primary">
                                                <i class="fa fa-location-arrow"></i> Request
                                            </button>

                                            @else
                                            <button class="btn btn-primary" disabled>
                                                <i class="fa fa-location-arrow"></i> Request
                                            </button>
                                            @endif
                                        </td>
                                    </form>
                                </tr>
                                @endforeach

                                <td colspan="8">
                                    @if ($Products->count() > 0)
                                    {{ $Products->links() }}
                                    @endif
                                </td>
                                @else
                                <tr>
                                    <td class="text-center text-danger" colspan="8"> Products Not Available</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
@endsection
