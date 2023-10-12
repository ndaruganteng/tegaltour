@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Status Perjalanan </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
              <li class="breadcrumb-item active"> Status Perjalanan </li>
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
                                <h3 class="card-title">Status Perjalanan</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th>Nama Konsumen</th>
                                        <th>Nama Wisata</th>
                                        <th>Tanggal Berangkat</th>
                                        <th>Jumlah Orang</th>
                                        <th>Status Perjalanan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @foreach($pemesanan as $p)
                                    @if($p->status == 2)
                                    <tbody>
                                        <tr>
                                            <td>{{$p->nama_pengguna}}</td>
                                            <td>{{$p->nama_wisata}}</td>     
                                            <td>{{ $p->tanggal}}</td>
                                            <td>{{ $p->jumlah_orang}}</td>
                                            <td>
                                                @if($p->status_perjalanan == null)
                                                    <div class="badge badge-warning">Menunggu </div>
                                                @elseif($p->status_perjalanan == 2)
                                                    <div class="badge badge-info">Berangkat </div>
                                                @elseif($p->status_perjalanan == 3)
                                                    <div class="badge badge-success">Selesai</div>                          
                                                @endif
                                            </td>   
                                            <td>
                                                @if($p->status_perjalanan == null)
                                                    <form  method="post" action="{{route('berangkat', ['id_pemesanan'=> $p->id_pemesanan])}}">
                                                        @csrf
                                                        @method('put')
                                                        <button type="submit" class="btn btn-info btn-sm mx-1">
                                                            <i class="fa-solid fa-car-side mr-2"></i>Berangkat
                                                        </button>
                                                    </form>
                                                @elseif($p->status_perjalanan == 2)
                                                    <form  method="post" action="{{route('selesai', ['id_pemesanan'=> $p->id_pemesanan])}}">
                                                        @csrf
                                                        @method('put')
                                                        <button type="submit" class="btn btn-success btn-sm mx-1">
                                                            <i class="fa-solid fa-check-to-slot mr-2"></i>Selesai
                                                        </button>
                                                    </form>
                                                @elseif($p->status_perjalanan == 3)                               
                                                    <a href="/data-order/hapus/{{ $p->id_pemesanan }}">
                                                        <button type="button"  class="btn btn-danger btn-sm mx-1">
                                                            <i class="fa-solid fa-trash mr-2"></i> Hapus
                                                        </button>
                                                    </a>                                
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>                                       
                                    @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection