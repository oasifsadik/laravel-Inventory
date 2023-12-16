<!-- Your Blade Template -->
@extends('fontend.master')
@section('u-title')
Wishlist
@endsection
@section('fontend')
<section class="wrapper">
    <div class="col-md-6 offset-3">
        <div class="form border rounded bg-white p-3">
            <h3 class="mb-4">
                <a href="{{ url('/wishlist') }}" class="btn btn-success btn-sm float-right">Back</a>
            </h3>
            <form action="{{ url('store-wishlist') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" name="wname" placeholder="Enter Product Name">
                </div>
                <div class="form-group">
                    <button class="btn btn-info w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
