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
                <img class="d-block w-100 c-img"
                    src="https://jatenglive.com/images/news/Situs-Sejarah-Museum-Semedo-Sudah-Buka-Untuk-Umum-news20221021-1.png"
                    alt="First slide">
            </div>
            <div class="carousel-item c-item">
                <img class="d-block w-100 c-img"
                    src="https://pantainesia.com/wp-content/uploads/2021/01/Pantai-Alam-Indah-Tegal.jpg"
                    alt="Second slide">
            </div>
            <div class="carousel-item c-item">
                <img class="d-block w-100 c-img"
                    src="https://public.urbanasia.com/images/post/2021/07/26/1627287112-Pemandian-air-panas-Guci.-(Instagram-@info-wisata-guci-official).jpg"
                    alt="Third slide">
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
            <div class="col-12 info-panel ">
                <form class="justify-content-center" action="{{route('wisata.search_date') }}" method="GET">
                    <div class="row" date-rangepicker>
                        <div class="col-md">
                            <div class="form-outline ">
                                <input type="date" name="start-date" class="form-control" min="{{ date('Y-m-d') }}" />
                                <label class="form-label" for="stardate">Dari Tanggal</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-outline ">
                                <input type="date" name="end-date" class="form-control" min="{{ date('Y-m-d') }}" />
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
                <div class="col-md-12 col-lg-4 " data-aos="fade-right" data-aos-duration="500">
                    <div class="card bg-dark text-white text-center my-3">
                        <img src="images/home/g2.jpg" class="card-img " alt="Stony Beach" />
                        <div class="card-img-overlay">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 " data-aos="fade-up" data-aos-duration="1000">
                    <div class="card bg-dark text-white text-center my-3">
                        <img src="images/home/g3.jpg" class="card-img " alt="Stony Beach" />
                        <div class="card-img-overlay">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 " data-aos="fade-left" data-aos-duration="1500">
                    <div class="card bg-dark text-white text-center my-3">
                        <img src="images/home/g1.jpg" class="card-img " alt="Stony Beach" />
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
                <div class="#">
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
                @if($item->status_wisata == null)
                <div class="col-md-12 col-lg-3">
                    <div class="card" data-aos="fade-left" data-aos-duration="500" data-aos-delay="100">
                        <a href="/{{$item->id_wisata}}/{{$item->slug}}" class="bg-image hover-zoom">
                            <img class="card-img-top" src="{{asset('storage/image/wisata/'.$item->image)}}"
                                alt="Card image cap " style="height:180px">
                        </a>
                        <div class="card-body">
                            <span class="badge badge-dark">{{ $item->kategori }}</span>
                            <a href="/{{ ($item->id_wisata) }}/{{$item->slug}}" class="mt-2">
                                <p class="card-title">{{ $item->namawisata }}</p>
                            </a>
                            <div class="d-flex align-items-center ">
                                <span class="rating d-flex align-items-center">
                                    @for ($i = 1; $i <= 5; $i++) @if ($i <=round($item->getAverageRating()))
                                        <i class="fa fa-star checked"></i>
                                        @else
                                        <i class="fa fa-star"></i>
                                        @endif
                                        @endfor
                                </span>
                                <div class="ml-2 rating-text align-middle">
                                    {{ number_format($item->getAverageRating(), 1, '.', '') }}/5
                                </div>
                            </div>
                            <h3 class="card-text">Rp {{ number_format($item->harga, 0, ',', '.') }} <span
                                    style="color: grey;">/orang</span></h3>
                            <h5 class="text-center" style="font-size: 12px; margin-top: 14px;">-
                                {{ $item->nama_lengkap}} -
                            </h5>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach

            </div>
        </div>
    </section>
    <!-- endcard -->


    <style>
    /* Di dalam stylesheet Anda */
    .rating {
        display: flex;
        align-items: center;
        font-size: 18px;
        /* Sesuaikan ukuran bintang */
    }

    .rating>i {
        margin: 0 2px;
        font-size: 0.9em;
        /* Sesuaikan ukuran bintang */
    }

    .checked {
        color: #f7d943;
        /* Warna yang sesuai dengan nilai tertinggi */
    }

    .rating-text {
        line-height: 1.2;
        /* Sesuaikan dengan kebutuhan */
        font-size: 14px;
    }

    .align-middle {
        vertical-align: middle;
        /* Menyusun teks agar sejajar dengan bintang */
    }
    </style>

</div>

@endsection