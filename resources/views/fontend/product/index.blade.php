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
                    All Product
                </header>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#sl</th>
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

                                            <input type="number" name="quantity" min="1" max="{{ $product->stock->sum('qty') }}">
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

                                <td colspan="7">
                                    @if ($Products->count() > 0)
                                    {{ $Products->links() }}
                                    @endif
                                </td>
                                @else
                                <tr>
                                    <td class="text-center text-danger" colspan="7"> Products Not Available</td>
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
