@extends('layouts.beranda')
@section('content')
@include('sweetalert::alert')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah Data</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data Supplier</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Masukan Data Supplier</div>
                        </div>
                        <form method="POST" enctype="multipart/form-data" action="/supplier/store">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label>Nama Supplier</label>
                                <input type="text" name="nama_supplier" class="form-control @error('nama_supplier') is-invalid @enderror" value="{{ old('nama_supplier') }}" required autocomplete="off" placeholder="Masukan Nama Supplier. . . ">
                                @error('nama_supplier')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" required autocomplete="off" placeholder="Masukan Alamat. . . ">
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="text" name="nomor_telp" class="form-control @error('nomor_telp') is-invalid @enderror" value="{{ old('nomor_telp') }}" required autocomplete="off" placeholder="Masukan Nomor Telepon. . . ">
                                @error('nomor_telp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="off" placeholder="Masukan Alamat Email. . . ">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                            <a href="/supplier" class="btn btn-danger"><i class="fa fa-undo"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection