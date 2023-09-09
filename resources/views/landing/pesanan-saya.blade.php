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
                            @foreach($pemesanan as $p)
                                @if($p->status == 2)
                                <div class="row g-0 border border-top">
                                    <div class="col-md-6 p-3">
                                        <a href="{{route('wisata.index')}}">
                                            <img src="images/home/bromo.jpg"  class="img-thumbnail" style="width: 100%; height: 100%;"/>
                                        </a>
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
                                            <p class="card-text" >Status Perjalanan : <span class="badge badge-warning">Menunggu</span> </p>
                                            <div>
                                                <button type="button" class="btn btn-dark btn-sm shadow-0 me-2"><i class="fa-solid fa-download me-2"></i>Download invoice</button>
                                                <button type="button" class="btn btn-info btn-sm shadow-0" data-mdb-toggle="modal" data-mdb-target="#ulasanModal"></i>Beri Ulasan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="ulasanModal" tabindex="-1" aria-labelledby="ulasanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Beri Ulasan</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <!-- <div class="form-outline mb-4">
                            <input type="text" id="form4Example1" class="form-control" />
                            <label class="form-label" for="form4Example1">Name</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="email" id="form4Example2" class="form-control" />
                            <label class="form-label" for="form4Example2">Email address</label>
                        </div> -->
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

</div>


@endsection