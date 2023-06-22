<li class="nav-item">
  <a href="{{ url('admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
    <i class="nav-icon fas fa-home"></i>
    <p>
      Dashboard
    </p>
  </a>
</li>
<li class="nav-header">Menu</li>
<li class="nav-item">
  <a href="{{ url('admin/supplier') }}" class="nav-link {{ request()->is('admin/supplier*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-truck"></i>
    <p>
      Data Supplier
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="{{ url('admin/produk') }}" class="nav-link {{ request()->is('admin/produk*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-fish"></i>
    <p>
      Data Produk
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="{{ url('admin/transaksi') }}" class="nav-link {{ request()->is('admin/transaksi*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-clipboard-list"></i>
    <p>
      Data Transaksi
    </p>
  </a>
</li>
<li class="nav-header">Master</li>
<li class="nav-item">
  <a href="{{ url('admin/jenis') }}" class="nav-link {{ request()->is('admin/jenis*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-clone"></i>
    <p>
      Data Jenis
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="{{ url('admin/kategori') }}" class="nav-link {{ request()->is('admin/kategori*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-grip-horizontal"></i>
    <p>
      Data Kategori
    </p>
  </a>
</li>