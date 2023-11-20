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

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="kategori-table" class="table table-striped table-bordered text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No Telephone</th>
                                            <th>Role</th> 
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>                   
                                    <tbody>
                                        @foreach($users as $p)
                                            <tr>
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

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Wisata</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="form-group">
                            <div class="row ">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <img src="images/icon/profile.png" alt="" class="rounded-circle" style="width:100%">                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select class="custom-select">
                                <option>wisatawan</option>
                                <option>Mitra</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark " value="Simpan Data">Simpan</button>
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


@endsection