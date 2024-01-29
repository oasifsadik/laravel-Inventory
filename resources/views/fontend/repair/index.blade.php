@extends('fontend.master')
@section('u-title')
    Repair-Product
@endsection
@section('fontend')
<section class="wrapper">
    <h3>
        <a href="user_dashboard"><i class="fa fa-home"></i></a> |
        <a href="{{ url('repair-all') }}"><i class="fa fa-th-list"></i></a> |
        Repair Product
    </h3>
    <div class="container">
        <div class="col-md-8 offset-2 bg-white p-3 rounded shadow mt-5">
            <form action="{{ route('repair.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Repair Product</label>
                    <select class="custom-select mb-3" name="product_id" id="product_id">
                        <option selected disabled>Select Product</option>
                        @foreach ($deliver as $item)
                            <option value="{{ $item->product->id }}">
                                {{ $item->product->product_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Problem</label>
                    <textarea name="description" id="" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-secondary w-100">Repair</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
