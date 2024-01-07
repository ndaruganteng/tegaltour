@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Data User Biro Wisata </h1>
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

    <div class="content mitra">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-dark card-outline">
                        <div class="card-header" style="background-color: white;">
                            <h5>Data Mitra</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datamitra-table" class="table table-striped table-bordered text-center"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Foto Profile</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>No Telephone</th>
                                            <th>Rekening</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $p)
                                        @if($p->role == 'mitra')
                                        <tr>
                                            <td>
                                                @if($p->profile_picture == null)
                                                <img src="https://img.myloview.com/stickers/default-avatar-profile-icon-vector-social-media-user-photo-700-205577532.jpg"
                                                    class="rounded-circle" style="width:50px; height:auto;">
                                                @else
                                                <img src="{{ asset('storage/image/user/' . $p->profile_picture) }}"
                                                    class="rounded-circle" style="width:50px; height:auto;">
                                                @endif
                                            </td>
                                            <td>{{$p->nama_lengkap}}</td>
                                            <td style="word-wrap: break-word; max-width: 200px;">{{$p->alamat}}</td>
                                            <td>{{$p->email}}</td>
                                            <td>{{$p->no_telepon}}</td>
                                            <td>{{$p->rekening}}</td>
                                            <td>
                                                <span class="badge badge-dark">{{$p->role}}</span>
                                            </td>
                                            <td>
                                                <a href="https://api.whatsapp.com/send?phone={{$p->no_telepon}}#{{$p->id}}"
                                                    target="_blank" class="btn btn-success btn-sm">
                                                    <i class="fa-brands fa-whatsapp"></i>
                                                </a>
                                                <a href="/data-user/hapus_user/{{ $p->id }}"
                                                    class="btn btn-danger btn-sm deleteuser mt-1">
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

@endsection