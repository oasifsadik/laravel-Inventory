@extends('admin.master')

@section('title')
Request Product
@endsection

@section('content')
<div class="container-fluid">
    <h2><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i></a>|<a href="{{ url('/compate/order') }}"><i class="fa fa-check-circle"></i></a>|<a href="{{ url('/compate/reject') }}"><i class="fa  fa-times-circle"></i></a></h2>

<div class="row mt-3">
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
                                <th>Product Name</th>
                                <th>Phone Number</th>
                                <th>Quantity</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sl = 1;
                            @endphp
                            @foreach ($requestProduct as $item)
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $item->user->branch->branch_name }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->product->product_name }}</td>
                                    <td>{{ $item->user->phone }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td class="d-flex">
                                        <a href="{{ url('complate/order',$item->id) }}" class="btn btn-outline-secondary btn-sm w-50 m-1">Accept</a>
                                        <button type="button" class="btn btn-outline-danger btn-sm w-50 m-1" data-toggle="modal" data-target="#rejectModal{{$item->id}}">
                                            Reject
                                        </button>
                                        <!-- Rejection Modal -->
                                        <div class="modal fade" id="rejectModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel{{$item->id}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ url('complate/reject',$item->id) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="rejectModalLabel{{$item->id}}">Reject Order</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label for="rejection_reason{{$item->id}}">Reason for Rejection:</label>
                                                            <textarea class="form-control" id="rejection_reason{{$item->id}}" name="rejection_reason" rows="3" required></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Confirm Reject</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Rejection Modal -->
                                    </td>
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
