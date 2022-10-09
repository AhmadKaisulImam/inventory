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
    <li class="nav-item">
        <a data-toggle="collapse" href="#base">
            <i class="fas fa-layer-group"></i>
            <p>Transaksi</p>
            <span class="caret"></span>
        </a>
        <div class="collapse" id="base">
            <ul class="nav nav-collapse">
                <li>
                    <a href="/barang_masuk">
                        <span class="sub-item">Barang Masuk</span>
                    </a>
                </li>
                <li>
                    <a href="/barang_keluar">
                        <span class="sub-item">Barang Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>