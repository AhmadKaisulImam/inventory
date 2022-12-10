    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Master Data</h4>
    </li>
    <li class="nav-item {{ Request::is('kategori') ? 'active' : '' }}">
        <a href="/kategori">
            <i class="fas fa-list-alt"></i>
            <p>Data Kategori</p>
        </a>
    </li>
    <li class="nav-item {{ Request::is('supplier') ? 'active' : '' }}">
        <a href="/supplier">
            <i class="fas fa-shipping-fast"></i>
            <p>Data Supplier</p>
        </a>
    </li>
    <li class="nav-item {{ Request::is('barang') ? 'active' : '' }}">
        <a href="/barang">
            <i class="fas fa-box-open"></i>
            <p>Data Barang</p>
        </a>
    </li>
    {{-- <li class="nav-item {{ Request::is('kategori' , 'barang' , 'supplier') ? 'active' : '' }}">
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
                <li class="{{ Request::is('supplier') ? 'active' : '' }}">
                    <a href="/supplier">
                        <span class="sub-item">Data Supplier</span>
                    </a>
                </li>
                <li class="{{ Request::is('barang') ? 'active' : '' }}">
                    <a href="/barang">
                        <span class="sub-item">Data Barang</span>
                    </a>
                </li>
            </ul>
        </div>
    </li> --}}
    <li class="nav-item">
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
    </li>
    {{-- <li class="nav-item {{ Request::is('user') ? 'active' : '' }}">
        <a href="/user">
            <i class="fa fa-user"></i>
            <p>Data User</p>
        </a>
    </li>
    <li class="nav-item {{ Request::is('kategori') ? 'active' : '' }}">
        <a href="/kategori">
            <i class=" fa fa-file"></i>
            <p>Data Kategori</p>
        </a>
    </li>
    <li class="nav-item {{ Request::is('barang') ? 'active' : '' }}">
        <a href="/barang">
            <i class=" fa fa-file"></i>
            <p>Data Barang</p>
        </a>
    </li>
    <li class="nav-item {{ Request::is('supplier') ? 'active' : '' }}">
        <a href="/supplier">
            <i class=" fa fa-file"></i>
            <p>Data Supplier</p>
        </a>
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
    <li class="nav-item {{ Request::is('barang_keluar') ? 'active' : '' }} {{ Request::is('barang_keluar') ? 'active' : '' }}">
        <a href="/barang_keluar">
            <i class="fas fa-reply"></i>
            <p>Barang Keluar</p>
        </a>
    </li>
    <li class="nav-item {{ Request::is('sampah') ? 'active' : '' }} {{ Request::is('sampah') ? 'active' : '' }}">
        <a href="/sampah">
            <i class="fas fa-trash-alt"></i>
            <p>Sampah</p>
        </a>
    </li>
{{-- </ul> --}}