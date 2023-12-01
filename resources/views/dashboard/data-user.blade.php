@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Data User </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
              <li class="breadcrumb-item active"> Data User</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content admin">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header"  style="background-color: white;">
                            <div class="d-flex justify-content-between">
                                <h5>Data Admin</h5>
                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#tambahadmin">
                                    <i class="fa-solid fa-plus mr-1"></i> Tambah Admin
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datauser-table" class="table table-striped table-bordered text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Foto Profile</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No Telephone</th>
                                            <th>Role</th> 
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>                   
                                    <tbody>
                                        @foreach($users as $p)
                                            @if($p->role == 'admin')
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset('storage/image/user/' . $p->profile_picture) }}" class="rounded-circle" style="width:50px; heigth:auto;">
                                                    </td>
                                                    <td>{{$p->nama_lengkap}}</td>
                                                    <td>{{$p->email}}</td>
                                                    <td>{{$p->no_telepon}}</td>
                                                    <td>
                                                        <span class="badge badge-dark">{{$p->role}}</span>
                                                    </td>
                                                    <td>
                                                        <a href="https://api.whatsapp.com/send?phone={{$p->no_telepon}}#{{$p->id}}" target="_blank" class="btn btn-success btn-sm">
                                                            <i class="fa-brands fa-whatsapp"></i>
                                                        </a>
                                                        <a href="/data-user/hapus_user/{{ $p->id }}" class="btn btn-danger btn-sm deleteuser">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
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

    <div class="content mitra">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header"  style="background-color: white;">
                            <h5>Data Mitra</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datamitra-table" class="table table-striped table-bordered text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Foto Profile</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>No Telephone</th>
                                            <th>Role</th> 
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>                   
                                    <tbody>
                                        @foreach($users as $p)
                                            @if($p->role == 'mitra')
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset('storage/image/user/' . $p->profile_picture) }}" class="rounded-circle" style="width:50px; heigth:auto;">
                                                    </td>
                                                    <td>{{$p->nama_lengkap}}</td>
                                                    <td style="word-wrap: break-word; max-width: 200px;">{{$p->alamat}}</td>
                                                    <td>{{$p->email}}</td>
                                                    <td>{{$p->no_telepon}}</td>
                                                    <td>
                                                        <span class="badge badge-dark">{{$p->role}}</span>
                                                    </td>
                                                    <td>
                                                        <a href="https://api.whatsapp.com/send?phone={{$p->no_telepon}}#{{$p->id}}" target="_blank" class="btn btn-success btn-sm">
                                                            <i class="fa-brands fa-whatsapp"></i>
                                                        </a>
                                                        <a href="/data-user/hapus_user/{{ $p->id }}" class="btn btn-danger btn-sm deleteuser">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
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

    <div class="content user">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header"  style="background-color: white;">
                            <h5>Data Pengguna</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datacust-table" class="table table-striped table-bordered text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Foto Profile</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No Telephone</th>
                                            <th>Role</th> 
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>                   
                                    <tbody>
                                        @foreach($users as $p)
                                            @if($p->role == 'user')
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset('storage/image/user/' . $p->profile_picture) }}" class="rounded-circle" style="width:50px; heigth:auto;">
                                                    </td>
                                                    <td>{{$p->nama_lengkap}}</td>
                                                    <td>{{$p->email}}</td>
                                                    <td>{{$p->no_telepon}}</td>
                                                    <td>
                                                        <span class="badge badge-dark">{{$p->role}}</span>
                                                    </td>
                                                    <td>
                                                        <a href="https://api.whatsapp.com/send?phone={{$p->no_telepon}}#{{$p->id}}" target="_blank" class="btn btn-success btn-sm">
                                                            <i class="fa-brands fa-whatsapp"></i>
                                                        </a>
                                                        <a href="/data-user/hapus_user/{{ $p->id }}" class="btn btn-danger btn-sm deleteuser">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
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

    <div class="modal fade" id="tambahadmin" tabindex="-1" role="dialog" aria-labelledby="tambahadminTitle" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahadminTitle">Tambah Data admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/register_admin"  method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Foto Profile</label>
                                    <input type="file"  name="profile_picture" class="form-control" accept="image/*" onchange="previewImage(event)">
                                    <p  style="font-style: italic; font-size: 10px;">size foto maksimal 2 mb dan extensi jpg, png, jpeg</p>     
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-grup">
                                    <img id="image-preview" src="" class="rounded-circle border border-2 border-dark" style="display:none; max-width: 100px; max-height: 100px;" alt="Preview Image">
                                </div>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" required="required" value="{{ old('nama_lengkap') }}" name="nama_lengkap" placeholder="Masukan Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="no_telepon">Nomor Telepon</label>
                            <input type="text" class="form-control" required="required" value="{{ old('no_telepon') }}" name="no_telepon" placeholder="Masukan Nomor Telepon" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" required="required"  value="{{ old('email') }}"  name="email" placeholder="Masukan Email">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" required="required" value="{{ old('alamat') }}"   name="alamat" placeholder="Masukan Alamat">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" required="required" value="{{ old('password') }}" name="password" id="password" placeholder="Masukan Password">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="togglePassword">
                                        <i class="fa fa-eye" aria-hidden="true" onclick="togglePassword('password')"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Konfirmasi Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" required="required" value="{{ old('password') }}" name="password_confirmation" id="confirm_password" placeholder="Masukan Password">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="toggleConfirmPassword">
                                        <i class="fa fa-eye" aria-hidden="true" onclick="togglePassword('confirm_password')"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-secondary " value="Simpan Data" >Simpan</button>
                        </div>
                    </form>   
                </div>             
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const deleteButtons = document.querySelectorAll('.deleteuser');
    deleteButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault(); 

            Swal.fire({
                title: 'Konfirmasi Hapus Data User ',
                text: 'Apakah Anda yakin ingin menghapus User ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = button.getAttribute('href');
                }
            });
        });
    });
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


@endsection