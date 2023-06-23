<li class="nav-item">
    <a href="{{ url('kasir') }}" class="nav-link {{ request()->is('kasir') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>
<li class="nav-header">Menu</li>
<li class="nav-item">
    <a href="{{ url('kasir/produk') }}" class="nav-link {{ request()->is('kasir/produk*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-fish"></i>
        <p>
            Data Produk
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('kasir/transaksi') }}" class="nav-link {{ request()->is('kasir/transaksi*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-clipboard-list"></i>
        <p>
            Data Transaksi
        </p>
    </a>
</li>
