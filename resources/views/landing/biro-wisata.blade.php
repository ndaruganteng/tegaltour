@extends('landing.layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Jumbotron -->
    <div class="p-5 text-center bg-image tour" style="background-image: url('https://img.freepik.com/free-photo/top-view-hands-holding-notebook_23-2149617679.jpg?w=996&t=st=1702790309~exp=1702790909~hmac=c61a1f6c1df34889039b2399e2a2ace2331a6b02e4cf9b71bc4a69183c7f21d0'); 
         height: 300px">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3 ">Daftar Biro Wisata </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- end Jumbotron -->


    <div class="content-biro">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12" style="margin-top: 20px;">
                    <div class="d-flex justify-content-between">
                        <h2 class="fw-bold">Daftar Biro Wisata </h2>
                        <div>
                            <form action="{{ route('biro_search') }}">
                                <div class="input-group" style="width: 200px;">
                                    <div class="form-outline">
                                        <input type="text" name="search" class="form-control" />
                                        <label class="form-label" for="search">Cari Wisata </label>
                                    </div>
                                    <button type="submit" class="btn btn-dark shadow-0">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if(count($users) > 0)
                @foreach($users as $p)
                @if($p->role == 'mitra')
                <div class="col-md-12 col-lg-3">
                    <div class="card card-biro" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                        <div class="text-center mt-3">
                            <span class="badge badge-dark">Biro Wisata</span>
                        </div>
                        <div class="bg-image hover-overlay text-center p-3">
                            <img src="{{ asset('storage/image/user/' . $p->profile_picture) }}"
                                class=" img-biro rounded-circle border" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center" style="margin-top: -20px; font-size: 16px;">
                                {{$p->nama_lengkap}} <i class="fas fa-check-circle" style="color: #1fbd00"></i></h5>
                            <div class="text-center mt-3">
                                <a href="detail-biro-wisata/{{ ($p->id) }}#{{$p->nama_lengkap}}"
                                    class="btn d-block btn-dark shadow-0 rounded-lg"
                                    style="text-transform: lowercase;">Lihat Produk</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @else
                <div class="col-md-12">
                    <p class="text-center mt-3">Biro Wisata tidak ditemukan.</p>
                </div>
                @endif
            </div>
        </div>
    </div>


</div>

@endsection