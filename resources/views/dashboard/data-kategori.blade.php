@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div class="card-tools">
                                    <form action="#" method="GET">
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
                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#tambahkategori">
                                    <i class="fa-solid fa-plus mr-1"></i> Tambah Kategori
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>                   
                                <tbody>
                                @foreach($kategori as $p)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->nama_kategori}}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#editkategori{{ $p->id_kategori }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <!-- <a href="/data-kategori/hapus/{{ $p->id_kategori }}" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> 
                                            </a> -->
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus{{ $p->id_kategori }}">
                                                <i class="fas fa-trash"></i> 
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- Modal Hapus -->
                                <div class="modal fade" id="modalHapus{{ $p->id_kategori }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Anda yakin ingin menghapus Kategori ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <form action="{{ route('delete.element', $p->id_kategori) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal edit -->
                                <div class="modal fade" id="editkategori{{ $p->id_kategori }}" tabindex="-1" role="dialog" aria-labelledby="editkategoriTitle" aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editkategoriTitle">edit Kategori Wisata</h5>
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
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

</div>

@endsection