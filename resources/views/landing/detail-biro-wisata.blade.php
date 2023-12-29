@extends('landing.layouts.app')
@section('content')

<div class="content-wrapper">
    <section id="{{$detail_biro_wisata->nama_lengkap}}">
        <div class="content-detail-biro">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h3 class="text-center fw-bold">Produk Biro Wisata</h3>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 col-lg-12 ">
                        <div class="col-lg-12 ">
                            <div class="card mt-3 shadow-0 border border-2"
                                style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                <div class="row g-0">
                                    <div class="col-md-4 p-3 text-center">
                                        <img src="{{asset('storage/image/user/'.$detail_biro_wisata->profile_picture)}}"
                                            class="img-thumbnail rounded-circle" style="width: 100px;  height:100px;" />
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-body">
                                            <p class="card-text">Nama Biro Wisata :
                                                {{ $detail_biro_wisata->nama_lengkap }}</p>
                                            <p class="card-text">Email : {{ $detail_biro_wisata->email }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-body">
                                            <p class="card-text">Nomor Telepon : {{ $detail_biro_wisata->no_telepon }}
                                            </p>
                                            <p class="card-text">Alamat : {{ $detail_biro_wisata->alamat }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row tour-card mt-2">
                    @if($wisata->isEmpty())
                    <p class="text-center mt-5" style="font-size: 16px;">Paket Wisata belum ada.</p>
                    @else
                    @foreach($wisata as $item)
                    <div class="col-md-12 col-lg-3">
                        <div class="card shadow-0 border border-2" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                            <a href="/{{$item->id_wisata}}/{{$item->slug}}" class="bg-image hover-zoom">
                                <img class="card-img-top" src="{{asset('storage/image/wisata/'.$item->image)}}"
                                    alt="Card image cap " style="height:180px">
                            </a>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <span class="badge badge-dark">{{ $item->kategori }}</span>
                                    @if($item->status_wisata == null)
                                    <span class="badge badge-primary">aktif</span>
                                    @elseif($item->status_wisata == 2)
                                    <span class="badge badge-danger">NonAktif</span>
                                    @endif
                                </div>

                                <a href="/{{ ($item->id_wisata) }}/{{$item->slug}}" class="mt-2">
                                    <p class="card-title">{{ $item->namawisata }}</p>
                                </a>
                                <div class="d-flex align-items-center ">
                                    <div class="rating-container text-center d-flex align-items-center">
                                        @php
                                        $averageRating = $item->getAverageRating();
                                        $fullStars = floor($averageRating);
                                        $halfStar = $averageRating - $fullStars;
                                        @endphp

                                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$fullStars) <i
                                            class="fa fa-star checked"></i>
                                            @elseif ($i == ceil($averageRating) && $halfStar > 0)
                                            <i class="fa fa-star-half-alt checked"></i>
                                            @else
                                            <i class="fa fa-star"></i>
                                            @endif
                                            @endfor

                                            <span
                                                class="ml-2">({{ number_format($averageRating, 1, '.', '') }}/5)</span>
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
                    @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section>
</div>




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