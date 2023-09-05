@extends('landing.layouts.app')
@section('content')

<div class="content-wrapper">

    <!-- Jumbotron -->
    <div class="p-5 text-center bg-image tour" style="background-image: url('https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1171&q=80'); 
         height: 500px">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3 ">Daftar Wisata </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- end Jumbotron -->

    <!-- info-Panel -->
    <div class="container mt-5">
        <h1 class="text-center judul-date ">Cari Wisata Dengan Range Tanggal</h1>
        <div class="row justify-content-center">
            <div class="col-10 info-panel" >
                <form class="justify-content-center" action="{{route('wisata.search_date') }}" method="GET">
                    <div class="row" date-rangepicker>
                        <div class="col-md">
                            <div class="form-outline ">
                                <input type="date" name="start-date" class="form-control" />
                                <label class="form-label" for="stardate">Dari Tanggal</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-outline ">
                                <input type="date" name="end-date" class="form-control" />
                                <label class="form-label" for="end-date">Sampai Tanggal</label>
                            </div>
                        </div>
                        <div class="col-lg-2 ">
                            <button type="submit" class="btn btn-dark tanggal btn-block">Cari Tour</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end info-panel -->

    <!-- card -->
    <div class="container mt-5 mb-5 tour-card ">
        <div class="row">
            <div class="col md-12 col-lg-3">
                <div class="col-lg-12">
                    <div class="card shadow-0 border rounded-0">
                        <div class="card-header fs-5 text-center">FILTER</div>
                        <div class="card-body">
                            <h5 class="mb-3 card-title">Kategori</h5>
                            <div class="form-check mb-3">
                                <label class="form-check-label " for="flexCheckDefault">Wisata Alam</label>
                                <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault" />
                            </div>
                            <div class="form-check mb-3">
                                <label class="form-check-label " for="flexCheckDefault">Wisata Keluarga</label>
                                <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault" />
                            </div>
                            <div class="form-check mb-3">
                                <label class="form-check-label " for="flexCheckDefault">Wisata Religi</label>
                                <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault" />
                            </div>
                            <div class="form-check mb-3">
                                <label class="form-check-label " for="flexCheckDefault">Wisata Sejarah</label>
                                <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="col-lg-12 daftar-wisata">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>Daftar Wisata</h4>
                        </div>    
                        <div>
                            <form action="{{route('wisata.search') }}">
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
                        <!-- <div>
                            <div class="dropdown">
                                <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button"
                                    id="dropdownMenuLink" data-mdb-toggle="dropdown" aria-expanded="false">
                                    Rekomendasi
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">Direkomendasikan</a></li>
                                    <li><a class="dropdown-item" href="#">Harga (Rendah Ke Tinggi)</a></li>
                                    <li><a class="dropdown-item" href="#">Harga (Tinggi Ke Rendah)</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        @foreach($wisata as $item)              
                        <div class="col-md-12 col-lg-4">                     
                            <div class="card shadow-0 border border-2">
                                <a href="/{{ ($item->id_wisata) }}#{{$item->namawisata}}" class="bg-image hover-zoom">
                                    <img class="card-img-top" src="{{asset('storage/image/wisata/'.$item->image)}}" alt="Card image cap w-100"
                                        style="height:180px">
                                </a>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <span class="badge badge-dark">{{ $item->kategori }}</span>
                                        <div class="lokasi">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <small>{{ $item->lokasi }}</small>
                                        </div>
                                    </div>
                                    <a href="/{{ ($item->id_wisata) }}#{{$item->namawisata}}" class="mt-2">
                                        <p>{{ $item->namawisata }}</p>
                                    </a>
                                    <div class="d-flex justify-content-between">
                                        <div class="durasi">
                                            <i class="fa-regular fa-clock"></i>
                                            <small>{{ $item->durasi }}</small>
                                        </div>
                                        <h3 class="float-right">Rp {{ $item->harga }}</h3>
                                    </div>
                                </div>                      
                            </div>  
                        </div>  
                        @endforeach  
                    </div>
                </div>
                <div class="col-lg-12 pagination mt-4 ">
                    <div class="col-lg-12">
                        <div class="text-center">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end card -->

</div>

@endsection