@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Data Order</h3>
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
                                        <th>Bukti Tf</th>
                                        <th>Nama Wisata</th>
                                        <th>Nama Konsumen</th>
                                        <th>Tanggal Berangkat</th>
                                        <th>Jumlah Orang</th>
                                        <th>Harga/Pax</th>
                                        <th>Harga Total</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @foreach($pemesanan as $p)
                                    <tbody>
                                        <tr>
                                            <td>
                                                @if($p->bukti_pembayaran)
                                                    <a href="#" data-toggle="modal" data-target="#buktiModal{{$p->id_pemesanan}}" data-whatever="@getbootstrap">
                                                        <img src="{{ asset('storage/image/bukti-transfer/' . $p->bukti_pembayaran) }}" alt="wisata" style="width: 50px;">
                                                    </a>
                                                @else
                                                    <p class="p-3 text-center">Bukti Transfer Kosong</p>
                                                @endif
                                            </td>
                                            
                                            <td>{{$p->nama_wisata}}</td>
                                            <td>{{$p->nama_pengguna}}</td>
                                            <td>{{ $p->tanggal}}</td>
                                            <td>{{ $p->jumlah_orang}}</td>
                                            <td>Rp.{{$p->harga}}</td>
                                            <td>Rp.{{$p->hargatotal}}</td>
                                            <td>
                                                @if($p->status == null)
                                                    <div class="badge badge-warning">Belum disetuji </div>
                                                @else($p->status == 2)
                                                    <div class="badge badge-success"> Disetuji</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if($p->status == null)
                                                    <form  method="post" action="{{route('konfirmasi', ['id_pemesanan'=> $p->id_pemesanan])}}">
                                                    @csrf
                                                    @method('put')
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        <i class="fa-solid fa-check"></i>
                                                    </button>
                                                </form>
                                                @else
                                                    <a href="/data-order/hapus/{{ $p->id_pemesanan }}">
                                                        <button type="button"  class="btn btn-danger btn-sm">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!-- modal bukti -->
                                    <div class="modal fade" id="buktiModal{{$p->id_pemesanan}}" tabindex="-1" role="dialog" aria-labelledby="buktiModalLabel{{$p->id_pemesanan}}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="buktiModalLabel">Bukti Transfer</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class=" text-center">
                                                        <img src="{{asset('storage/image/bukti-transfer/'.$p->bukti_pembayaran)}}"  alt="wisata" class="img-fluid"/>   
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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



</div>


@endsection