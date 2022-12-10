@extends('layouts.beranda')

@section('content')
@include('sweetalert::alert')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Sampah</h4>
                <ul class="breadcrumbs">
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data Terhapus</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="card-title">Data Barang Terhapus</h4>
                                <div class="dropdown">
                                    <a class="btn btn-warning dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    Data Sampah Lainya
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/sampah">Kategori</a>
                                        <a class="dropdown-item" href="/sampah_supplier">Supllier</a>
                                        <a class="dropdown-item" href="/sampah_brg">Barang</a>
                                        <a class="dropdown-item" href="/sampah_brgkeluar">Barang Keluar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body"
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover text-center" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Barang Masuk</th>
                                            <th>Nama Supplier</th>
                                            <th>Nama Barang</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang_masuk as $b)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $b->no_barang_masuk }}</td>
                                            {{-- <td>{{ $b->supplier->nama_supplier }}</td> --}}
                                            @if (empty($b->supplier->nama_supplier))
                                            <td>-</td>
                                            @else
                                            <td>{{ $b->supplier->nama_supplier }}</td>
                                            @endif
                                            <td>{{ $b->barang->nama_barang }}</td>
                                            <td>{{ date('d F Y', strtotime($b->tgl_barang_masuk)) }}</td>
                                            <td>Rp. {{ number_format($b->barang->harga_beli) }}</td>
                                            <td>{{ $b->jml_barang_masuk }} Unit</td>
                                            <td>Rp. {{ number_format($b->total) }}</td>
                                            <td>
                                                <a href="/sampahbrgmasuk/{{ $b->id }}/restorebrgmasuk" class="btn btn-warning btn-xs" title="Restore">
                                                    Restore
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection