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
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addBarang">
                                    <i class="fa fa-plus"></i>
                                    Tambah Barang
                                </button>
                            </div>
                        </div>
                        <div class="card-body"
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover text-center" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name Supplier</th>
                                            <th>Alamat</th>
                                            <th>Nomor Telepon</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($supplier as $u)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $u->nama_supplier }}</td>
                                            <td>{{ $u->alamat }}</td>
                                            <td>{{ $u->nomor_telp }}</td>
                                            <td>{{ $u->email }}</td>
                                            <td>
                                                <a href="#editBarang{{ $u->id }}" data-toggle="modal" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </a>
                                                <a href="#hapusBarang{{ $u->id }}" data-toggle="modal" class="btn btn-danger btn-xs">
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

{{-- Modal --}}
<div class="modal fade" id="addBarang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/supplier/store">
            @csrf

            <div class="modal-body">

                <div class="form-group">
                    <label>Nama Supplier</label>
                    <input type="text" name="nama_supplier" class="form-control" required autocomplete="off" placeholder="Masukan Nama Supplier. . . ">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" required autocomplete="off" placeholder="Masukan Alamat. . . ">
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="nomor_telp" class="form-control" required autocomplete="off" placeholder="Masukan Nomor Telepon. . . ">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" required autocomplete="off" placeholder="Masukan Alamat Email. . . ">
                </div>

            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- @foreach ($barang as $d)
<div class="modal fade" id="editBarang{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ubah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/barang/{{ $d->id }}/update">
            @csrf

            <div class="modal-body">

                <input type="hidden" name="id" value="{{ $d->id }}" required>
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" value="{{ $d->nama_barang }}" class="form-control" required autocomplete="off" placeholder="Masukan Nama Barang. . . ">
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp. </span>
                        </div>
                        <input type="number" value="{{ $d->harga }}" class="form-control" placeholder="Harga . . ." name="harga" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <div class="input-group mb-3">
                        <input type="number" value="{{ $d->stok }}" class="form-control" placeholder="Stok . . ." name="stok" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Unit</span>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach --}}

{{-- @foreach ($barang as $h)
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

                <input type="hidden" name="id" value="{{ $d->id }}" required>
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
@endforeach --}}

@endsection