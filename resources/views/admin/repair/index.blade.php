@extends('admin.master')
@section('title')
    All-Repair-Product
@endsection
@section('content')
    <h3><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i></a>|Repair List</h3>
<div class="container bg-white rounded">
    <div class="btn-group col-md-12" role="group" aria-label="Basic outlined example">
        <a href="{{ route('repair.filterByStatus', 'pending') }}" class="btn btn-outline-primary">Pending</a>
        <a href="{{ route('repair.filterByStatus', 'working') }}" class="btn btn-outline-success">Working</a>
        <a href="{{ route('repair.filterByStatus', 'completed') }}" class="btn btn-outline-warning">Completed</a>
    </div>
    <table class="table" id="repairTable">
        <thead>
            <tr>
                <td>#sl</td>
                <td>Branch</td>
                <td>Employees Name</td>
                <td>product name</td>
                <td>Description</td>
                <td>Status</td>
            </tr>
        </thead>
        <tbody>
            @foreach($repairs as $key => $repair)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $repair->user->branch->branch_name }}</td>
                    <td>{{ $repair->user->name }}</td>
                    <td>{{ $repair->product->product_name }}</td>
                    <td>{{ $repair->description }}</td>
                    <td>
                        <form method="POST" action="{{ route('repair.updateStatus', $repair->id) }}">
                            @csrf
                            <select class="form-control" name="status" onchange="this.form.submit()">
                                <option value="pending" {{ $repair->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="working" {{ $repair->status === 'working' ? 'selected' : '' }}>Working</option>
                                <option value="completed" {{ $repair->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
</section>

@section('script')
<script>
    function showStatus(status) {
        let rows = document.querySelectorAll('#repairTable tbody tr');
        rows.forEach(row => {
            let rowStatus = row.querySelector('.status').textContent.trim();
            if (rowStatus !== status) {
                row.style.display = 'none';
            } else {
                row.style.display = '';
            }
        });
    }
</script>
@endsection

@endsection
