@extends('layouts.beranda')

@section('content')
@include('sweetalert::alert')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <h4 class="page-title">Profile</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-with-nav">
                        <div class="card card-profile card-secondary">
                            {{-- <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')"> --}}
                                <div class="profile-picture">
                                    <div class="avatar avatar-xxl">
                                        @if (Auth::user()->foto)
                                        <img src="{{ asset('storage/' . Auth::user()->foto) }}" class="rounded-circle avatar-img">
                                        @else
                                        <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                                        @endif
                                    </div>
                                {{-- </div> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Name" value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-3 mb-3">
                                {{-- <button class="btn btn-success">Edit</button> --}}
                                <a href="#editUser{{ Auth::user()->id }}" data-toggle="modal" class="btn btn-primary btn-xl">
                                    <i class="fa fa-edit"></i>
                                    Edit
                                </a>
                                <a href="#ubahPass{{ Auth::user()->id }}" data-toggle="modal" class="btn btn-warning btn-xl">
                                    <i class="fa fa-edit"></i>
                                    Ubah Password
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

{{-- ubah password --}}
<div class="modal fade" id="ubahPass{{ Auth::user()->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ganti Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/user/{{ Auth::user()->id }}/updatepassword">
            @csrf

            <div class="modal-body">

                <div class="mb-3">
                    <label for="oldPasswordInput" class="form-label">Password Lama</label>
                    <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                        placeholder="Old Password">
                    @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="newPasswordInput" class="form-label">Password Baru</label>
                    <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                        placeholder="New Password">
                    @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="confirmNewPasswordInput" class="form-label">Konfirmasi Password Baru</label>
                    <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                        placeholder="Confirm New Password">
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

{{-- modal update profile --}}
<div class="modal fade" id="editUser{{ Auth::user()->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/user/{{ Auth::user()->id }}/update">
            @csrf

            <div class="modal-body">

                <input type="hidden" value="{{ Auth::user()->type }}" name="level">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" required autocomplete="off" placeholder="Masukan Nama . . . ">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control" required autocomplete="off" placeholder="Masukan Email . . .">
                </div>
                <div class="form-group">
                    {{-- <label>Password</label> --}}
                    <input type="hidden" name="password" class="form-control" autocomplete="off" value="{{ Auth::user()->password }}" placeholder="Masukan Password . . .">
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <img class="img-preview img-fluid mb-3 col-sm-3">
                    <input type="file" name="foto" id="image" class="form-control @error('image') is-invalid @enderror" onchange="previewImage()" placeholder="Masukan Gambar Barang. . . ">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
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

{{-- preview foto --}}
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