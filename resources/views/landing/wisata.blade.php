@extends('landing.layouts.app')
@section('content')

<div class="content-wrapper">

    <!-- Jumbotron -->
    <div class="p-5 text-center bg-image tour" style="background-image: url('https://img.freepik.com/free-photo/travel-items-assortment-top-view_23-2149617655.jpg?size=626&ext=jpg&ga=GA1.2.1961799179.1697825242&semt=ais'); 
         height: 400px">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3 ">Daftar Paket Wisata </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- end Jumbotron -->

    <!-- info-Panel -->
    <div class="container mt-5">
        <h1 class="text-center judul-date ">Cari Wisata Dengan Range Tanggal</h1>
        <div class="row justify-content-center">
            <div class="col-12 info-panel">
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

    <!-- card -->
    <div class="container mt-5 mb-5 tour-card ">
        <div class="row">
            <div class="col md-12 col-lg-3">
                <div class="col-lg-12">
                    <div class="card shadow-0 border rounded-0" style="height: auto;">
                        <div class="card-header fs-5 text-center">FILTER</div>
                        <div class="card-body">
                            <div class="kategori">
                                <h5 class="mb-3 card-title">Kategori</h5>
                                <select id="filter_kategori" class="form-select">
                                    <option value="">Semua Kategori</option>
                                    @foreach($kategori as $data)
                                    <option value="{{$data->nama_kategori}}">{{$data->nama_kategori}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="hargadropwon mt-3">
                                <h5 class="mb-3 card-title">Harga</h5>
                                <select id="filter_harga" class="form-select">
                                    <option value="">Semua Harga</option>
                                    <option value="Rp 10.000 /orang">Rp 10.000</option>
                                    <option value="Rp 15.000 /orang">Rp 15.000</option>
                                    <option value="Rp 20.000 /orang">Rp 20.000</option>
                                    <option value="Rp 250.000 /orang">Rp 25.000</option>
                                    <option value="Rp 50.000 /orang">Rp 50.000</option>
                                    <option value="Rp 100.000 /orang">Rp 100.000</option>
                                    <option value="Rp 150.000 /orang">Rp 150.000</option>
                                    <option value="Rp 200.000 /orang">Rp 200.000</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="col-lg-12 daftar-wisata">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>Daftar Paket Wisata</h4>
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
                    </div>
                </div>
                <div class="col-lg-12 ">
                    <div class="row" id="wisata-list">
                        @foreach($wisata as $item)
                        @if($item->status_wisata == null)
                        <div class="col-md-12 col-lg-4 tour-card">
                            <div class="card shadow-0 border border-2">
                                <a href="/{{ ($item->id_wisata) }}/{{$item->slug}}" class="bg-image hover-zoom">
                                    <img class="card-img-top " src="{{asset('storage/image/wisata/'.$item->image)}}"
                                        alt="Card image cap w-100" style="height:180px;">
                                </a>
                                <div class="card-body">
                                    <span class="badge badge-dark">{{ $item->kategori }}</span>
                                    <a href="/{{ ($item->id_wisata) }}/{{$item->slug}}" class="mt-2">
                                        <p>{{ $item->namawisata }}</p>
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
                                    <h3 class="card-text harga">Rp {{ number_format($item->harga, 0, ',', '.') }} <span
                                            style="color: grey;">/orang</span></h3>
                                    <h5 class="text-center" style="font-size: 12px; margin-top: 14px;">-
                                        {{ $item->nama_lengkap}} -
                                    </h5>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div id="no-category-found" style="display: none;">
                            Tidak Ada Wisata
                        </div>
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

<script>
const filterCategorySelect = document.getElementById("filter_kategori");
const filterHargaSelect = document.getElementById("filter_harga");
const wisataList = document.getElementById("wisata-list");
const noCategoryFound = document.getElementById("no-category-found");

filterCategorySelect.addEventListener("change", filterItems);
filterHargaSelect.addEventListener("change", filterItems);

function filterItems() {
    const selectedCategory = filterCategorySelect.value;
    const selectedHarga = filterHargaSelect.value;

    const items = wisataList.getElementsByClassName("tour-card");
    let found = false;

    for (const item of items) {
        const category = item.querySelector(".badge").textContent;
        const harga = item.querySelector(".harga").textContent;

        if (
            (selectedCategory === "" || category === selectedCategory) &&
            (selectedHarga === "" || harga.includes(selectedHarga))
        ) {
            item.style.display = "block";
            found = true;
        } else {
            item.style.display = "none";
        }
    }

    if (!found) {
        noCategoryFound.style.display = "block";
    } else {
        noCategoryFound.style.display = "none";
    }
}

filterItems();
</script>





@endsection