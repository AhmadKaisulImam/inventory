<ul class="nav">
    <li class="nav-item {{ Request::is('gudang') ? 'active' : '' }} ">
        <a href="/gudang">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Menu</h4>
    </li>
    <li class="nav-item {{ Request::is('barang_masuk') ? 'active' : '' }} {{ Request::is('barang_masuk/create') ? 'active' : '' }}">
        <a href="/barang_masuk">
            <i class="fas fa-file"></i>
            <p>Barang Masuk</p>
        </a>
    </li>
    <li class="nav-item {{ Request::is('barang_keluar') ? 'active' : '' }} {{ Request::is('barang_keluar') ? 'active' : '' }}">
        <a href="/barang_keluar">
            <i class="fas fa-file"></i>
            <p>Barang Keluar</p>
        </a>
    </li>
</ul>