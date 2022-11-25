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
                        <a href="#">Barang Masuk</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Barang Masuk</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="/barang_masuk/create">
                                    <i class="fa fa-plus"></i>
                                    Tambah Barang Masuk
                                </a>
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
                                            <td>{{ $b->supplier->nama_supplier }}</td>
                                            <td>{{ $b->barang->nama_barang }}</td>
                                            <td>{{ date('d F Y', strtotime($b->tgl_barang_masuk)) }}</td>
                                            <td>Rp. {{ number_format($b->barang->harga_beli) }}</td>
                                            <td>{{ $b->jml_barang_masuk }} Unit</td>
                                            <td>Rp. {{ number_format($b->total) }}</td>
                                            <td>
                                                <a href="#hapusBarangmasuk{{ $b->id }}" data-toggle="modal" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash"></i>
                                                    Hapus
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

{{-- modal --}}
@foreach ($barang_masuk as $h)
<div class="modal fade" id="hapusBarangmasuk{{ $h->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Barang Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="GET" enctype="multipart/form-data" action="/barang_masuk/{{ $h->id }}/destroy">
            @csrf

            <div class="modal-body">

                <input type="hidden" name="id" value="{{ $h->id }}" required>
                <div class="form-group">
                    <h4>Apakah Anda Akan Yakin Akan Menghapus?</h4>
                </div>

            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection