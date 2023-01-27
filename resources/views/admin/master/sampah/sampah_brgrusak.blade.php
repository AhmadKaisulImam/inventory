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
                                <h4 class="card-title">Data Supplier Terhapus</h4>
                                <div class="dropdown">
                                    <a class="btn btn-warning dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    Data Sampah Lainya
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/sampah_brg">Barang</a>
                                        <a class="dropdown-item" href="/sampah">Kategori</a>
                                        <a class="dropdown-item" href="#">Barang Masuk</a>
                                        <a class="dropdown-item" href="#">Barang Keluar</a>
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
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th>Deskripsi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang_rusak as $u)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $u->barang->nama_barang }}</td>
                                            <td>{{ $u->jumlah }} Unit</td>
                                            <td>Rp. {{ number_format($u->total) }}</td>
                                            <td>{{ $u->deskripsi }}</td>
                                            <td>
                                                <a href="/sampahbrgrusak/{{ $u->id }}/restorebrgrusak" class="btn btn-warning btn-xs" title="Restore">
                                                    Restrore
                                                </a>
                                                <a href="#hapusBrgrusak{{ $u->id }}" data-toggle="modal" class="btn btn-danger btn-xs" title="Hapus">
                                                    <i class="fa fa-trash"></i>
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

{{-- Modal --}}
@foreach ($barang_rusak as $h)
<div class="modal fade" id="hapusBrgrusak{{ $h->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h1 class="modal-title" id="exampleModalLongTitle"><b>Hapus Data Supplier</b></h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="GET" enctype="multipart/form-data" action="/sampahbrgrusak/{{ $h->id }}/delete_brgrusak">
            @csrf

            <div class="modal-body">

                <input type="hidden" name="id" value="{{ $h->id }}" required>
                <div class="form-group">
                    <h2><b>Data akan dihapus permanen?</b></h2>
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