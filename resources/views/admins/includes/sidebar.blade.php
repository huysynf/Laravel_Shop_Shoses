<ul class="navbar-nav bg-gradient-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Faculty -->
    <a class="sidebar-faculty d-flex align-items-center justify-content-sm-around" href="{{route('dashboard.index')}}">
        <div class="sidebar-faculty-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-faculty-text mx-3">ShoeShop <sup>MANAGE</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard.index')}}">
            <i class="fas fa-fw fa-tachometer-alt text-primary"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        <i class="text-white fa fa-cogs"></i>
        <span>Quản lí</span>
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    @can('view category')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('categories.index')}}" title="Quản lí danh mục">
                <i class="fas fa-fw fa-list text-danger"></i>
                <span>Danh mục</span>
            </a>
        </li>
        </li>
    @endcan
    @can('view user')
        <li class="nav-item">
            <a class="nav-link " href="{{route('users.index')}}" title="Quản lí người dùng">
                <i class="fas fa-fw fa-shopping-bag text-danger"></i>
                <span>Người dùng</span>
            </a>
        </li>
    @endcan
    @can('view role')
        <li class="nav-item">
            <a class="nav-link " href="{{route('roles.index')}}" title="Quản lí người dùng">
                <i class="fas fa-fw fa-paperclip text-danger"></i>
                <span>Quyền</span>
            </a>
        </li>
    @endcan
    @can('view product')
        <li class="nav-item">
            <a class="nav-link " href="{{route('products.index')}}" title="Quản lí sản phẩm">
                <i class="fas fa-fw fa-shopping-bag text-danger"></i>
                <span>Sản phẩm</span>
            </a>
        </li>
    @endcan
    @can('view brand')
        <li class="nav-item">
            <a class="nav-link " href="{{route('brands.index')}}" title="Quản lí thương hiệu">
                <i class="fas fa-fw fa-trademark text-danger"></i>
                <span>Thương hiệu</span>
            </a>
        </li>
    @endcan
    @can('view coupon')
        <li class="nav-item">
            <a class="nav-link " href="{{route('coupons.index')}}" title="Quản lí mã giảm giá">
                <i class="fas fa-fw fa-sticky-note text-danger"></i>
                <span>Mã giảm giá</span>
            </a>
        </li>
    @endcan
    @can('view order')
        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.orders.index')}}" title="Quản lí đơn hàng">
                <i class="fas fa-fw fa-shopping-bag text-danger"></i>
                <span>Đơn hàng</span>
            </a>
        </li>
@endcan

<!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        <i class="text-danger fa fa-cog"></i>
        <span>Cài đặt</span>
    </div>

    <li class="nav-item">
        <a class="nav-link " href="{{route('slides.index')}}" title="Quản lý slider">
            <i class="fas fa-fw fa-image text-danger"></i>
            <span>Slider</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
