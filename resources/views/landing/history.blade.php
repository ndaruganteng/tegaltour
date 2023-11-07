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
                            @if($p->status_perjalanan == 3 || $p->status == 4)                                                   
                                <div class="card mt-3" >
                                    <div class="row g-0">
                                        <div class="col-md-4 p-3">
                                            <img src="{{asset('storage/image/wisata/'.$p->image)}}"  class="img-thumbnail" style="width: 100%;  height:100%" />
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">Wisata : {{$p->nama_wisata}}</h5>
                                                <p class="card-text">Nama Pemesan: {{$p->nama_pengguna}}</p>
                                                <p class="card-text">Tanggal Pemesanan : {{ \Carbon\Carbon::parse($p->date)->locale('id')->isoFormat('dddd, D MMMM Y') }}</p>
                                                <p class="card-text">Tanggal Berangkat : {{ \Carbon\Carbon::parse($p->tanggal)->locale('id')->isoFormat('dddd, D MMMM Y') }}</p>                                      
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <p class="card-text">Jumlah Orang : {{$p->jumlah_orang}}</p>
                                                <p class="card-text">Harga/Orang : Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                                                <p class="card-text">Harga Total : Rp {{ number_format($p->hargatotal, 0, ',', '.') }}</p>
                                                @if($p->status_perjalanan == 3)
                                                    <p class="card-text" >Status Perjalanan : <span class="badge badge-success">Selesai</span> </p>       
                                                @elseif($p->status == 4)
                                                    <p class="card-text" >Status Pemesanan : <span class="badge badge-danger">Dibatalkan</span> </p>
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