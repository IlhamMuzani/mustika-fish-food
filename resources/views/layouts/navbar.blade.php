 <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="#" class="nav-link font-italic">Inventory - Toko Mustika Fish Food</a>
                        </li>
                        {{-- 
                @if (Auth::user()->level == 'admin')
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('admin/suplayer') }}" class="nav-link">Suplayer</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('admin/product') }}" class="nav-link">Produk</a>
                </li>
                @else
                @endif
                @if (Auth::user()->level == 'kasir')
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('kasir/transaksi') }}" class="nav-link">Transaksi</a>
                </li>
                @else
                @endif
                @if (Auth::user()->level == 'owner')
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('owner/laporan') }}" class="nav-link">Laporan</a>
                </li>
                @else
                @endif --}}
            </ul>

            <!-- Right navbar links -->

        </nav>
        <!-- /.navbar -->