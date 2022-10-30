<ul class="nav">
    <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
        <a href="/home">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Components</h4>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#base">
            <i class="fas fa-layer-group"></i>
            <p>Data Master</p>
            <span class="caret"></span>
        </a>
        <div class="collapse" id="base">
            <ul class="nav nav-collapse">
                <li class="{{ Request::is('user') ? 'active' : '' }}">
                    <a href="/user">
                        <span class="sub-item">Data User</span>
                    </a>
                </li>
                <li class="{{ Request::is('kategori') ? 'active' : '' }}">
                    <a href="/kategori">
                        <span class="sub-item">Data Kategori</span>
                    </a>
                </li>
                <li class="{{ Request::is('barang') ? 'active' : '' }}">
                    <a href="/barang">
                        <span class="sub-item">Data Barang</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#laporan">
            <i class="fas fa-file"></i>
            <p>Data Laporan</p>
            <span class="caret"></span>
        </a>
        <div class="collapse" id="laporan">
            <ul class="nav nav-collapse">
                <li>
                    <a href="/laporan_user">
                        <span class="sub-item">Laporan Data user</span>
                    </a>
                </li>
                <li>
                    <a href="/laporan_barang">
                        <span class="sub-item">Laporan Data Barang</span>
                    </a>
                </li>
                <li>
                    <a href="/laporan_kategori">
                        <span class="sub-item">Laporan Data Kategori</span>
                    </a>
                </li>
                <li>
                    <a href="/laporan_masuk">
                        <span class="sub-item">Laporan Barang Masuk</span>
                    </a>
                </li>
                <li>
                    <a href="/laporan_keluar">
                        <span class="sub-item">Laporan Barang Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>