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
                        <a href="#">Data User</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data User</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addUser">
                                    <i class="fa fa-plus"></i>
                                    Tambah User
                                </button>
                            </div>
                        </div>
                        <div class="card-body"
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover text-center" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $u)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $u->name }}</td>
                                            <td>{{ $u->email }}</td>
                                            <td>{{ $u->type }}</td>
                                            <td>
                                                <a href="#editUser{{ $u->id }}" data-toggle="modal" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </a>
                                                <a href="#hapusUser{{ $u->id }}" data-toggle="modal" class="btn btn-danger btn-xs">
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
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/user/store">
            @csrf

            <div class="modal-body">

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" required autocomplete="off" placeholder="Masukan Nama . . . ">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" required autocomplete="off" placeholder="Masukan Email . . .">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required autocomplete="off" placeholder="Masukan Password . . .">
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control form-control-lg">
                        <option value="" hidden>-- Pilih Level --</option>
                        <option value=0>Admin</option>
                        <option value=1>Gudang</option>
                    </select>
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

@foreach ($user as $d)
<div class="modal fade" id="editUser{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/user/{{ $d->id }}/update">
            @csrf

            <div class="modal-body">

                <input type="hidden" name="id" value="{{ $d->id }}" required>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" value="{{ $d->name }}" class="form-control" required autocomplete="off" placeholder="Masukan Nama . . . ">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" value="{{ $d->email }}" class="form-control" required autocomplete="off" placeholder="Masukan Email . . .">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required autocomplete="off" placeholder="Masukan Password . . .">
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control form-control-lg">
                        <option <?php if($d['type'] == "admin") echo"selected"; ?> value=0>Admin</option>
                        <option <?php if($d['type'] == "gudang") echo"selected"; ?> value=1>Gudang</option>
                    </select>
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
@endforeach

@foreach ($user as $h)
<div class="modal fade" id="hapusUser{{ $h->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="GET" enctype="multipart/form-data" action="/user/{{ $h->id }}/destroy">
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
@endforeach

@endsection