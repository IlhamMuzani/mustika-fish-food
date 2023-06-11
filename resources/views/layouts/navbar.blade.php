 <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('dashboard') }}" class="nav-link">Home</a>
                </li>
                {{-- @if (Auth::user()->level == 'admin') --}}
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('ikan') }}" class="nav-link">Ikan</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('pakan') }}" class="nav-link">Pakan</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('transaksi') }}" class="nav-link">Transaksi</a>
                </li>
                {{-- @else --}}
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('laporan') }}" class="nav-link">Laporan</a>
                </li>
                {{-- @endif --}}
            </ul>

            <!-- Right navbar links -->
            
            {{-- sebelah kanan jika ingin menambahkan  --}}

        </nav>
        <!-- /.navbar -->