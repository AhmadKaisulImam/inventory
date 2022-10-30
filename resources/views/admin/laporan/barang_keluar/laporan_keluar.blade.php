@extends('layouts.beranda')

@section('content')
@include('sweetalert::alert')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Laporan</h4>
                <ul class="breadcrumbs">
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">laporan Barang Keluar</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Laporan Data Barang Keluar</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#cetakLaporan">
                                    <i class="fa fa-plus"></i>
                                    Print Barang Keluar
                                </button>
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
                                            <th>Kategori</th>
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
                                            <td>{{ $b->nama_barang }}</td>
                                            <td>{{ $b->nama_kategori }}</td>
                                            <td>{{ date('d F Y', strtotime($b->tgl_barang_keluar)) }}</td>
                                            <td>Rp. {{ number_format($b->harga) }}</td>
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

<div class="modal fade" id="cetakLaporan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cetak Data Barang Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="GET" target="_blank" enctype="multipart/form-data" action="/laporan_keluar/print_keluar">
            @csrf

            <div class="modal-body">

                <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tgl_mulai" class="form-control" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Tanggal Selesai</label>
                    <input type="date" name="tgl_selesai" class="form-control" required autocomplete="off">
                </div>
                

            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i>Cetak Data</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection