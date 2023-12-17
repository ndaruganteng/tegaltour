@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
            <h1 class="m-0">Paket Wisata </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
              <li class="breadcrumb-item active"> Paket wisata</li>
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
                                <table id="paket-table" class="table table-striped table-bordered text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama Mitra</th>
                                            <th>Image</th>
                                            <th>Nama Paket Wisata</th>
                                            <th>Tanggal Berangkat</th>
                                            <th>Kategori</th>
                                            <th>Status Wisata</th>
                                            <th>harga/Orang</th>
                                            <th>Aksi</th>                           
                                        </tr>
                                    </thead>        
                                    <tbody>
                                        @foreach($wisata as $p)
                                            <tr>
                                                <td>{{ $p->nama}}</td>
                                                <td>
                                                    <img src="{{asset('storage/image/wisata/'.$p->image)}}" alt="wisata" style="width:70px">
                                                </td>
                                                <td>{{ $p->namawisata}}</td>
                                                <td>{{ \Carbon\Carbon::parse($p->tanggalberangkat)->locale('id')->isoFormat('dddd, D MMMM Y') }}</td>
                                                <td>
                                                    <span class="badge badge-dark">{{ $p->kategori}}</span>
                                                </td>                                         
                                                <td>
                                                    @if($p->status_wisata == null)
                                                    <span class="badge badge-success">Aktif</span>
                                                    @elseif($p->status_wisata == 2)
                                                    <span class="badge badge-danger">Non Aktif</span>
                                                    @endif
                                                </td>                                         
                                                <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                                                <td>
                                                    <a href="/detail-data-wisata-admin/{{($p->id_wisata)}}#{{$p->namawisata}}" class="btn btn-primary btn-sm" >
                                                        <i class="fas fa-eye"></i>
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

</div>

@endsection