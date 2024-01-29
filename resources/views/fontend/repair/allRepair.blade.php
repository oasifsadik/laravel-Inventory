@extends('fontend.master')
@section('u-title')
    All-Repair-Product
@endsection
@section('fontend')
<section class="wrapper">
    <h3>
        <a href="{{ url('user_dashboard') }}"><i class="fa fa-home"></i></a>|
        <a href="{{ url('/repair') }}"><i class="fa fa-plus"></i></a> |
        Repair Product list

    </h3>
<div class="container bg-white rounded">
    <table class="table">
        <thead>
            <tr>
                <td>#sl</td>
                <td>product name</td>
                <td>Description</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($repairs as $key => $repair)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $repair->product->product_name }}</td>
                    <td>{{ $repair->description }}</td>
                    <td>{{ $repair->status }}</td>
                    <td>
                        <a href="{{ route('repair.delete',$repair->id) }}" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
</section>

@endsection
