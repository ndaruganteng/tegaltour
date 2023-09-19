@extends('landing.layouts.app')
@section('content')

<div class="content-wrapper">

    <div class="content cart">
        <div class="container">
            <h2 class="text-center fw-bold">Pesanan Saya</h2>
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-5">
                    <div class="col-lg-12">
                        <div class="card">
                            @if($pemesanan->isEmpty())
                                <h4 class="p-3 text-center"> Belum Ada Pesanan</h4> 
                            @else
                                @foreach($pemesanan as $p)
                                    @if($p->status == 2)
                                    <div class="row g-0 border border-top">
                                        <div class="col-md-6 p-3">
                                            <img src="#"  class="img-thumbnail" style="width: 100%; height: 100%;"/>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">Wisata : {{$p->namawisata}}</h5>
                                                <p class="card-text" >Nama : {{$p->namauser}}</p>
                                                <p class="card-text" >Tanggal Berangkat : {{$p->tanggalberangkat}}</p>
                                                <p class="card-text" >Jumlah Orang : {{$p->jumlahorang}}</p>
                                                <p class="card-text"  >Harga/pax : Rp {{$p->hargasatuan}}</p>
                                                <p class="card-text"  >Harga Total : Rp {{$p->hargatotal}}</p>
                                                @if($p->status == 2)
                                                    <p class="card-text" >Pembayaran : <span class="badge badge-success">Terkonfirmasi</span></p>
                                                @endif
                                                @if($p->status_perjalanan == null)
                                                <p class="card-text" >Status Perjalanan : <span class="badge badge-warning">Menunggu</span> </p>
                                                @elseif($p->status_perjalanan == 2)
                                                <p class="card-text" >Status Perjalanan : <span class="badge badge-info">Berangkat</span> </p>
                                                @elseif($p->status_perjalanan == 3)
                                                <p class="card-text" >Status Perjalanan : <span class="badge badge-success">Selesai</span> </p>
                                                @endif
                                                <div>
                                                    <button type="button"  class="btn btn-primary shadow-0 btn-sm" data-toggle="modal" data-target="#imagebuktiModal{{$p->id_pemesanan}}" data-whatever="@getbootstrap">
                                                        <i class="fa-solid fa-eye me-2"></i>Bukti Transfer
                                                    </button>
                                                    @if($p->status_perjalanan == null)
                                                    <button type="button" class="btn btn-dark btn-sm shadow-0 ">
                                                        <i class="fa-solid fa-download me-2"></i>Download invoice
                                                    </button>
                                                    @elseif($p->status_perjalanan == 3)
                                                    <button type="button" class="btn btn-info btn-sm shadow-0" data-mdb-toggle="modal" data-mdb-target="#ulasanModal"><i class="fa-solid fa-envelope me-2"></i>Beri Ulasan</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal ulasan -->
                                    <div class="modal fade" id="ulasanModal" tabindex="-1" aria-labelledby="ulasanModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Beri Ulasan</h5>
                                                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-outline mb-4">
                                                            <textarea class="form-control" id="form4Example3" rows="4"></textarea>
                                                            <label class="form-label" for="form4Example3">Message</label>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger shadow-0" data-mdb-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-black shadow-0">Kirim</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal ulasan -->
                                    <!-- modal bukti pembayaran -->
                                    <div class="modal fade" id="imagebuktiModal{{$p->id_pemesanan}}" tabindex="-1" role="dialog" aria-labelledby="imagebuktiModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imagebuktiModalLabel{{$p->id_pemesanan}}">Bukti Pembayaran</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{asset('storage/image/bukti-transfer/'.$p->bukti_pembayaran)}}"  class="img-thumbnail" style="width: 100%; height: 100%;"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal bukti pembayaran -->
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection