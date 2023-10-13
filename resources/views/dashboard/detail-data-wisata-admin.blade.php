@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">
    <section id="{{$detail_data_wisata_admin->namawisata}}">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="m-0 ">Detail Paket Wisata</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item "><a href="{{ route('data-wisata-admin.index') }}"> <i class="fa-solid fa-arrow-left mr-2"></i>Kembali</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="content">
            <div class="container mt-2">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card p-3">
                            <img src="{{asset('storage/image/wisata/'.$detail_data_wisata_admin->image)}}" class="img-thumbnail" alt="Wild Landscape"/>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-3">Nama Wisata : {{ $detail_data_wisata_admin->namawisata }}</h5>
                                        <p class="card-text">Kategori :{{ $detail_data_wisata_admin->kategori }}</p>
                                        <p class="card-text">Durasi : {{ $detail_data_wisata_admin->durasi }}</p>
                                        <p class="card-text">Lokasi : {{ $detail_data_wisata_admin->lokasi }}</p>
                                        <p class="card-text">Harga : Rp {{ $detail_data_wisata_admin->harga }}</p>
                                    </div>
                                    <div class="col-md-6">       
                                        <p class="card-text">Tanggal Berangkat : {{ $detail_data_wisata_admin->tanggalberangkat}}</p>
                                        <p class="card-text">Deskripsi : {!! $detail_data_wisata_admin->deskripsi !!}</p>
                                        <p class="card-text">Fasilitas : {!! $detail_data_wisata_admin->fasilitas !!}</p>
                                    </div>
                                </div>
                                <a type="button" href="{{ $detail_data_wisata_admin->linklokasi }}" target="_blank" class="btn btn-dark btn-sm d-block shadow-0 me-2"><i class="fa-solid fa-location-dot mr-2"></i>Link Lokasi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="content">
            <div class="container-fluid mt-3">
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{asset('storage/image/wisata/'.$detail_data_wisata_admin->image)}}" class="img-thumbnail" style="width: 100%;" alt="Wild Landscape"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">Nama Paket Wisata : {{ $detail_data_wisata_admin->namawisata }}</p>
                                <p class="card-text">Kategori :{{ $detail_data_wisata_admin->kategori }}</p>
                                <p class="card-text">Durasi : {{ $detail_data_wisata_admin->durasi }}</p>
                                <p class="card-text">Lokasi : {{ $detail_data_wisata_admin->lokasi }}</p>
                                <p class="card-text">Harga : Rp {{ $detail_data_wisata_admin->harga }}</p>
                                <p class="card-text">Tanggal Berangkat : {{ $detail_data_wisata_admin->tanggalberangkat}}</p>
                                <a type="button" href="{{ $detail_data_wisata_admin->linklokasi }}" target="_blank" class="btn btn-dark btn-sm  shadow-0 me-2"><i class="fa-solid fa-location-dot mr-2"></i>Link Lokasi</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">Deskripsi : {!! $detail_data_wisata_admin->deskripsi !!}</p>
                                <p class="card-text">Fasilitas : {!! $detail_data_wisata_admin->fasilitas !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>

@endsection