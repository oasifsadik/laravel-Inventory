@extends('fontend.master')

@section('u_title')
    User-DashBoard
@endsection

@section('content')
    <!--header start-->
    @include('fontend.inc.navbar')
<!--header end-->
<!--sidebar start-->
<aside>
    @include('fontend.inc.sidebar')
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
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
                                <p><span>Country </span>: Australia</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Birthday</span>: 13 July 1983</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Occupation </span>: UI Designer</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Email </span>: jsmith@flatlab.com</p>
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
</section>
<!--main content end-->

<!-- Right Slidebar start -->
@include('fontend.inc.rightbar')
<!-- Right Slidebar end -->

<!--footer start-->
<footer class="site-footer">
    @include('fontend.inc.footer')
</footer>
<!--footer end-->
@endsection
