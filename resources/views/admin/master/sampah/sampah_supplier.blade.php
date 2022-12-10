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
                                            <th>Name Supplier</th>
                                            <th>Alamat</th>
                                            <th>Nomor Telepon</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($supplier as $s)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $s->nama_supplier }}</td>
                                            <td>{{ $s->alamat }}</td>
                                            <td>{{ $s->nomor_telp }}</td>
                                            <td>{{ $s->email }}</td>
                                            <td>
                                                <a href="/sampahsupplier/{{ $s->id }}/restoresupplier" class="btn btn-warning btn-xs" title="Restore">
                                                    Restrore
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