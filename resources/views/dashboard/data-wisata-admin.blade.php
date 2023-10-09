@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Data Wisata </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
              <li class="breadcrumb-item active"> Data wisata</li>
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
                                <h3 class="card-title">Data Wisata</h3>
                                <div class="card-tools">
                                    <form action="{{route('wisata.search_data_wisata_admin') }}" method="GET">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="search_data_wisata_admin" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>     
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Nama Wisata</th>
                                        <th>Nama Mitra</th>
                                        <th>Kategori</th>
                                        <th>harga</th>
                                        
                                    </tr>
                                </thead>
                                @foreach($wisata as $p)
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{asset('storage/image/wisata/'.$p->image)}}" alt="wisata" style="width:100px">
                                        </td>
                                        <td>{{ $p->namawisata}}</td>
                                        <td>{{ $p->nama}}</td>
                                        <td>
                                            <span class="badge badge-dark">{{ $p->kategori}}</span>
                                        </td>
                                        
                                        <td>Rp {{ $p->harga}}</td>
                                        <td>
                                            <a href="/detail-data-wisata-admin/{{($p->id_wisata)}}#{{$p->namawisata}}" class="btn btn-primary btn-sm" >
                                                <i class="fas fa-eye"></i>
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

</div>

@endsection