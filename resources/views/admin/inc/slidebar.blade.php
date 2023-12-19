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
                <i class="fa fa-code-fork"></i>
                <span>Branch</span>
            </a>
            <ul class="sub">
                <li><a  href="{{ url('branch') }}">Add Branch</a></li>
                <li><a  href="{{ url('/all-branch') }}">All Branch</a></li>
            </ul>
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
                <span>Product</span>
            </a>
            <ul class="sub">
                <li><a  href="{{ url('dashboard/product') }}">Add Product</a></li>
                <li><a  href="{{ url('/All-product') }}">All Product</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-shopping-cart"></i>
                <span>Request</span>
            </a>
            <ul class="sub">
                <li><a  href="{{ url('/request/product') }}">Request Product</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-shopping-cart"></i>
                <span>Report</span>
            </a>
            <ul class="sub">
                <li><a  href="{{ url('generate-report') }}">Report generate</a></li>
                <li><a  href="{{ url('/compate/order') }}">completed orders</a></li>
                <li><a  href="{{ url('/compate/reject') }}">Reject orders</a></li>
                <li><a  href="{{ url('/return-product') }}">Return Product</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-shopping-cart"></i>
                <span>Wishlist</span>
            </a>
            <ul class="sub">
                <li><a  href="{{ url('wishlist-pro') }}">Wishlist</a></li>
            </ul>
        </li>



    </ul>
    <!-- sidebar menu end-->
</div>
