@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>Paket Wisata </h1>
                    <a href="{{route('tambah-data-wisata.index')}}"  class="btn bg-dark btn-sm">
                        <i class="fa-solid fa-plus mr-1"></i>
                        Tambah Paket Wisata
                    </a>
                </div>
            </div>
        </div>
      </div>
    </div>

     <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-dark card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Paket Wisata Aktif</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Paket Wisata Non Aktif</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="table-responsive">
                                        <table id="wisataaktif-table" class="table table-striped table-bordered text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Nama Paket Wisata</th>
                                                    <th>Tanggal Berangkat</th>
                                                    <th>Kategori</th>
                                                    <th >harga/Orang</th>                                                    
                                                    <th>Ulasan </th>
                                                    <th>Aksi</th>
                                                    <th>Status Wisata</th>
                                                </tr>
                                            </thead>                            
                                            <tbody>
                                                @foreach($wisata as $p)
                                                    @if($p->status_wisata == null)
                                                        <tr>
                                                            <td>
                                                                <img src="{{asset('storage/image/wisata/'.$p->image)}}" alt="wisata" style="width:100px">
                                                            </td>
                                                            <td>{{ $p->namawisata}}</td>
                                                            <td style="word-wrap: break-word; max-width: 50px;">{{ \Carbon\Carbon::parse($p->tanggalberangkat)->locale('id')->isoFormat('dddd, D MMMM Y') }}</td>
                                                            <td>
                                                                <span class="badge badge-dark">{{ $p->kategori}}</span>
                                                            </td>
                                                            <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>

                                                            <td>
                                                                <a  href="/ulasan-wisata/{{$p->id_wisata}}" class="btn btn-info btn-sm">
                                                                    Ulasan
                                                                </a>
                                                            </td>
                                                            <td style="word-wrap: break-word; max-width: 100px;">
                                                                <a href="/detail-data-wisata/{{($p->id_wisata)}}#{{$p->namawisata}}" class="btn btn-primary btn-sm my-1" >
                                                                    <i class="fas fa-eye me-2"></i> Detail
                                                                </a>
                                                                <a href="/data-wisata/edit/{{ $p->id_wisata }}">
                                                                    <button class="btn btn-warning btn-sm my-1">
                                                                        <i class="fas fa-edit me-2"></i> Edit
                                                                    </button>
                                                                </a>
                                                                <a href="/data-wisata/hapus/{{ $p->id_wisata }}" class="btn btn-danger btn-sm deletewisata my-1" id="deletwisata">
                                                                    <i class="fas fa-trash me-2"></i> Hapus
                                                                </a>
                                                            </td>
                                                            <td>
                                                                @if($p->status_wisata == null)
                                                                    <form  method="post" action="{{route('nonaktif', ['id_wisata'=> $p->id_wisata])}}">
                                                                        @csrf
                                                                        @method('put')
                                                                        <p>Aktif</p>
                                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                                            NonAktif
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    <form  method="post" action="{{route('wisataaktif', ['id_wisata'=> $p->id_wisata])}}">
                                                                        @csrf
                                                                        @method('put')
                                                                        <p>Non Aktif</p>
                                                                        <button type="submit" class="btn btn-success btn-sm">
                                                                            Aktifkan
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>                            
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                    <div class="table-responsive">
                                        <table id="wisatanonaktif-table" class="table table-striped table-bordered text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th style="word-wrap: break-word; max-width: 80px;">Nama Paket Wisata</th>
                                                    <th style="word-wrap: break-word; max-width: 80px;">Tanggal Berangkat</th>
                                                    <th style="word-wrap: break-word; max-width: 30px;">Kategori</th>
                                                    <th >harga/Orang</th>                                                    
                                                    <th style="word-wrap: break-word; max-width: 50px;">Ulasan </th>
                                                    <th style="word-wrap: break-word; max-width: 200px;">Aksi</th>
                                                    <th style="word-wrap: break-word; max-width: 70px;">Status Wisata</th>
                                                </tr>
                                            </thead>                            
                                            <tbody>
                                                @foreach($wisata as $p)
                                                    @if($p->status_wisata == 2)
                                                        <tr>
                                                            <td>
                                                                <img src="{{asset('storage/image/wisata/'.$p->image)}}" alt="wisata" style="width:50px">
                                                            </td>
                                                            <td>{{ $p->namawisata}}</td>
                                                            <td>{{ \Carbon\Carbon::parse($p->tanggalberangkat)->locale('id')->isoFormat('dddd, D MMMM Y') }}</td>
                                                            <td>
                                                                <span class="badge badge-dark">{{ $p->kategori}}</span>
                                                            </td>
                                                            <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>

                                                            <td>
                                                                <a href="/ulasan-wisata/{{$p->id_wisata}}" class="btn btn-info btn-sm">
                                                                    Ulasan
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="/detail-data-wisata/{{($p->id_wisata)}}#{{$p->namawisata}}" class="btn btn-primary btn-sm my-1" >
                                                                    <i class="fas fa-eye me-2"></i> Detail
                                                                </a>
                                                                <a href="/data-wisata/edit/{{ $p->id_wisata }}">
                                                                    <button class="btn btn-warning btn-sm my-1">
                                                                        <i class="fas fa-edit me-2"></i> Edit
                                                                    </button>
                                                                </a>
                                                                <a href="/data-wisata/hapus/{{ $p->id_wisata }}" class="btn btn-danger btn-sm deletewisata my-1" id="deletwisata">
                                                                    <i class="fas fa-trash me-2"></i> Hapus
                                                                </a>
                                                            </td>
                                                            <td>
                                                                @if($p->status_wisata == null)
                                                                    <form  method="post" action="{{route('nonaktif', ['id_wisata'=> $p->id_wisata])}}">
                                                                        @csrf
                                                                        @method('put')
                                                                        <p>Aktif</p>
                                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                                            NonAktif
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    <form  method="post" action="{{route('wisataaktif', ['id_wisata'=> $p->id_wisata])}}">
                                                                        @csrf
                                                                        @method('put')
                                                                        <p>Non Aktif</p>
                                                                        <button type="submit" class="btn btn-success btn-sm">
                                                                            Aktifkan
                                                                        </button>
                                                                    </form>
                                                                @endif
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




@endsection