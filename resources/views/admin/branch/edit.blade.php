@extends('admin.master')

@section('title')
Add-Category
@endsection



@section('content')
<div class="row">
    <div class="col-lg-6 offset-3">
        <section class="card">
            <header class="card-header">
                Edit Branch
            </header>
            <div class="card-body">
                <form method="POST" action="{{ url('/branch-update',$branch->id)}}">
                    @csrf

                    <div class="form-group">
                        <label for="category_name">Employee Name</label>
                        <input type="text" class="form-control" id="category_name" name="name" value="{{ $branch->branch_name }}" placeholder="Enter Category Name" required>
                    </div>
                    <div class="form-group">
                        <label for="category_name">Employee Description</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{ $branch->branch_address }}" placeholder="Enter Your Address">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Branch</button>
                </form>

            </div>
        </section>
    </div>
</div>
@endsection
