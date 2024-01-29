@extends('admin.master')

@section('title')
Request Product
@endsection



@section('content')
<div class="container-fluid">
    <h2><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i></a>|<a href="{{ url('/request/product') }}"><i class="fa fa-envelope-o"></i></a>|<a href="{{ url('/compate/reject') }}"><i class="fa  fa-times-circle"></i></a></h2>

<div class="row mt-3">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Complate Order
            </header>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Branch Name</th>
                            <th>Employee Name</th>
                            <th>product Name</th>
                            <th>Phone Number</th>
                            <th>Quantity</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $sl = 1;
                            @endphp
                            @foreach ($order as $item)
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $item->user->branch->branch_name }}</td>
                                    <td>{{ $item->user->name}}</td>
                                    <td>{{ $item->product->product_name }}</td>
                                    <td>{{ $item->user->phone }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td><span class="badge badge-info">Complate</span></td>
                                </tr>
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
