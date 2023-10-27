@extends('admin.master')

@section('title')
Add-Category
@endsection



@section('content')
<div class="row">
    <div class="col-lg-6 offset-3">
        <section class="card">
            <header class="card-header">
                Add Category
            </header>
            <div class="card-body">
                <form method="POST" action="{{ url('/add-category')}}">
                    @csrf

                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category Name" required>
                    </div>
                    <div class="form-group">
                        <label for="category_name">Category Description</label>
                        <br>
                        <textarea name="category_description" id="category_description" cols="75" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Add Category</button>
                </form>

            </div>
        </section>
    </div>
</div>
@endsection
