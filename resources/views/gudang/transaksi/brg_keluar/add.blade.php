@extends('layouts.beranda')
@section('content')
@include('sweetalert::alert')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah Data Barang Keluar</h4>
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
                        <a href="#">Transaksi</a>
                    </li>
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
                            <div class="card-title">Masukan Data Barang Keluar</div>
                        </div>
                        <form method="POST" enctype="multipart/form-data" action="/barang_keluar/store">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>No Barang Keluar</label>
                                    <input type="text" class="form-control" name="no_barang_keluar" value="{{ 'NBK-'.$kd }}" required readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Tanggal Keluar</label>
                                    <input type="date" class="form-control" name="tgl_barang_keluar" placeholder="No Barang Keluar . . ." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <select class="form-control form-control-lg" name="id_barang" id="id_barang">
                                    <option value="" hidden="">-- Pilih Barang --</option>
                                    @foreach ($barang as $a)
                                    <option value="{{ $a->id }}">{{ $a->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="detail_barang"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Jumlah Barang Keluar</label>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" placeholder="Jumlah . . ." id="jml_barang_keluar" name="jml_barang_keluar" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">Unit</span>
                                        </div>
                                    </div>
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
                            <div class="card-action">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                <a href="/barang_keluar" class="btn btn-danger"><i class="fa fa-undo"></i> Kembali</a>
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
        $("#jml_barang_keluar").keyup(function() {
            var jml_barang_keluar   = $("#jml_barang_keluar").val();
            var harga              = $("#harga").val();
            var total              = parseInt(harga) * parseInt(jml_barang_keluar);
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
            url     : "/barang_keluar/ajax",
            data    : "id_barang="+id_barang,
            cache   : false,
            success : function(data){
                $('#detail_barang').html(data);
            }
        });
    });
</script>
@endsection