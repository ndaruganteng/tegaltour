@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
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

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="perjalanan-table" class="table table-striped table-bordered text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama Pemesan</th>
                                            <th>Status Perjalanan</th>
                                            <th>Nama Wisata</th>
                                            <th>Tanggal Berangkat</th>
                                            <th>Jumlah Orang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>          
                                    <tbody>
                                        @foreach($pemesanan as $p)
                                            @if($p->status == 2)
                                                <tr>
                                                    <td>{{$p->nama_pengguna}}</td>
                                                    <td>
                                                        @if($p->status_perjalanan == null)
                                                            <div class="badge badge-warning">Menunggu </div>
                                                        @elseif($p->status_perjalanan == 2)
                                                            <div class="badge badge-info">Berangkat </div>
                                                        @elseif($p->status_perjalanan == 3)
                                                            <div class="badge badge-success">Selesai</div>                          
                                                        @endif
                                                    </td>  
                                                    <td>{{$p->nama_wisata}}</td>     
                                                    <td>{{ \Carbon\Carbon::parse($p->tanggal)->locale('id')->isoFormat('dddd, D MMMM Y') }}</td>
                                                    <td>{{ $p->jumlah_orang}}</td>   
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

@endsection