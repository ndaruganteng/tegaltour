@extends('landing.layouts.app')
@section('content')

<div class="content-wrapper">

    <!-- Carousel -->
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
            <img class="d-block w-100 c-img" src="https://pantainesia.com/wp-content/uploads/2021/01/Pantai-Alam-Indah-Tegal.jpg" alt="Second slide">
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
    <div class="container mt-5 ">
        <h1 class="text-center judul-date ">Cari Wisata Dengan Range Tanggal</h1>
        <div class="row justify-content-center">
            <div class="col-10 info-panel ">
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

    <!-- galery -->
    <section style="background-color: #F5F5F5;" class="s-wisata">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4 " data-aos="fade-right" data-aos-duration="500" >
                    <div class="card bg-dark text-white text-center my-3">
                        <img src="images/home/g1.jpg" class="card-img " alt="Stony Beach"  style="height:230px"/>
                        <div class="card-img-overlay">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 " data-aos="fade-up" data-aos-duration="1000" >
                    <div class="card bg-dark text-white text-center my-3">
                        <img src="images/home/g2.jpg" class="card-img " alt="Stony Beach"  style="height:230px"/>
                        <div class="card-img-overlay">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 " data-aos="fade-left" data-aos-duration="1500" >
                    <div class="card bg-dark text-white text-center my-3">
                        <img src="images/home/g3.jpg" class="card-img " alt="Stony Beach"  style="height:230px"/>
                        <div class="card-img-overlay">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- endgalery -->

    <!-- card -->
    <section class="t-terbaru">
        <div class="container tour-card">
            <div class="d-flex justify-content-between">
                <h2 class=" fw-bold">Paket Wisata </h2>
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
            </div>           
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
                                <h3 class="card-text">Rp {{ $item->harga }}</h3>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- endcard -->

    <section class="mb-5 invoice">
        <div class="container">
            <div class="text-center p-3 border" style="background-color: #F5F5F5;">
                <h3 class="">INVOICE</h3>
            </div>
            <div class="card kwitansi shadow-0 ">
                <div class="mt-5 mb-3">
                    <h6>Nama Biro : xxxxx</h6>
                    <h6>Tanggal Pemesanan : 09-10-23</h6>
                    <h6>Status Pembayaran : <span class="badge badge-success">Selesai</span> </h6>
                </div>
                <div class=" table-responsive">
                    <table class="table border text-center ">
                        <thead>
                          <tr>
                            <th scope="col">Wisata</th>
                            <th scope="col">Nama Pemebeli</th>
                            <th scope="col">Tanggal Berangkat</th>
                            <th scope="col">Jumlah Orang</th>
                            <th scope="col">Harga/pax</th>
                            <th scope="col">Harga Ttal</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Guci</td>
                            <td>Ndaru</td>
                            <td>11-10-23</td>
                            <td>5 Orang</td>
                            <td>Rp 100.000</td>
                            <td>Rp 500.000</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </section>

    <style>
        .invoice .h3{
            font-size: 10px;
            font-style: italic;
        }
    </style>

</div>


@endsection