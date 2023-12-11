@extends('admin.master')

@section('title')
Request Product
@endsection



@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                All Request Product
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
                            <th>note</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $sl = 1;
                            @endphp
                            @foreach ($orderReject as $item)
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $item->user->branch->branch_name }}</td>
                                    <td>{{ $item->user->name}}</td>
                                    <td>{{ $item->product->product_name }}</td>
                                    <td>{{ $item->user->phone }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->rejection_reason }}</td>
                                    <td><span class="badge badge-danger">reject</span></td>
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
