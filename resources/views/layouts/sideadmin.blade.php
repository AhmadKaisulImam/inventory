    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Master Data</h4>
    </li>
    {{-- <li class="nav-item {{ Request::is('user') ? 'active' : '' }}">
        <a href="/user">
            <i class="fas fa-list-alt"></i>
            <p>user</p>
        </a>
    </li> --}}
    <li class="nav-item {{ Request::is('kategori') ? 'active' : '' }} {{ Request::is('kategori/create') ? 'active' : '' }}">
        <a href="/kategori">
            <i class="fas fa-list-alt"></i>
            <p>Kategori</p>
        </a>
    </li>
    <li class="nav-item {{ Request::is('supplier') ? 'active' : '' }} {{ Request::is('supplier/create') ? 'active' : '' }}">
        <a href="/supplier">
            <i class="fas fa-shipping-fast"></i>
            <p>Supplier</p>
        </a>
    </li>
    <li class="nav-item {{ Request::is('barang') ? 'active' : '' }} {{ Request::is('barang/create') ? 'active' : '' }}">
        <a href="/barang">
            <i class="fas fa-box-open"></i>
            <p>Stok Barang</p>
        </a>
    </li>
    <li class="nav-item {{ Request::is('barang_rusak') ? 'active' : '' }}">
        <a href="/barang_rusak">
            <i class="fas fa-window-close"></i>
            <p>Barang Rusak</p>
        </a>
    </li>
    {{-- <li class="nav-item">
        <a data-toggle="collapse" href="#laporan">
            <i class="fas fa-file-alt"></i>
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
    </li> --}}
    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Transaksi</h4>
    </li>
    <li class="nav-item {{ Request::is('barang_masuk') ? 'active' : '' }} {{ Request::is('barang_masuk/create') ? 'active' : '' }}">
        <a href="/barang_masuk">
            <i class="fas fa-share"></i>
            <p>Barang Masuk</p>
        </a>
    </li>
    <li class="nav-item {{ Request::is('barang_keluar') ? 'active' : '' }} {{ Request::is('barang_keluar/create') ? 'active' : '' }}">
        <a href="/barang_keluar">
            <i class="fas fa-reply"></i>
            <p>Barang Keluar</p>
        </a>
    </li>
    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <hr>
    </li>
    <li class="nav-item {{ Request::is('sampah') ? 'active' : '' }} {{ Request::is('sampah_supplier') ? 'active' : '' }} {{ Request::is('sampah_brg') ? 'active' : '' }} {{ Request::is('sampah_brgmasuk') ? 'active' : '' }} {{ Request::is('sampah_brgkeluar') ? 'active' : '' }}">
        <a href="/sampah">
            <i class="fas fa-trash-alt"></i>
            <p>Sampah</p>
        </a>
    </li>
{{-- </ul> --}}