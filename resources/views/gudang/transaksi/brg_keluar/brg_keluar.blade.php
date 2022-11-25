@extends('layouts.beranda')

@section('content')
@include('sweetalert::alert')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Transaksi</h4>
                <ul class="breadcrumbs">
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Barang Keluar</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Barang Keluar</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="/barang_keluar/create">
                                    <i class="fa fa-plus"></i>
                                    Tambah Barang Keluar
                                </a>
                            </div>
                        </div>
                        <div class="card-body"
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover text-center" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Barang Keluar</th>
                                            <th>Name Barang</th>
                                            <th>Tanggal Keluar</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang_keluar as $b)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $b->no_barang_keluar }}</td>
                                            <td>{{ $b->barang->nama_barang }}</td>
                                            <td>{{ date('d F Y', strtotime($b->tgl_barang_keluar)) }}</td>
                                            <td>Rp. {{ number_format($b->barang->harga_jual) }}</td>
                                            <td>{{ $b->jml_barang_keluar }} Unit</td>
                                            <td>Rp. {{ number_format($b->total) }}</td>
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