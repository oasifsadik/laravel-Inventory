@extends('fontend.master')

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
                            <th>#sl</th>
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
                            <td>{{ $product->product_name }}</td>
                            <td>
                                @foreach ($product->stock as $stock)
                                    {{ $stock->qty }}
                                @endforeach
                            </td>
                            <td>
                                <img src="{{ asset('product/'. $product->product_img) }}" height="80px" width="70px" alt="">
                            </td>
                            <td>
                                <a href="{{ url('product-delete', $product->id) }}" class="btn btn-danger"><i class="fa  fa-external-link-square"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                            <th class="text-center text-danger" colspan="5"> Products Not Available</th>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
