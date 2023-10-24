@extends('admin.master')

@section('title')
All-Category
@endsection



@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                All Category
            </header>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @php
                            $i = 1;
                        @endphp
                        <tbody>
                        @foreach ($category as $cat)
                        <tr>
                            <th> {{ $i++  }}</th>
                            <td>{{ $cat->category_name }}</td>
                            <td>{{ $cat->category_description }}</td>
                            <td>
                                <a href="{{ url('/category-edit', $cat->id) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="{{ url('/category-delete', $cat->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
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
@endsection
