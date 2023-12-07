@extends('fontend.master')
@section('u-title')
    Request-for-product
@endsection
@section('fontend')
<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    Your Requested Products
                </header>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#sl</th>
                                <th>Product Name</th>
                                <th>Category Name</th>
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
                                <td>
                                    <span class="badge badge-danger">{{ $request->status }}</span>
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <th class="text-center text-danger" colspan="4"> No Requests Found</th>
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
