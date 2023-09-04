@extends('landing.layouts.app')
@section('content')

<div class="content-wrapper">

    <!-- Carousel wrapper -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active c-item">
            <img class="d-block w-100 c-img" src="https://jatenglive.com/images/news/Situs-Sejarah-Museum-Semedo-Sudah-Buka-Untuk-Umum-news20221021-1.png" alt="First slide">
          </div>
          <div class="carousel-item c-item">
            <img class="d-block w-100 c-img" src="https://panturapost.com/wp-content/uploads/2022/12/IMG-20221210-WA0065.jpg" alt="Second slide">
          </div>
          <div class="carousel-item c-item">
            <img class="d-block w-100 c-img" src="https://public.urbanasia.com/images/post/2021/07/26/1627287112-Pemandian-air-panas-Guci.-(Instagram-@info-wisata-guci-official).jpg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- end acrousel -->

    <!-- info-Panel -->
    <div class="container mt-5 " >
        <h1 class="text-center judul-date ">Cari Wisata Dengan Range Tanggal</h1>
        <div class="row justify-content-center">
            <div class="col-10 info-panel ">
                <form class="justify-content-center">
                    <div class="row">
                        <div class="col-md">
                            <!-- <div class="input-group date" id="start_date">
                                <input type="date" class="form-control" placeholder="Dari Tanggal">
                            </div> -->
                            <div class="form-outline ">
                                <input type="date" id="date" class="form-control" />
                                <label class="form-label" for="form2Example1">Dari Tanggal</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <!-- <div class="input-group date" id="end_date">
                                <input type="date" class="form-control" placeholder="Sampai Tanggal">
                            </div> -->
                            <div class="form-outline ">
                                <input type="date" id="date" class="form-control" />
                                <label class="form-label" for="form2Example1">Sampai Tanggal</label>
                            </div>
                        </div>
                        <div class="col-lg-2 ">
                            <button type="button" class="btn btn-dark tanggal btn-block" >Cari Tour</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end info-panel -->

    <!-- galery -->
    <section style="background-color: #F5F5F5;" class="s-wisata">
        <div class="container">
            <div class="row">
                @foreach($promotion as $item)
                <div class="col-md-12 col-lg-4 " data-aos="fade-right" data-aos-duration="1000" >
                    <div class="card bg-dark text-white text-center my-3">
                        <img src="{{asset('storage/image/promotion/'.$item->image_promotion)}}" class="card-img " alt="Stony Beach"  style="height:230px"/>
                        <div class="card-img-overlay">
                            <!-- <h5 class="card-title">Wisata Alam</h5>
                            <p class="card-text text-white">
                                This is a wider card with supporting text below as a natural lead-in to additional
                                content. This content is a little bit longer.
                            </p> -->
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- endgalery -->

    <!-- card -->
    <section class="t-terbaru">
        <div class="container tour-card">
            <h2 class=" fw-bold">Paket Wisata Terbaru </h2>
            <div class="row">
                @foreach($wisata as $item)  
                    <div class="col-md-12 col-lg-3">
                        <div class="card" data-aos="zoom-in"  data-aos-duration="500"  data-aos-delay="100">
                            <a href="/{{ ($item->id_wisata) }}#{{$item->namawisata}}" class="bg-image hover-zoom">
                                <img class="card-img-top" src="{{asset('storage/image/wisata/'.$item->image)}}"  alt="Card image cap w-100" style="height:180px">
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
                                    <p class="card-title">{{ $item->namawisata }}</p>
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
    </section>
    <!-- endcard -->

</div>


@endsection