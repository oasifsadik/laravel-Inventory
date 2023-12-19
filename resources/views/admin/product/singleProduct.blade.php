@extends('admin.master')

@section('title')
All-Product
@endsection



@section('content')
<div class="product bg-white rounded p-3">
    <h3>Product Details</h3>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header">
                    <img src="{{ asset('product/'. $product->product_img) }}" height="300px" width="380px" alt="">
                    <h3 class="mt-3">{{ $product->product_name }}</h3>
                    </div>
                     <div class="card-body">
                    <p>{{ $product->product_description }}</p>
                    </div>
            </div>
        </div>

        <div class="col-md-8">
                <h3>Stock Details</h3>
                <a href="#" class="btn btn-success btn-sm float-right mb-1" data-toggle="modal" data-target="#addStockModal">Add stock</a>



                <table class="table rounded stripe bg-white shadow">
                    <thead>
                        <tr>
                            <th>Stock-In-Date</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product->stock as $stock)
                        <tr>
                            <td>{{ $stock->stock_date }}</td>
                            <td>{{ $stock->qty }}</td>
                            <td class="d-flex ">
                                <a href="{{ route('show.update.stock.form', ['product_id' => $product->id, 'stock_id' => $stock->id]) }}" class="btn btn-outline-primary btn-sm m-1" data-toggle="modal" data-target="#updateStockModal">
                                    Edit
                                </a>
                                <form action="{{ route('delete.stock', ['product_id' => $product->id, 'stock_id' => $stock->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm m-1">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


        </div>
    </div>
</div>
<!-- Add Stock Modal -->
<div class="modal fade" id="addStockModal" tabindex="-1" role="dialog" aria-labelledby="addStockModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStockModalLabel">Add Stock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addStockForm" action="{{ route('add.stock', ['product_id' => $product->id]) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="stock_date">Stock Date:</label>
                        <input type="date" class="form-control" id="stock_date" name="stock_date" required>
                    </div>
                    <div class="form-group">
                        <label for="qty">Quantity:</label>
                        <input type="number" class="form-control" id="qty" name="qty" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Stock</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Stock Modal -->
<div class="modal fade" id="updateStockModal" tabindex="-1" role="dialog" aria-labelledby="updateStockModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateStockModalLabel">Update Stock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateStockForm" action="{{ route('update.stock', ['product_id' => $product->id, 'stock_id' => $stock->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="stock_date">Stock Date:</label>
                        <input type="date" class="form-control" id="stock_date" name="stock_date" value="{{ $stock->stock_date }}" required>
                    </div>
                    <div class="form-group">
                        <label for="qty">Quantity:</label>
                        <input type="number" class="form-control" id="qty" name="qty" value="{{ $stock->qty }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Stock</button>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection
