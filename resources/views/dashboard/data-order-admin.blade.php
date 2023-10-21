@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0"> Data Order </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
              <li class="breadcrumb-item active"> Data Order</li>
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
                        <div class="card-body">
                            <table id="orderadmin-table" class="table table-striped table-bordered table-responsive text-center" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Mitra</th>
                                        <th>Nama Paket Wisata</th>
                                        <th>Nama Pemesan</th>
                                        <th>Status Perjalalanan</th>
                                        <th>Status Pemesanan</th>
                                        <th>Tanggal Berangkat</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Jumlah Orang</th>
                                        <th>Harga/Orang</th>
                                        <th>Harga Total</th>
                                    </tr>
                                </thead>  
                                <tbody>
                                    @foreach($pemesanan as $p)
                                        <tr>                                           
                                            <td>{{$p->namamitra}}</td>
                                            <td>{{$p->nama_wisata}}</td>
                                            <td>{{$p->nama_pengguna}}</td>
                                            <td>
                                                @if($p->status_perjalanan == null)
                                                <p class="card-text" > <span class="badge badge-warning">Menunggu</span> </p>
                                                @elseif($p->status_perjalanan == 2)
                                                <p class="card-text" ><span class="badge badge-info">Berangkat</span> </p>
                                                @elseif($p->status_perjalanan == 3)
                                                <p class="card-text" ><span class="badge badge-success">Selesai</span> </p>
                                                @endif
                                            </td>
                                            <td>
                                                @if($p->status == null)
                                                    <div class="badge badge-warning">Belum disetuji </div>
                                                @else($p->status == 2)
                                                    <div class="badge badge-success"> Dikonfirmasi</div>
                                                @endif
                                            </td>
                                            <td>{{ $p->tanggal}}</td>
                                            <td>{{ $p->date}}</td>
                                            <td>{{ $p->jumlah_orang}}</td>
                                            <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                                            <td>Rp {{ number_format($p->hargatotal, 0, ',', '.') }}</td>
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



@endsection