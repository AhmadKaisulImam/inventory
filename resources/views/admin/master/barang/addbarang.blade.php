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
                        <a href="#">Data Barang</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Masukan Data Barang</div>
                        </div>
                        <form method="POST" enctype="multipart/form-data" action="/barang/store">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" class="form-control @error('nama_barang') is-invalid @enderror" required autocomplete="off" placeholder="Masukan Nama Barang. . . ">
                                @error('nama_barang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="category_id" class="form-control form-control-lg @error('category_id') is-invalid @enderror">
                                    <option value="" hidden>-- Pilih Kategori --</option>
                                    @foreach ($kategori as $k)
                                        <option {{ old('category_id') == $k->id ? "selected" : "" }} value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Harga Beli</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp. </span>
                                    </div>
                                    <input type="number" value="{{ old('harga_beli') }}" class="form-control @error('harga_beli') is-invalid @enderror" placeholder="Harga . . ." name="harga_beli" required>
                                    @error('harga_beli')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp. </span>
                                    </div>
                                    <input type="number" value="{{ old('harga_jual') }}" class="form-control @error('harga_jual') is-invalid @enderror" placeholder="Harga . . ." name="harga_jual" required>
                                    @error('harga_jual')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <div class="input-group mb-3">
                                    <input type="number" value="0" class="form-control @error('stok') is-invalid @enderror" placeholder="Stok . . ." name="stok" readonly>
                                    @error('stok')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">Unit</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">Pilih Gambar Barang</label>
                                <img class="img-preview img-fluid mb-3 col-sm-3">
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" onchange="previewImage()" placeholder="Masukan Gambar Barang. . . ">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" name="deskripsi" value="{{ old('deskripsi') }}" class="form-control @error('deskripsi') is-invalid @enderror" required autocomplete="off" placeholder="Masukan Deskripsi Barang. . . ">
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                            <a href="/barang" class="btn btn-danger"><i class="fa fa-undo"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection