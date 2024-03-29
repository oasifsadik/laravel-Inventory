<!-- Your Blade Template -->
@extends('fontend.master')
@section('u-title')
Wishlist
@endsection
@section('fontend')
<section class="wrapper">
    <div class="container-fluid">
        <h3>
            <a href="{{ url('user_dashboard') }}"><i class="fa fa-dashboard"></i></a> | WishList
        </h3>

    <table class="table">
        <thead>
            <a href="{{ url('/add-wishlist') }}" class="btn btn-sm btn-outline-success float-right m-3">add wishlist</a>
        </thead>
        <thead >
            <tr>
                <td>sl</td>
                <td>brach name</td>
                <td>employee name</td>
                <td>product name</td>
                <td>product Quantity</td>
                <td>product Status</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @php
                $i =1;
            @endphp
            @foreach ($wishlist as $item)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->user->branch->branch_name }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->wname }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ url('delete-wishlist',$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</section>
@endsection
