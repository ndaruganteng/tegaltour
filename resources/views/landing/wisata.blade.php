@extends('landing.layouts.app')
@section('content')

<div class="content-wrapper">

    <!-- Jumbotron -->
    <div class="p-5 text-center bg-image tour" style="background-image: url('https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1171&q=80'); 
         height: 500px">
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
                            <div class="kategori">
                                <h5 class="mb-3 card-title">Kategori</h5>
                                <select id="filter" class="form-select">
                                    <option value="">Semua Kategori</option>
                                    @foreach($kategori as $data)
                                    <option value="{{$data->nama_kategori}}">{{$data->nama_kategori}}</option>
                                    @endforeach                               
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
                    </div>
                </div>
                <div class="col-lg-12 ">
                    <div class="row" id="wisata-list">
                        @foreach($wisata as $item)                           
                        <div class="col-md-12 col-lg-4 tour-card">                     
                            <div class="card shadow-0 border border-2">
                                <a href="/{{ ($item->id_wisata) }}/{{$item->slug}}" class="bg-image hover-zoom">
                                    <img class="card-img-top" src="{{asset('storage/image/wisata/'.$item->image)}}" alt="Card image cap w-100"
                                        style="height:180px">
                                </a>
                                <div class="card-body">
                                    <span class="badge badge-dark">{{ $item->kategori }}</span>
                                    <a href="/{{ ($item->id_wisata) }}/{{$item->slug}}" class="mt-2">
                                        <p>{{ $item->namawisata }}</p>
                                    </a>
                                    <h3 class="card-text harga">Rp {{ number_format($item->harga, 0, ',', '.') }} <span style="color: grey;">/orang</span></h3>
                                </div>                      
                            </div>  
                        </div>                        
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

</div>

<script>
    const filterSelect = document.getElementById("filter");
    const wisataList = document.getElementById("wisata-list");
    const noCategoryFound = document.getElementById("no-category-found");
    filterSelect.addEventListener("change", filterItems);

    function filterItems() {
        const selectedValue = filterSelect.value;

        const items = wisataList.getElementsByClassName("col-md-12 col-lg-4");
        let found = false;

        for (const item of items) {
            const category = item.querySelector(".badge").textContent;
            if (selectedValue === "" || category === selectedValue) {
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