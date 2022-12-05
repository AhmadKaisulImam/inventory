@extends('layouts.beranda')

@section('content')
@include('sweetalert::alert')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Master Data</h4>
                <ul class="breadcrumbs">
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data Barang</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Barang</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="/barang/create">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body"
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover text-center" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name Barang</th>
                                            <th>Kategori</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Stok</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang as $u)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $u->nama_barang }}</td>
                                            <td>{{ $u->category->nama_kategori }}</td>
                                            <td>Rp. {{ number_format($u->harga_beli) }}</td>
                                            <td>Rp. {{ number_format($u->harga_jual) }}</td>
                                            <td>{{ $u->stok }} Unit</td>
                                            <td>
                                                <a href="/barang/{{ $u->id }}/edit" class="btn btn-warning btn-xs" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="#hapusBarang{{ $u->id }}" data-toggle="modal" class="btn btn-danger btn-xs" title="Hapus">
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

@foreach ($barang as $h)
<div class="modal fade" id="hapusBarang{{ $h->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="GET" enctype="multipart/form-data" action="/barang/{{ $h->id }}/destroy">
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