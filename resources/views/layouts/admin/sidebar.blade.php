<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{asset('')}}dash/assets/img/admin-avatar.png" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">{{--{{ Auth::user()->name }}--}}admin</div><small>Administrator</small></div>
        </div>
        <ul class="side-menu metismenu">
            <li class="{{Request::is('manager/dashboard') ? 'active': ''}}">
                <a class="active" href="{{url('/manager/dashboard')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">Tính năng</li>
            <li class="{{Request::is('manager/blogs') ? 'active': ''}}">
                <a href="{{url('/manager/blogs')}}"><i class="sidebar-item-icon fa fa-edit"></i>
                    <span class="nav-label">Blogs - Bản tin</span>
                </a>
            </li>
            <li class="{{Request::is('manager/sliders') ? 'active': ''}}">
                <a href="{{url('/manager/sliders')}}"><i class="sidebar-item-icon fa fa-picture-o"></i>
                    <span class="nav-label">Slider và Album ảnh</span>
                </a>
            </li>
            <li class="{{Request::is('manager/rooms') ? 'active': ''}}">
                <a href="{{url('/manager/rooms')}}"><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">rooms - Phòng</span>
                </a>
            </li>
            <li class="{{Request::is('manager/contact-us') ? 'active': ''}}">
                <a href="{{url('manager/contact-us')}}"><i class="sidebar-item-icon fa fa-envelope-o"></i>
                    <span class="nav-label">Liên hệ</span>
                </a>
            </li>
            <li class="heading">Quản lý phòng khám</li>
            <li class="{{Request::is('manager/laps') ? 'active': ''}}">
                <a href="{{ route('laps.index') }}"><i class="sidebar-item-icon fa fa-info"></i>
                    <span class="nav-label">Thông tin</span>
                </a>
            </li>
            <li class="{{Request::is('manager/products') ? 'active': ''}}">
                <a href="{{ route('products.index') }}"><i class="sidebar-item-icon fa fa-cube"></i>
                    <span class="nav-label">Sản phẩm</span>
                </a>
            </li>
            <li class="{{Request::is('manager/customers') ? 'active': ''}}">
                <a href="{{ route('customers.index') }}"><i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Khách hàng</span>
                </a>
            </li>
            <li class="heading">Tiện ích</li>
            <li class="{{Request::is('manager/calendar') ? 'active': ''}}">
                <a href="{{url('/manager/calendar')}}"><i class="sidebar-item-icon fa fa-calendar"></i>
                    <span class="nav-label">Lịch</span>
                </a>
            </li>
            <li class="{{Request::is('manager/config') ? 'active': ''}}">
                <a href="{{url('/manager/config')}}"><i class="sidebar-item-icon fa fa-cogs"></i>
                    <span class="nav-label">Cấu hình</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
