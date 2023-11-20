@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div id="{{$data_wisata_detail->namawisata}}">

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

        <div class="content">
            <div class="container-fluid mt-3">
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                            <img src="{{asset('storage/image/wisata/'.$data_wisata_detail->image)}}" class="img-thumbnail" style="width:100%" alt="Wild Landscape"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <p class="card-text">Nama Wisata : {{ $data_wisata_detail->namawisata }}</p>
                                <p class="card-text">Kategori : {{ $data_wisata_detail->kategori }}</p>
                                <p class="card-text">Durasi : {{ $data_wisata_detail->durasi }}</p>
                                <p class="card-text">Lokasi : {{ $data_wisata_detail->lokasi }}</p>
                                <p class="card-text">Harga/Orang : Rp {{ number_format($data_wisata_detail->harga, 0, ',', '.') }}</p>
                                <p class="card-text">Titik Kumpul : {{ $data_wisata_detail->titikkumpul }}</p>
                                <p class="card-text">Tanggal Berangkat : {{ \Carbon\Carbon::parse($data_wisata_detail->tanggalberangkat)->locale('id')->isoFormat('dddd, D MMMM Y') }}</p>
                                <a type="button" href="{{ $data_wisata_detail->linklokasi }}" target="_blank" class="btn btn-dark btn-sm d-block shadow-0 me-2"><i class="fa-solid fa-location-dot mr-2"></i>Link Lokasi</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <p class="card-text">Deskripsi : {!! $data_wisata_detail->deskripsi !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <p class="card-text">Fasilitas : {!! $data_wisata_detail->fasilitas !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

</div>

@endsection