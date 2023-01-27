@extends('layouts.beranda')
@section('content')
@include('sweetalert::alert')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah Data Barang Rusak</h4>
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
                        <a href="#">Master Data</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Barang Rusak</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Masukan Data Barang Rusak</div>
                        </div>
                        <form method="POST" enctype="multipart/form-data" action="/barang_rusak/store">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <select class="form-control form-control-lg" name="barang_id" id="id_barang">
                                    <option value="" hidden="">-- Pilih Barang --</option>
                                    @foreach ($barang as $a)
                                    <option {{ old('barang_id') == $a->id ? "selected" : "" }} value="{{ $a->id }}">{{ $a->nama_barang }}</option>
                                    {{-- <option value="{{ $a->id }}">{{ $a->nama_barang }}</option> --}}
                                    @endforeach
                                </select>
                                @error('barang_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div id="detail_barang"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Jumlah Barang Rusak</label>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" placeholder="Jumlah . . ." id="jumlah" name="jumlah" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">Unit</span>
                                        </div>
                                    </div>
                                    @error('jumlah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Total</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp. </span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Total . . ." id="total" name="total" readonly required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" required placeholder="Deskripsi Kerusakan"></textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                <a href="/barang_rusak" class="btn btn-danger"><i class="fa fa-undo"></i> Kembali</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/js/core/jquery.3.2.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#jumlah").keyup(function() {
            var jumlah                  = $("#jumlah").val();
            var harga                   = $("#harga").val();
            var total                   = parseInt(harga) * parseInt(jumlah);
            $("#total").val(total);
        })
    })
</script>

<script type="text/javascript">
    $.ajaxSetup({
        header: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script type="text/javascript">
    $("#id_barang").change(function(){
        var id_barang = $("#id_barang").val();
        $.ajax({
            type    : "GET",
            url     : "/barang_rusak/ajax",
            data    : "id_barang="+id_barang,
            cache   : false,
            success : function(data){
                $('#detail_barang').html(data);
            }
        });
    });
</script>
@endsection