@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">
    <section id="{{$data_wisata_detail->namawisata}}">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="m-0 ">Detail Data Wisata</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item "><a href="{{ route('data-wisata.index') }}"> <i class="fa-solid fa-arrow-left mr-2"></i>Kembali</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 mt-3">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-md-6 p-3">
                                        <div>
                                            <img src="{{asset('storage/image/wisata/'.$data_wisata_detail->image)}}"  class="img-thumbnail" style="width: 100%; height: 100%;"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">Nama Wisata : {{ $data_wisata_detail->namawisata }}</h5>
                                            <p class="card-text">Kategori :{{ $data_wisata_detail->kategori }}</p>
                                            <p class="card-text">Durasi : {{ $data_wisata_detail->durasi }}</p>
                                            <p class="card-text">Lokasi : {{ $data_wisata_detail->lokasi }}</p>
                                            <p class="card-text">Harga : Rp {{ $data_wisata_detail->harga }}</p>
                                            <p class="card-text">Tanggal Berangkat : {{ $data_wisata_detail->tanggalberangkat}}</p>
                                            <p class="card-text">Deskripsi : {!! $data_wisata_detail->deskripsi !!}</p>
                                            <p class="card-text">Fasilitas : {!! $data_wisata_detail->fasilitas !!}</p>
                                            <div>
                                                <a type="button" href="{{ $data_wisata_detail->linklokasi }}" target="_blank" class="btn btn-dark btn-sm shadow-0 me-2"><i class="fa-solid fa-location-dot mr-2"></i>Link Lokasi</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="content">
            <div class="container mt-2">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card p-3">
                            <img src="{{asset('storage/image/wisata/'.$data_wisata_detail->image)}}" class="img-thumbnail" alt="Wild Landscape"/>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-3">Nama Wisata : {{ $data_wisata_detail->namawisata }}</h5>
                                        <p class="card-text">Kategori :{{ $data_wisata_detail->kategori }}</p>
                                        <p class="card-text">Durasi : {{ $data_wisata_detail->durasi }}</p>
                                        <p class="card-text">Lokasi : {{ $data_wisata_detail->lokasi }}</p>
                                        <p class="card-text">Harga : Rp {{ $data_wisata_detail->harga }}</p>
                                    </div>
                                    <div class="col-md-6">       
                                        <p class="card-text">Tanggal Berangkat : {{ $data_wisata_detail->tanggalberangkat}}</p>
                                        <p class="card-text">Deskripsi : {!! $data_wisata_detail->deskripsi !!}</p>
                                        <p class="card-text">Fasilitas : {!! $data_wisata_detail->fasilitas !!}</p>
                                    </div>
                                </div>
                                <a type="button" href="{{ $data_wisata_detail->linklokasi }}" target="_blank" class="btn btn-dark btn-sm d-block shadow-0 me-2"><i class="fa-solid fa-location-dot mr-2"></i>Link Lokasi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>

@endsection