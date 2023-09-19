@extends('dashboard.layouts.app')
@include('sweetalert::alert')
@section('content')


@if(auth()->user()->role == "admin")
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Selamat Datang {{ Auth::User()->nama_lengkap }} </h1>
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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>10</h3>
                <p>Request wisata</p>
              </div>
              <div class="icon">
              <i class="fa-solid fa-code-pull-request"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>10</h3>
                <p>Request Mitra</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-handshake"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning ">
              <div class="inner">
                <h3>44</h3>
                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-users"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>5</h3>
                <p>Kategori</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endif

@if(auth()->user()->role == "mitra")
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Selamat Datang {{ Auth::User()->nama_lengkap }} </h1>
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
              <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                      <h3>5</h3>
                      <p>Total Wisata</p>
                    </div>
                    <div class="icon">
                    <i class=" ion fa-solid fa-cart-shopping"></i>
                    </div>
                    <a href="{{ route('data-wisata.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="small-box bg-secondary">
                    <div class="inner">
                      <h3>3</h3>
                      <p>Rekening</p>
                    </div>
                    <div class="icon">
                      <i class="ion fa-solid fa-credit-card"></i>
                    </div>
                    <a href="{{ route('data-rekening.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                      <h3>0</h3>
                      <p>Pesanan Terkonfirmasi</p>
                    </div>
                    <div class="icon">
                      <i class="ion fa-solid fa-check"></i>
                    </div>
                    <a href="{{ route('data-order.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>0</h3>
                      <p>Pesanan Pending</p>
                    </div>
                    <div class="icon">
                      <i class="ion fa-solid fa-ban"></i>
                    </div>
                    <a href="{{ route('data-order.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
          </div>
        </div>
    </div>
</div>
@endif

@endsection