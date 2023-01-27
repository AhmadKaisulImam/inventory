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
                        <h2><b>Data Barang</b></h2>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <a class="btn btn-success" href="/barang/create">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <h4 class="card-title"><b>Data Barang</b></h4>
                                <div class="dropdown">
                                    <a class="btn btn-info dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-file-export"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/laporan_barang">PDF</a>
                                        <a class="dropdown-item" href="/barang/export">Excel</a>
                                        <a class="dropdown-item" href="/barang/exportcsv">CSV</a>
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
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            {{-- <th>Harga Beli</th>
                                            <th>Harga Jual</th> --}}
                                            <th>Stok</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang as $u)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            @if (empty($u->category->seri))
                                                <td>-</td>
                                            @else
                                                <td>{{ $u->category->seri }}-{{ str_pad($u->no_seri, 5, '0', STR_PAD_LEFT) }}</td>
                                            @endif
                                            <td>{{ $u->nama_barang }}</td>
                                            {{-- <td>{{ $u->category->nama_kategori }}</td> --}}
                                            @if (empty($u->category->nama_kategori))
                                                <td>-</td>
                                            @else
                                                <td>{{ $u->category->nama_kategori }}</td>
                                            @endif
                                            {{-- <td>Rp. {{ number_format($u->harga_beli) }}</td>
                                            <td>Rp. {{ number_format($u->harga_jual) }}</td> --}}
                                            <td>{{ $u->stok }} Unit</td>
                                            <td>
                                                <a href="/barang/{{ $u->id }}/edit" class="btn btn-warning btn-xs" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="#hapusBarang{{ $u->id }}" data-toggle="modal" class="btn btn-danger btn-xs" title="Hapus">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <a href="#show{{ $u->id }}" class="btn btn-info btn-xs" data-toggle="modal" title="lihat detail">
                                                    <i class="far fa-eye"></i>
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
@foreach ($barang as $b)
<div class="modal fade" id="show{{ $b->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title" id="exampleModalLongTitle">Detail Barang</h1>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        @if ($b->image)
                        <img src="{{ asset('storage/' . $b->image) }}" class="rounded mx-auto d-block" alt="gambar" style="width: 30%; height: 30%">
                        @else
                        <img src="img/file.png" class="rounded mx-auto d-block" alt="gambar" style="width: 30%; height: 30%">
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Nama Barang</td>
                                    <td>:</td>
                                    <td>{{ $b->nama_barang }}</td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>:</td>
                                    @if (empty($b->category->nama_kategori))
                                    <td>-</td>
                                    @else
                                    <td>{{ $b->category->nama_kategori }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Harga Beli</td>
                                    <td>:</td>
                                    <td>{{ $b->harga_beli }}</td>
                                </tr>
                                <tr>
                                    <td>Harga Jual</td>
                                    <td>:</td>
                                    <td>{{ $b->harga_jual }}</td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td>:</td>
                                    <td>{{ $b->stok }}</td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- <div class="form-group"> --}}
                            <label for="">Deskripsi</label>
                            <textarea class="form-control" readonly>{{ $b->deskripsi }}</textarea>
                        {{-- </div> --}}
                    </div>
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endforeach

@foreach ($barang as $h)
<div class="modal fade" id="hapusBarang{{ $h->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
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
                    <h2><b>Data akan dibuang ke sampah?</b></h2>
                </div>

            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Ya</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection