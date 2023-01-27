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
                                        <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
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
                                <a href="#editUser{{ Auth::user()->id }}" data-toggle="modal" class="btn btn-warning btn-xl">
                                    <i class="fa fa-edit"></i>
                                    Ubah Password
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="card card-profile card-secondary">
                        <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                            <div class="profile-picture">
                                <div class="avatar avatar-xl">
                                    <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="user-profile text-center">
                                <div class="name">Hizrian, 19</div>
                                <div class="job">Frontend Developer</div>
                                <div class="desc">A man who hates loneliness</div>
                                <div class="social-media">
                                    <a class="btn btn-info btn-twitter btn-sm btn-link" href="#"> 
                                        <span class="btn-label just-icon"><i class="flaticon-twitter"></i> </span>
                                    </a>
                                    <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
                                        <span class="btn-label just-icon"><i class="flaticon-google-plus"></i> </span> 
                                    </a>
                                    <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#"> 
                                        <span class="btn-label just-icon"><i class="flaticon-facebook"></i> </span> 
                                    </a>
                                    <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
                                        <span class="btn-label just-icon"><i class="flaticon-dribbble"></i> </span> 
                                    </a>
                                </div>
                                <div class="view-profile">
                                    <a href="#" class="btn btn-secondary btn-block">View Full Profile</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row user-stats text-center">
                                <div class="col">
                                    <div class="number">125</div>
                                    <div class="title">Post</div>
                                </div>
                                <div class="col">
                                    <div class="number">25K</div>
                                    <div class="title">Followers</div>
                                </div>
                                <div class="col">
                                    <div class="number">134</div>
                                    <div class="title">Following</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    
</div>


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
                    <input type="file" class="form-control" name="foto">
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

@endsection