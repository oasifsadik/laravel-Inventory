<div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
        <li>
            <a class="active" href="{{ url('/dashboard') }}">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-users"></i>
                <span>Employee</span>
            </a>
            <ul class="sub">
                <li><a  href="{{ url('dashboard/employee') }}">Add Employee</a></li>
                <li><a  href="{{ url('dashboard/allemployees') }}">All Employees</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-th"></i>
                <span>Category</span>
            </a>
            <ul class="sub">
                <li><a  href="{{ url('/category') }}">Add Category</a></li>
                <li><a  href="{{ url('/allCategory') }}">All Category</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-shopping-cart"></i>
                <span>Category</span>
            </a>
            <ul class="sub">
                <li><a  href="{{ url('/category') }}">Add Product</a></li>
                <li><a  href="{{ url('/allCategory') }}">All Product</a></li>
            </ul>
        </li>



    </ul>
    <!-- sidebar menu end-->
</div>
