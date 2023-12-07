<ul class="sidebar-menu" id="nav-accordion">

    <li>
        <a class="active" href="{{ url('/user_dashboard') }}">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-laptop"></i>
            <span>Product</span>
        </a>
        <ul class="sub">
            <li><a  href="{{ url('/all-pro') }}">ALL Product</a></li>
            <li><a  href="{{ url('/user/requests') }}">Request Product</a></li>
            <li><a  href="{{ url('/user/delever-product') }}">deliver Product</a></li>
            <li><a  href="{{ url('/user/requests-reject') }}">reject  Product</a></li>
        </ul>
    </li>


</ul>
