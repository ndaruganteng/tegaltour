@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

@if(auth()->user()->role == "admin")
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard {{ Auth::User()->nama_lengkap }} </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Rp{{ number_format($totalPotongan) }}</h3>
                            <p>Total Pendapatan </p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-money-bill-wave"></i>
                        </div>
                        <a href="{{ route('pendapatan-admin.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $totalwisataadmin }}</h3>
                            <p>Data Paket Wisata</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-store"></i>
                        </div>
                        <a href="{{ route('data-wisata-admin.index') }}" class="small-box-footer">More
                            info
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="small-box bg-warning ">
                        <div class="inner">
                            <h3>{{ $totalUsers }} </h3>
                            <p>Data User</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <a href="{{ route('data-user.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="small-box bg-danger ">
                        <div class="inner">
                            <h3>{{ $totalKategori }} </h3>
                            <p>Data Kategori</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-list"></i>
                        </div>
                        <a href="{{ route('data-kategori.index') }}" class="small-box-footer">More info
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="small-box bg-info ">
                        <div class="inner">
                            <h3>{{ $totalRekeningadmin }} </h3>
                            <p>Data Rekening</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-credit-card"></i>
                        </div>
                        <a href="{{ route('data-rekening.index') }}" class="small-box-footer">More info
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3>{{ $totalPesananadmin }} </h3>
                            <p>Data Order</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <a href="{{ route('data-order-admin.index') }}" class="small-box-footer">More
                            info
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $totalRequestmitra }} </h3>
                            <p>Request Mitra</p>
                        </div>
                        <div class="icon">
                            <i class=" fa-regular fa-handshake"></i>
                        </div>
                        <a href="{{ route('request-mitra.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@else(auth()->user()->role == "mitra")
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard {{ Auth::User()->nama_lengkap }} </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                Rp {{ number_format($totalHargaPotong) }}
                            </h3>
                            <p>Total Pendapatan</p>
                        </div>
                        <div class="icon">
                            <i class="ion fa-solid fa-money-check-dollar"></i>
                        </div>
                        <a href="{{ route('pendapatan.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalWisata }}</h3>
                            <p>Total Paket Wisata</p>
                        </div>
                        <div class="icon">
                            <i class=" ion fa-solid fa-store"></i>
                        </div>
                        <a href="{{ route('data-wisata.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$totalOrder}}</h3>
                            <p>Data order</p>
                        </div>
                        <div class="icon">
                            <i class="ion fa-solid fa-cart-shopping"></i>
                        </div>
                        <a href="{{ route('data-order.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$totalStatusperjalan}}</h3>
                            <p>Status Perjalanan</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-car-side"></i>
                        </div>
                        <a href="{{ route('status-perjalanan.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endif

@endsection