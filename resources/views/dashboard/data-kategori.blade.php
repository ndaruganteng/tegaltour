@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0"> Data Kategori Wisata</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
              <li class="breadcrumb-item active"> Data Kategori Wisata</li>
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
                         <div class="card-header" style="background-color: white;">
                            <div class="d-flex justify-content-between">
                                <h5>Data Kategori Wisata</h5>
                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#tambahkategori">
                                    <i class="fa-solid fa-plus mr-1"></i> Tambah Kategori
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="kategori-table" class="table table-striped table-bordered text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>                                       
                                    <tbody>
                                            @foreach($kategori as $p) 
                                                <tr>
                                                    <td>{{ $p->nama_kategori}}</td>
                                                    <td>
                                                        <button class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#editkategori{{ $p->id_kategori }}">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <a href="/data-kategori/hapus/{{ $p->id_kategori }}" class="btn btn-danger btn-sm delete-kategori" id="delete-kategori">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <!-- modal edit -->
                                                <div class="modal fade" id="editkategori{{ $p->id_kategori }}" tabindex="-1" role="dialog" aria-labelledby="editkategoriTitle" aria-hidden="true">
                                                    <div class="modal-dialog " role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editkategoriTitle">Edit Kategori Wisata</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ url('/data-kategori/update/'.$p->id_kategori) }}"  method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <input type="hidden" name="id" id="id" value="{{ $p->id_kategori }}">
                                                                    <div class="form-group">
                                                                        <label for="no_rekening">Nama Kategori</label>
                                                                        <input type="text" class="form-control"  value="{{ $p->nama_kategori}}" name="nama_kategori">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-dark">Simpan</button>
                                                                    </div>
                                                                </form> 
                                                            </div>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end modal edit -->
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
    <!-- modal tambah kategori -->
    <div class="modal fade" id="tambahkategori" tabindex="-1" role="dialog" aria-labelledby="tambahkategoriTitle" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahkategoriTitle">Tambah Kategori Wisata</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Kategori.index') }}"  method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="no_rekening">Nama Kategori</label>
                            <input type="text" class="form-control" required="required"  name="nama_kategori" placeholder="Masukan Nama kategori">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark">Simpan</button>
                        </div>
                    </form> 
                </div>
              
            </div>
        </div>
    </div>
    <!-- end modal tambah kategori -->

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const deleteButtons = document.querySelectorAll('.delete-kategori');
    deleteButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault(); 

            Swal.fire({
                title: 'Konfirmasi Hapus Kategori',
                text: 'Apakah Anda yakin ingin menghapus kategori ini?',
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