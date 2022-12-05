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
                                                <a href="#hapusBarangmasuk{{ $b->id }}" data-toggle="modal" class="btn btn-danger btn-xs" title="Hapus">
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

{{-- modal --}}
@foreach ($barang_masuk as $h)
<div class="modal fade" id="hapusBarangmasuk{{ $h->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
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

{{-- @foreach ($barang_masuk as $bm)
<div class="modal fade" id="editBarangmasuk{{ $bm->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ubah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/barang_masuk/store">
                @csrf
                <div class="card-body">
                    <input type="hidden" name="id" value="{{ $bm->id }}" required>
                    <div class="row">
                        <div class="col-md-6">
                            <label>No Barang Masuk</label>
                            <input type="text" class="form-control" name="no_barang_masuk" value="{{ $bm->no_barang_masuk }}" readonly required>
                        </div>
                        <div class="col-md-6">
                            <label for="tgl">Tanggal Masuk</label>
                            <input type="date" id="tgl" class="form-control" name="tgl_barang_masuk" value="{{ date('Y-m-d',strtotime($bm->tgl_barang_masuk)) }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <select class="form-control form-control-lg" name="barang_id" id="id_barang">
                            <option value="{{ $bm->barang->id }}">{{ $bm->barang->nama_barang }}</option>
                            @foreach ($barang as $a)
                            <option value="{{ $a->id }}">{{ $a->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <select class="form-control form-control-lg" name="supplier_id" id="id_supplier">
                            <option value="{{ $bm->supplier->id }}">{{ $bm->supplier->nama_supplier }}</option>
                            @foreach ($supplier as $s)
                            <option value="{{ $s->id }}">{{ $s->nama_supplier }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Rp</span>
                            </div>
                            <input type="text" class="form-control" id="harga" value="{{ $bm->barang->harga_beli }}" required readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Jumlah Barang Masuk</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="Jumlah . . ." id="jml_barang_masuk" name="jml_barang_masuk" value="{{ $bm->jml_barang_masuk }}" required>
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
                                <input type="number" class="form-control" placeholder="Total . . ." id="total" name="total" value="{{ $bm->total }}" readonly required>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        <a href="/barang_masuk" class="btn btn-danger"><i class="fa fa-undo"></i> Kembali</a>
                    </div>
                </div>
                </form>
        </div>
    </div>
</div>
@endforeach

<script src="/assets/js/core/jquery.3.2.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#jml_barang_masuk").keyup(function() {
            var jml_barang_masuk   = $("#jml_barang_masuk").val();
            var harga              = $("#harga").val();
            var total              = parseInt(harga) * parseInt(jml_barang_masuk);
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
</script> --}}

{{-- <script type="text/javascript">
    $("#id_barang").change(function(){
        var id_barang = $("#id_barang").val();
        $.ajax({
            type    : "GET",
            url     : "/barang_masuk/ajax",
            data    : "id_barang="+id_barang,
            cache   : false,
            success : function(data){
                $('#detail_barang').html(data);
            }
        });
    });
</script> --}}
@endsection