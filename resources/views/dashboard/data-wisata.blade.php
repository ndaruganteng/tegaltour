@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Paket Wisata </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Paket wisata</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div class="card-tools">      
                                    <form action="{{route('wisata.search_data_wisata') }}" method="GET">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="search_data_wisata" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>                                
                                </div>
                                <a href="{{route('tambah-data-wisata.index')}}"  class="btn bg-dark btn-sm">
                                    <i class="fa-solid fa-plus mr-1"></i>
                                    Tambah Paket Wisata
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Nama Paket Wisata</th>
                                        <th>Kategori</th>
                                        <th>harga/Orang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @foreach($wisata as $p)
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{asset('storage/image/wisata/'.$p->image)}}" alt="wisata" style="width:100px">
                                        </td>
                                        <td>{{ $p->namawisata}}</td>
                                        <td>{{ $p->kategori}}</td>
                                        <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="/detail-data-wisata/{{($p->id_wisata)}}#{{$p->namawisata}}" class="btn btn-primary btn-sm" >
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="/data-wisata/edit/{{ $p->id_wisata }}">
                                                <button class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="/data-wisata/hapus/{{ $p->id_wisata }}" class="btn btn-danger btn-sm deletewisata" id="deletwisata">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const deleteButtons = document.querySelectorAll('.deletewisata');
        deleteButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                event.preventDefault(); 

                Swal.fire({
                    title: 'Konfirmasi Hapus Paket Wisata ',
                    text: 'Apakah Anda yakin ingin menghapus Paket Wisata ini?',
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

</div>

@endsection