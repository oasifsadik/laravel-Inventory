@extends('fontend.master')
@section('u-title')
    Request-for-product
@endsection
@section('fontend')
<section class="wrapper">
    <div class="container-fluid">
        <h3>
            <a href="{{ url('user_dashboard') }}"><i class="fa fa-dashboard"></i></a>|
            <a href="{{ url('/user/requests-reject') }}">Reject Product</a>|
            <a href="{{ url('/user/delever-product') }}">Delever Product</a>|
            <a href="{{ url('/all-pro') }}">All Product</a>
        </h3>

    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    Request Products list
                </header>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#sl</th>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>Note</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            @php
                                $i = 1;
                            @endphp
                            <tbody>
                            @if (count($requests) > 0)
                            @foreach ($requests as $request)
                            <tr>
                                <th> {{ $i++  }}</th>
                                <td>{{ $request->product->product_name }}</td>
                                <td>{{ $request->product->Category->category_name }}</td>
                                <td>{{ $request->rejection_reason }}</td>
                                <td>{{ $request->status }}</td>
                            </tr>
                            @endforeach
                            @else
                                <th class="text-center text-danger" colspan="6"> No Requests Found</th>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
</section>
@endsection
