@extends('admin.master')

@section('title')
Edit-Branch
@endsection



@section('content')
<div class="container-fluid">
    <h2><a href="{{ url('/all-branch') }}"><i class="fa fa-backward"></i></a>|Edit Branch</h2>

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
                        <label for="category_name">Branch Name</label>
                        <input type="text" class="form-control" id="category_name" name="name" value="{{ $branch->branch_name }}" placeholder="Enter Category Name" required>
                    </div>
                    <div class="form-group">
                        <label for="category_name">Branch Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{ $branch->branch_address }}" placeholder="Enter Your Address">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Branch</button>
                </form>

            </div>
        </section>
    </div>
</div>
</div>
@endsection
