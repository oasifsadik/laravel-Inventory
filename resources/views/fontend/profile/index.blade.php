@extends('fontend.master')

@section('u-title')
    User-Profile
@endsection

@section('fontend')

<section class="wrapper">
    <div class="row">
        <aside class="profile-nav col-lg-3">
            <section class="card">
                <div class="user-heading round">
                    <a href="#">
                        <img src="{{ asset('employee/' . $user->photo) }}" alt="User Photo">

                    </a>
                    <h1>{{ $user->name }}</h1>
                    <p>{{ $user->email }}</p>
                </div>

                <ul class="nav nav-pills nav-stacked">
                    <li class="active nav-item"><a class="nav-link" href="profile.html"> <i class="fa fa-user"></i> Profile</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="profile-activity.html"> <i class="fa fa-calendar"></i> Recent Activity <span class="badge badge-danger pull-right r-activity">9</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile-edit.html"> <i class="fa fa-edit"></i> Edit profile</a></li> --}}
                </ul>

            </section>
        </aside>
        <aside class="profile-info col-lg-9">

            <section class="card">

                <div class="card-body bio-graph-info">
                    <h1>Bio Graph</h1>
                    <div class="row">
                        <div class="bio-row">
                            <p><span>full Name </span>: {{ Auth::user()->name }}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>joining Date </span>: {{ Auth::user()->joining_date }}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Address </span>: {{ Auth::user()->address }}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Sallery</span>: {{ Auth::user()->sallery }}</p>
                        </div>
                        <div class="bio-row">
                            @if (Auth::user() == '1')
                            <p><span>Occupation </span>: Admin</p>
                            @else
                            <p><span>Occupation </span>: Employee</p>
                            @endif

                        </div>
                        <div class="bio-row">
                            <p><span>Email </span>: {{ Auth::user()->sallery }}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Mobile </span>: {{ $user->phone }}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>NID </span>: {{ $user->nid }}</p>
                        </div>
                    </div>
                </div>
            </section>
            <section>

            </section>
        </aside>
    </div>
    <div class="password">
        <div class="col-md-6">
            <h3 class="text-center">Update password</h3>
            <form method="POST" action="{{ route('change.password.post') }}">
                @csrf

                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input class="form-control" id="current_password" type="password" name="current_password" required>
                    @error('current_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input class="form-control" id="password" type="password" name="password" required>
                    @error('password')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required>
                </div>

                <div>
                    <button type="submit" class="btn btn-secondary">Change Password</button>
                </div>
            </form>

        </div>
    </div>

</section>
@endsection






