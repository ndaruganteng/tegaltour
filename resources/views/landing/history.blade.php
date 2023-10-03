@extends('landing.layouts.app')
@section('content')

<div class="content-wrapper">
    <div class="content cart">
        <div class="container">
            <h2 class="text-center fw-bold">History Pesanan</h2>
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-3">
                    <div class="col-lg-12">
                    @if($pemesanan->isEmpty())
                    <h4 class="p-3 text-center">History Pemesanan Kosong</h4>
                    @else   
                        @foreach($pemesanan as $p)
                            @if($p->status_perjalanan == 3)                                                   
                                <div class="card mt-3" >
                                    <div class="row g-0">
                                        <div class="col-md-4 p-3">
                                            <img src="{{asset('storage/image/wisata/'.$p->image)}}"  class="img-thumbnail" style="width: 100%;  height:100%" />
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">Wisata : {{$p->nama_wisata}}</h5>
                                                <p class="card-text">Nama : {{$p->nama_pengguna}}</p>
                                                <p class="card-text">Tanggal Pemesanan : {{$p->date}}</p>
                                                <p class="card-text">Tanggal Berangkat : {{$p->tanggal}}</p>
                                                                                        
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <p class="card-text">Jumlah Orang : {{$p->jumlah_orang}}</p>
                                                <p class="card-text">Harga/pax : Rp {{$p->harga}}</p>
                                                <p class="card-text">Harga Total : Rp {{$p->hargatotal}}</p>
                                                @if($p->status_perjalanan == 3)
                                                <p class="card-text" >Status Perjalanan : <span class="badge badge-success">Selesai</span> </p>
                                                @endif                                          
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif            
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection