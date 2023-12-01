@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"> Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"> User Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <div class="card card-primary card-outline text-center">
                        <div class="card-header" style="background-color: white;">
                                <h5>Profile Saya</h5>
                        </div>
                        <div class="card-body ">
                            <div class="image_profile">
                            @if(Auth::user()->profile_picture && Storage::disk('public')->exists('image/user/' . Auth::user()->profile_picture))
                                <img src="{{ asset('storage/image/user/' . Auth::user()->profile_picture) }}" class="rounded-circle border border-2 border-dark" alt="Gambar Pengguna" style="width:100px; heigth:100px;">
                            @else
                                <img src="\images\icon\profile.png" class="rounded-circle border border-2 border-dark" alt="Gambar Default" style="width:100px; heigth:100px;">
                            @endif
                            </div>
                            <h5 style="text-align: center; margin-top:10px; margin-bottom:20px;">{{ Auth::user()->nama_lengkap }}</h5>
                            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                    data-target="#editprofile">
                                    <i class="fa-solid fa-pen-to-square mr-1"></i> Edit profile
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <strong><i class="fas fa-user mr-1"></i>Nama Lengkap</strong>
                            <p class="text-muted">{{ Auth::User()->nama_lengkap }}</p>
                            <hr>
                            <strong><i class="fa-solid fa-envelope mr-1"></i>Email</strong>
                            <p class="text-muted">{{ Auth::User()->email }}</p>
                            <hr>
                            <strong><i class="fa-solid fa-phone  mr-1"></i>Nomor Telepon</strong>
                            <p class="text-muted">{{ Auth::User()->no_telepon }}</p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i>Alamat</strong>
                            <p class="text-muted">{{ Auth::User()->alamat }}</p>
                            <hr>
                            <strong><i class="fa-solid fa-users-rectangle mr-1"></i>Role</strong>
                            <p class="text-muted">{{ Auth::User()->role }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="editprofileTitle" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editprofileTitle">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.update', ['id' => Auth::id()]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Foto Profile</label>
                                    <input type="file"  value="{{ Auth::user()->profile_picture }}" name="profile_picture" class="form-control" accept="image/*" onchange="previewImage(event)">
                                    <p  style="font-style: italic; font-size: 12px;">size foto maksimal 2 mb dan extensi jpg, png, jpeg</p>     
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <img id="image-preview" src="" class="img-thumbnail rounded-circle" style="display:none; max-width: 100%; max-height: 200px;" alt="Preview Image">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" required="required" name="nama_lengkap" value="{{ Auth::user()->nama_lengkap }}">
                        </div>
                        <div class="form-group">
                            <label for="no_telepon">Nomor Telepon</label>
                            <input type="text" class="form-control" required="required" name="no_telepon" oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="{{ Auth::user()->no_telepon }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{ Auth::user()->alamat }}">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-secondary" value="Simpan Data">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function togglePassword(inputId) {
        var input = document.getElementById(inputId);
        var icon = document.getElementById("toggle" + inputId);

        if (input.type === "password") {
            input.type = "text";
            icon.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true" onclick="togglePassword(\'' + inputId + '\')"></i>';
        } else {
            input.type = "password";
            icon.innerHTML = '<i class="fa fa-eye" aria-hidden="true" onclick="togglePassword(\'' + inputId + '\')"></i>';
        }
    }
</script>

<script>
    function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = "";
            preview.style.display = 'none';
        }
    }
</script>


@endsection