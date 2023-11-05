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

</section>
@endsection






