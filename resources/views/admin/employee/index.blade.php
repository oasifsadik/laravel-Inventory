@extends('admin.master')

@section('title')
Add-Employee
@endsection



@section('content')
<div class="row">
    <div class="col-lg-6 offset-3">
        <section class="card">
            <header class="card-header">
                Add Employees
            </header>
            <div class="card-body">
                <form method="POST" action="{{ url('/add-employee')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Employee Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Employee Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Employee Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Employee Address" required>
                    </div>
                    <div class="form-group">
                        <label for="sallery">Employee Sallery</label>
                        <input type="text" class="form-control" id="sallery" name="sallery" placeholder="Enter Employee Sallery" required>
                    </div>
                    <div class="form-group">
                        <label for="joining_date">Employee Joining Date</label>
                        <input type="date" class="form-control" id="joining_date" name="joining_date" placeholder="Enter Employee Joining Date" required>
                    </div>
                    <div class="form-group">
                        <label for="nid">Employee NID</label>
                        <input type="text" class="form-control" id="nid" name="nid" placeholder="Enter Employee NID" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Employee Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Employee Phone Number" required>
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
@endsection
