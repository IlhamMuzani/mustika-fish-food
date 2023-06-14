<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index3.html" class="brand-link">
        <img src="{{ asset('adminLTE/dist/img/ikan.jpg') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3 mt-0" style="opacity: .8">
        <span class="brand-text font-italic">Mustika Fish Food</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminLTE/dist/img/avatar3.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block font-weight-normal"></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-header">Dashboard</li>
                <li class="nav-item">
                    <a href="{{ url('admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Master</li>
                <li class="nav-item">
                    <a href="{{ url('admin/suplayer') }}"
                        class="nav-link {{ request()->is('admin/suplayer*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-grip-horizontal"></i>
                        <p>
                            Data Suplayer
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/product') }}"
                        class="nav-link {{ request()->is('admin/product*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-grip-horizontal"></i>
                        <p>
                            Data Produk
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-header">Logout</li> --}}
                <li class="nav-item">
                    <a href="#" data-toggle="modal" data-target="#modalLogout"
                        class="nav-link {{ request()->is('profile') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
