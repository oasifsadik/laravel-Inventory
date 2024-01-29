@extends('admin.master')

@section('title')
Edit-Employee
@endsection



@section('content')
<div class="container-fluid">
    <h2><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i></a>|<a href="{{ url('/dashboard/allemployees') }}">All Employees</a></h2>
<div class="row mt-3">
    <div class="col-lg-6 offset-3">
        <section class="card">
            <header class="card-header">
                Add Employees
            </header>
            <div class="card-body">
                <form method="POST" action="{{ url('/add-employee')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="" >Select branch</label>
                                <select class="custom-select mb-3" name="branch_id" id="branch_id">
                                    <option selected disabled>Select branch</option>
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>
                                            {{ $branch->branch_name  }}
                                        </option>
                                    @endforeach
                                </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Employee Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Employee Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="example@gmail.com" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Employee Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="Enter Employee Address" required>
                    </div>
                    <div class="form-group">
                        <label for="sallery">Employee Sallery</label>
                        <input type="text" class="form-control" id="sallery" name="sallery" value="{{ old('sallery') }}" placeholder="Enter Employee Sallery" required>
                    </div>
                    <div class="form-group">
                        <label for="joining_date">Employee Joining Date</label>
                        <input type="date" class="form-control" id="joining_date" value="{{ old('joining_date') }}" name="joining_date" placeholder="Enter Employee Joining Date" required>
                    </div>
                    <div class="form-group">
                        <label for="nid">Employee NID</label>
                        <input type="text" class="form-control" id="nid" name="nid" min="8" max="10" value="{{ old('nid') }}" placeholder="12345678">
                        @error('nid')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Employee Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter Employee Phone 01700000000">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="photo">Employee Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </section>
    </div>
</div>
</div>
@endsection
