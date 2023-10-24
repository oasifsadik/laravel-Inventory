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
        <!--state overview start-->
        <div class="row state-overview">
            <div class="col-lg-3 col-sm-6">
                <section class="card">
                    <div class="symbol terques">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="value">
                        <h1 class="count">
                            0
                        </h1>
                        <p>New Users</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="card">
                    <div class="symbol red">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count2">
                            0
                        </h1>
                        <p>Sales</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="card">
                    <div class="symbol yellow">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count3">
                            0
                        </h1>
                        <p>New Order</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="card">
                    <div class="symbol blue">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count4">
                            0
                        </h1>
                        <p>Total Profit</p>
                    </div>
                </section>
            </div>
        </div>
        <!--state overview end-->

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
