@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">
    
    <div id="{{$detail_data_wisata_admin->namawisata}}">
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

        <div class="content">
            <div class="container-fluid mt-3">
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <img src="{{asset('storage/image/wisata/'.$detail_data_wisata_admin->image)}}" class="img-thumbnail" style="width: 100%;" alt="Wild Landscape"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <p class="card-text">Nama Paket Wisata : {{ $detail_data_wisata_admin->namawisata }}</p>
                                <p class="card-text">Kategori : {{ $detail_data_wisata_admin->kategori }}</p>
                                <p class="card-text">Durasi : {{ $detail_data_wisata_admin->durasi }}</p>
                                <p class="card-text">Lokasi : {{ $detail_data_wisata_admin->lokasi }}</p>
                                <p class="card-text">Harga/Orang : Rp {{ number_format($detail_data_wisata_admin->harga, 0, ',', '.') }}</p>
                                <p class="card-text">Titik Kumpul : {{ $detail_data_wisata_admin->titikkumpul }}</p>
                                <p class="card-text">Jam Berangkat : {{ $detail_data_wisata_admin->jamberangkat }} WIB</p>
                                <p class="card-text">Tanggal Berangkat : {{ \Carbon\Carbon::parse($detail_data_wisata_admin->tanggalberangkat)->locale('id')->isoFormat('dddd, D MMMM Y') }}</p>
                                <a type="button" href="{{ $detail_data_wisata_admin->linklokasi }}" target="_blank" class="btn btn-dark btn-sm  shadow-0 me-2"><i class="fa-solid fa-location-dot mr-2"></i>Link Lokasi</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <p class="card-text">Deskripsi : {!! $detail_data_wisata_admin->deskripsi !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <p class="card-text">Fasilitas : {!! $detail_data_wisata_admin->fasilitas !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection