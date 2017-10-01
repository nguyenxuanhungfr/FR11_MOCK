<nav class='col-md-3 col-lg-2 collapse' id='nav-home'>
    <div style='text-align: center'>
        <img src='{{asset('public/uploads/images/'. Auth::user()->avatar )}}' class="img-circle" style="max-width: 80px"><br>
        <span>{{Auth::User()->username}}</span>
    </div>
    <hr color="darkgray">
    <ul class="nav nav-pills nav-stacked" role="tablist" style='border: none'>
        <li id='home' class='active'>
            <a href="{!! url('admin') !!}"> <span class="glyphicon glyphicon-home"></span> Trang Chủ</a>
        </li>

        <li id='user' class="dropdown">
            <a href="{!! url('admin/user') !!}">
                <span class="glyphicon glyphicon-user"></span> Quản Lý Người Dùng <span class="caret"></span>
            </a>
            <ul class="dropdown-menu menu">

            </ul>
        </li>

        <li id='customer' class="dropdown">
            <a href="{!! url('admin/customer') !!}">
                <span class="glyphicon glyphicon-user"></span> Quản Lý Khách Hàng
            </a>
        </li>

        <li id='product' class="dropdown">
            <a href="{!! url('admin/product') !!}">
                <span class="glyphicon glyphicon-gift"></span> Quản lý Sản Phẩm <span class="caret"></span>
            </a>
            <ul class="dropdown-menu menu">
                <li><a href="">Quản lý đơn hàng</a></li>
                <li><a href="">Quản lý giao dịch</a></li>
            </ul>
        </li>

        <li id='category' class="dropdown">
            <a href="{!! url('admin/category') !!}">
                <span class="glyphicon glyphicon-list"></span> Quản lý Chuyên Mục
            </a>
        </li>

        <li id='brand' class="dropdown">
            <a href="{!! url('admin/brand') !!}">
                <span class="glyphicon glyphicon-list-alt"></span> Quản lý Thương Hiệu
            </a>
        </li>

        <li id='comment' class="dropdown">
            <a href="{!! url('admin/comment') !!}">
                <span class="glyphicon glyphicon-home"></span> Quản lý bình luận</span>
            </a>
        </li>

        <li id='setting' class="dropdown">
            <a href="{!! url('admin/setting') !!}">
                <span class="glyphicon glyphicon-wrench"></span> Cài Đặt</span>
            </a>
        </li>
    </ul>
    <hr>
    <div style='text-align: center'>
        <a>Vào Website</a>
    </div>
</nav>