@extends('admin.master')

@section('title')
Add-Branch
@endsection



@section('content')

<div class="container-fluid">
    <h2><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i></a>|<a href="{{ url('/all-branch') }}">Branch</a></h2>
    <div class="row">
        <div class="col-lg-6 offset-3">
            <section class="card">
                <header class="card-header">
                    Add Branch
                </header>
                <div class="card-body">
                    <form method="POST" action="{{ url('/branch-save')}}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Branch Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Branch Name">
                            @error('name')
                                 <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Branch Address</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}" placeholder="Enter Your Address">
                            @error('address')
                                 <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success w-100">Add Branch</button>
                    </form>

                </div>
            </section>
        </div>
    </div>
</div>
@endsection
