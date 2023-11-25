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
                                <th>Sent Request</th>
                            </tr>
                            </thead>
                            @php
                                $i = 1;
                            @endphp
                            <tbody>
                            @if (count($Products)>0)
                            @foreach ($Products as $product)
                            <tr>
                                <th> {{ $i++  }}</th>
                                <td>{{ $product->Category->category_name }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>
                                    {{-- @foreach ($product->stock as $stock)
                                        {{ $stock->qty }}
                                    @endforeach --}}
                                    @if ($product->stock->sum('qty') > 0)
                                                <p class="badge bg-success">In Stock</p>
                                            @else
                                                <p class="badge bg-danger">Out of Stock</p>
                                            @endif
                                </td>
                                <td>
                                    <img src="{{ asset('product/'. $product->product_img) }}" height="80px" width="70px" alt="">
                                </td>
                                <td>
                                    @if ($product->stock->sum('qty') > 0)
                                        <a href="{{ url('product/request/'.$product->id) }}" class="btn btn-primary">
                                            <i class="fa fa-location-arrow"></i>
                                        </a>
                                    @else
                                        <button class="btn btn-primary" disabled>
                                            <i class="fa fa-location-arrow"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            <td colspan="6">
                                @if ($Products->count() > 0)
                                    {{ $Products->links() }}
                                @endif
                            </td>
                            @else
                                <th class="text-center text-danger" colspan="6"> Products Not Available</th>
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
