@extends('landing.layouts.app')
@section('content')

<div class="content-wrapper">
    <section id="{{$detail_biro_wisata->nama_lengkap}}">
        <div class="content-detail-biro">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="d-flex justify-content-between">
                            <h3 class="text-center fw-bold">Detail Biro Wisata</h3>
                            <a href="{{route('biro-wisata.index')}}" class="">
                                <i class="fa-solid fa-arrow-left me-2"></i>
                                kembali
                            </a>        
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12 col-lg-12 ">
                        <div class="col-lg-12 ">                                     
                            <div class="card mt-3 shadow-0 border" >
                                <div class="row g-0">
                                    <div class="col-md-4 p-3 text-center">
                                        <img src="{{asset('storage/image/user/'.$detail_biro_wisata->profile_picture)}}"  class="img-thumbnail rounded-circle" style="width: 100px;  height:100px" />
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-body">
                                            <p class="card-text">Nama Biro Wisata : {{ $detail_biro_wisata->nama_lengkap }}</p>
                                            <p class="card-text">Email : {{ $detail_biro_wisata->email }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-body">
                                            <p class="card-text">Nomor Telepon : {{ $detail_biro_wisata->no_telepon }}</p>
                                            <p class="card-text">Alamat : {{ $detail_biro_wisata->alamat }}</p>                                      
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row tour-card mt-3">
                    @foreach($wisata as $item)
                        <div class="col-md-12 col-lg-3">
                            <div class="card">
                                <a href="/{{$item->id_wisata}}/{{$item->slug}}" class="bg-image hover-zoom">
                                    <img class="card-img-top" src="{{asset('storage/image/wisata/'.$item->image)}}"  alt="Card image cap " style="height:180px">
                                </a>        
                                <div class="card-body">
                                    <div class="d-flex justify-content-beetwen">
                                        <span class="badge badge-dark me-1">{{ $item->kategori }}</span>
                                        @if($item->status_wisata == null)
                                            <span class="badge badge-success ms-1">aktif</span>
                                        @elseif($item->status_wisata == 2)
                                        <span class="badge badge-danger ms-1">Nonaktif</span>
                                        @endif
                                    </div>
                                    
                                    <a href="/{{ ($item->id_wisata) }}/{{$item->slug}}" class="mt-2">
                                        <p class="card-title">{{ $item->namawisata }}</p>
                                    </a>
                                    <h3 class="card-text">Rp {{ number_format($item->harga, 0, ',', '.') }} <span style="color: grey;">/orang</span></h3>
                                    <div class="mt-2">
                                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>
</div>


@endsection