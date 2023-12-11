@extends('fontend.master')

@section('u-title')
    User-Profile
@endsection

@section('fontend')

<section class="wrapper">
    <h1>Profile Update</h1>
    <div class="col-lg-6 offset-3">
        <section class="card">
            <div class="card-body">
                <form method="POST" action="{{ url('/profile_update',$update->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Employee Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $update->name }}" placeholder="Enter Employee Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" value="{{ $update->email }}" name="email" value="{{ old('email') }}" autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Employee Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $update->address }}" placeholder="Enter Employee Address">
                    </div>
                    <div class="form-group">
                        <label for="phone">Employee Phone Number</label>
                        <input type="text" class="form-control" id="phone" value="{{ $update->phone }}" name="phone" placeholder="Enter Employee Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="photo">Employee Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </form>

            </div>
        </section>
    </div>
</section>
@endsection






