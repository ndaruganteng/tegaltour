@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Data Rekening </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
              <li class="breadcrumb-item active"> Data Rekening</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div class="card-tools">
                                    <form action="{{route('rekening.search_data_rekening') }}" method="GET">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="search_data_rekening" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>    
                                </div>
                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#tambahrekening">
                                    <i class="fa-solid fa-plus mr-1"></i> Tambah Rekening
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                    <th>Image</th>
                                    <th>Nama Bank</th>
                                    <th>Nomor Rekening</th>
                                    <th>Nama Rekening</th>
                                    <th>Aksi</th>
                                    </tr>
                                </thead>                           
                                <tbody>
                                @foreach($rekening as $p)
                                    <tr>
                                        <td>
                                            <img src="{{asset('storage/image/rekening/'.$p->image_rekening)}}" alt="wisata" style="width:100px">
                                        </td>
                                        <td>{{ $p->nama_bank}}</td>
                                        <td>{{ $p->no_rekening}}</td>
                                        <td>{{ $p->nama_rekening}}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editrekening{{ $p->id_rekening }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="/data-rekening/hapus/{{ $p->id_rekening }}" class="btn btn-danger btn-sm delete-button">
                                                    <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="editrekening{{ $p->id_rekening }}" tabindex="-1" role="dialog" aria-labelledby="editrekeningTitle" aria-hidden="true">
                                        <div class="modal-dialog  " role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editrekeningTitle">Edit Rekening</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('/data-rekening/update/'.$p->id_rekening) }}"  method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class="card-body">
                                                        <input type="hidden" name="id" id="id" value="{{ $p->id_rekening }}">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label for="image_rekening" class="col-form-label">Image</label>
                                                                        <input type="file" value="{{ $p->image_rekening}}" name="image_rekening" class="form-control" accept="image/*" onchange="previewImage(event)">
                                                                        <p  style="font-style: italic; font-size: 12px;">size foto maksimal 2 mb dan extensi jpg, png, jpeg</p>     
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-grup">
                                                                        @if ($p->image_rekening)
                                                                        <img src="{{asset('storage/image/rekening/'.$p->image_rekening)}}" class="img-thumbnail" width="200">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama_bank">Nama Bank</label>
                                                                <input type="text" class="form-control" value="{{ $p->nama_bank}}"  name="nama_bank"  placeholder="Masukan Nama Bank">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="no_rekening">Nomor Rekening</label>
                                                                <input type="text" class="form-control" value="{{ $p->no_rekening}}"  name="no_rekening" placeholder="Masukan Nomor Rekening Rekening">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama_rekening">Nama Rekening</label>
                                                                <input type="text" class="form-control" value="{{ $p->nama_rekening}}"  name="nama_rekening" placeholder="Nama Rekening">
                                                            </div>

                                                            <div>
                                                                <button type="submit" class="btn btn-secondary " value="Simpan Data" >Simpan</button>
                                                            </div>
                                                        </div>
                                                    </form>  
                                                </div>                                          
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>                  
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="tambahrekening" tabindex="-1" role="dialog" aria-labelledby="tambahrekeningTitle" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahrekeningTitle">Tambah Data Rekening</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Rekening.index') }}"  method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="image_rekening" class="col-form-label">Image</label>
                                    <input type="file" class="form-control" id="image_rekening" required="required" name="image_rekening" accept="image/*" onchange="previewImage(event)">
                                    <p  style="font-style: italic; font-size: 12px;">size foto maksimal 2 mb dan extensi jpg, png, jpeg</p>     
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img id="image-preview" src="" class="img-thumbnail" style="display:none; max-width: 100%; max-height: 200px;" alt="Preview Image">
                            </div>
                        </div>                         
                        <div class="form-group">
                            <label for="nama_bank">Nama Bank</label>
                            <input type="text" class="form-control" required="required"  name="nama_bank"  placeholder="Masukan Nama Bank">
                        </div>
                        <div class="form-group">
                            <label for="no_rekening">Nomor Rekening</label>
                            <input type="text" class="form-control" required="required"  name="no_rekening" placeholder="Masukan Nomor Rekening Rekening">
                        </div>
                        <div class="form-group">
                            <label for="nama_rekening">Nama Rekening</label>
                            <input type="text" class="form-control" required="required"  name="nama_rekening" placeholder="Masukan Nama Rekening">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-secondary " value="Simpan Data" >Simpan</button>
                        </div>
                    </form>   
                </div>             
            </div>
        </div>
    </div>

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
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                
                Swal.fire({
                    title: 'Apakah Anda yakin Menghapus Data Rekening Ini?',
                    text: "Anda tidak dapat mengembalikan data yang telah dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = e.target.getAttribute('href');
                    }
                });
            });
        });
    </script>


</div>



@endsection