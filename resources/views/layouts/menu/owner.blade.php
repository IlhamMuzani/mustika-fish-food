<li class="nav-item">
    <a href="{{ url('owner') }}" class="nav-link {{ request()->is('owner') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>
<li class="nav-header">Menu</li>
<li class="nav-item">
    <a href="{{ url('owner/laporan-masuk') }}" class="nav-link {{ request()->is('owner/laporan-masuk*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-truck"></i>
        <p>
            Laporan Masuk
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('owner/laporan-transaksi') }}" class="nav-link {{ request()->is('owner/laporan-transaksi*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-clipboard-list"></i>
        <p>
            Laporan Transaksi
        </p>
    </a>
</li>
