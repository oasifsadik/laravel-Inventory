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
                                <th>Action</th>
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
                                    <span class="badge badge-info">{{ $request->status }}</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger btn-sm w-50 m-1" data-toggle="modal" data-target="#rejectModal{{$request->id}}">
                                        Return
                                    </button>
                                    <!-- Rejection Modal -->
                                    <div class="modal fade" id="rejectModal{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel{{$request->id}}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{ url('/user/product-return', $request->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="rejectModalLabel{{$request->id}}">Return Product</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label for="rejection_reason{{$request->id}}">Reason for Return:</label>
                                                        <textarea class="form-control" id="rejection_reason{{$request->id}}" name="rejection_reason" rows="3" required></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Confirm Return</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Rejection Modal -->
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <th class="text-center text-danger" colspan="5"> No Requests Found</th>
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
