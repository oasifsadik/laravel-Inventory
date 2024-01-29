@extends('admin.master')

@section('title')
All-Product
@endsection



@section('content')
<div class="container-fluid">
    <h2 class="mb-3"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i></a>|<a href="{{ url('return-product') }}"><i class=" fa fa-retweet"></i></a>|Report</h2>

<!-- Your form for entering date range -->
<div class="col-md-8">
    <form action="{{ url('generate-report') }}" method="GET">
        @csrf
        <div class="form-group d-flex">
            <label class="m-2" for="">from</label>
            <input class="form-control mb-2" type="date" name="start_date">
            <label class="m-2" for="">To</label>
            <input class="form-control" type="date" name="end_date">
            <button class="btn btn-outline-success btn-sm m-2" type="submit">Search</button>
        </div>
    </form>
</div>

<!-- Display the search results -->
@if($report->isNotEmpty())
    <table class="table shadow rounded bg-white mt-3">
        <h1><button onclick="window.print()" class="btn btn-primary">Print</button></h1>
        <thead>
            <tr>
                <th>product ID</th>
                <th>name</th>
                <th>Branch Name</th>
                <th>Product Name</th>
                <th>Date</th>
                <th>Quantity</th>
                <!-- Add other columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($report as $item)
                <tr>
                    <td>{{ $item->product->pro_id }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->user->branch->branch_name }}</td>
                    <td>{{ $item->product->product_name }}</td>
                    <td>{{ $item->created_at->format('d-M-y') }}</td>
                    <td>{{ $item->quantity }}</td>
                    <!-- Display other columns accordingly -->
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No records found for the selected date range.</p>
@endif
</div>

@endsection
