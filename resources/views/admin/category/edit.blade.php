@extends('admin.master')

@section('title')
Add-Category
@endsection



@section('content')
<div class="container-fluid">
    <h2><a href="{{ url('allCategory') }}"><i class="fa fa-backward"></i></a>|Edit Category</h2>

<div class="row">
    <div class="col-lg-6 offset-3">
        <section class="card">
            <header class="card-header">
                Edit Category
            </header>
            <div class="card-body">
                <form method="POST" action="{{ url('/category-update',$category->id)}}">
                    @csrf

                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category->category_name }}" placeholder="Enter Category Name" required>
                    </div>
                    <div class="form-group">
                        <label for="category_name">Category Description</label>
                        <br>
                        <textarea name="category_description" id="category_description" cols="75" rows="5">{{ $category->category_description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Category</button>
                </form>

            </div>
        </section>
    </div>
</div>
</div>
@endsection
