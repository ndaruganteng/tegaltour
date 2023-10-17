@extends('landing.layouts.app') @section('content')

<div class="content-wrapper">
    <section id="{{$detail_wisata->namawisata}}">
        <div class="image-tour text-center">
            <img src="{{asset('storage/image/wisata/'.$detail_wisata->image)}}" class="img-fluid" alt="detail-tour image" />
        </div>
        <div class="judul-tour">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-9">
                        <h1 class="fw-bold">{{ $detail_wisata->namawisata }}</h1>
                        <div class="col-lg-12 info-detail border border-start-0 border-end-0">
                            <div class="row">
                                <div class="col-lg">
                                    <img src="/images/detail-tour/durasi-tour.png" alt="" class="float-left" />
                                    <h4>Durasi Wisata</h4>
                                    <p>{{ $detail_wisata->durasi }}</p>
                                </div>
                                <div class="col-lg">
                                    <img src="/images/detail-tour/jenis-tour.png" alt="" class="float-left" />
                                    <h4>Kategori Wisata</h4>
                                    <p>{{ $detail_wisata->kategori }}</p>
                                </div>
                                <div class="col-lg">
                                    <img src="/images/detail-tour/calendar.png" alt="" class="float-left" />
                                    <h4>Tanggal Berangkat</h4>
                                    <p>{{ $detail_wisata->tanggalberangkat }}</p>
                                </div>
                                <div class="col-lg">
                                    <img src="/images/detail-tour/money.png" alt="" class="float-left" />
                                    <h4>Harga</h4>
                                    <p>Rp.{{ number_format($detail_wisata->harga, 0, ',', '.') }} /orang</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 deskripsi">
                            <h3>Titik Kumpul</h3>
                            <p>{{ $detail_wisata->titikkumpul }}</p>
                        </div>
                        <div class="col-lg-12 deskripsi ">
                            <h3>Highlight</h3>                
                            <p>{{ $detail_wisata->lokasi }}</p>
                        </div>
                        <div class="col-lg-12 deskripsi">
                            <h3>Deskripsi</h3>
                            <p> {!! $detail_wisata->deskripsi !!}</p>
                        </div>
                        <div class="col-lg-12 deskripsi">
                            <h3>Fasilitas</h3>
                            <p> {!! $detail_wisata->fasilitas !!}</p>
                        </div>
                        <div class="col-lg-12 maps">
                            <div class="card text-center border shadow-2 rounded-0">
                                <div class="card-header d-flex justify-content-between">
                                    <h3>lokasi wisata</h3>
                                    <a class="btn btn-dark btn-rounded btn-sm shadow-0" href="{{ $detail_wisata->linklokasi }}" target="_blank"
                                        role="button" style="text-transform: lowercase;"> 
                                        <i class="fa-solid fa-location-dot me-1"></i>
                                        detail lokasi
                                    </a>
                                </div>
                                <div class="card-body">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d497084.2741675769!2d108.80508935545575!3d-6.942867786403291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb9dfbf3264c3%3A0x3027a76e352bbe0!2sTegal%2C%20Kota%20Tegal%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1690755695237!5m2!1sid!2sid"
                                        width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 penilaian">
                            <div class="card border shadow-0 rounded-0">
                                <div class="card-header fs-4">Ulasan</div>
                                @if($ulasan->isEmpty())
                                <h1 class="text-center">belum Ada ulasan</h1>
                                @else
                                @foreach($ulasan as $item) 
                                <div class="card-body mt-2">                             
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img src="/images/icon/profile.png" alt="" class="float-left me-3" />
                                            <h1 class="pt-2">{{ $item->nama }}</h1> 
                                        </div>
                                        <div class="col-lg-8">
                                        @for ($i = 1; $i <= $item->rating; $i++)
                                            <span class="fa fa-star checked"></span>
                                        @endfor
                                        @for ($i = $item->rating + 1; $i <= 5; $i++)
                                            <span class="fa fa-star"></span>
                                        @endfor
                                           
                                        <h2 >{{ $item->komentar }}</h2>
                                        <h4 >{{ $item->date }}</h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3">
                        <div class="col-lg-12 host">
                            <div class="card text-center border border-2 shadow-0">
                                <div class="card-body">
                                    <img src="/images/detail-tour/profile.png" alt="" class="rounded-circle" />
                                    <p class="card-text">
                                        {{$mitra->nama_lengkap}}
                                        <i class="fas fa-check-circle" style="color: #1fbd00"></i>
                                    </p>
                                    <a href="https://wa.me/{{$mitra->no_telepon}}" target="_blank" type="button"
                                        class="btn btn-dark shadow-0">
                                        <i class="fa-brands fa-whatsapp me-2"></i>
                                        Chat Host
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 harga">
                            <div class="card text-center border border-2 shadow-0">
                                <div class="card-body">
                                    <h1>Harga /orang</h1>
                                    <p>Rp.{{ number_format($detail_wisata->harga, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 booking">
                        @if (Auth::check())
                            <div class="card text-center border border-2">
                                <div class="card-header fw-blod">-BOOKING-</div>
                                <div class="card-body">
                                    <form action="/boking" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-outline mb-4" style="display: none;">
                                            <input class="form-control bg-white" for="namawisata" name="id_wisata"
                                            value="{{ $detail_wisata->id_wisata }}" readonly/>
                                        </div>
                                        <div class="form-outline mb-4" style="display: none;">
                                            <input class="form-control bg-white"  name="id_mitra"
                                            value="{{ $detail_wisata->id_mitra }}" readonly/>
                                        </div>
                                        <div class="form-outline mb-4" style="display: none;">
                                            <input class="form-control bg-white" for="namauser" name="id_user"
                                             value="{{ Auth::user()->id }}" readonly/>
                                        </div>
                                        <div class="form-outline mb-4"  style="display: none;">
                                            <input class="form-control" name="harga_satuan" id="hargasatuan" type="text"
                                                value="{{ $detail_wisata->harga }}"  onchange="updateHargaTotal()" readonly/>
                                            <label class="form-label" for="hargasatuan">Harga /pax</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="number" min="1" name="jumlah_orang" id="jumlahorang" class="form-control" onchange="updateHargaTotal()"/>
                                            <label class="form-label" for="jumlahorang">Masukan Jumlah Orang</label>
                                        </div>
                                       
                                        <div class="form-outline mb-4">
                                            <input class="form-control bg-white" id="viewhargatotal" type="text" placeholder="Total Harga" readonly/>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input class="form-control bg-white" name="harga_total" id="hargatotal" type="text" placeholder="Total Harga" hidden/>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-dark btn-block mb-4">Pesan Sekarang</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function updateHargaTotal() {
        const jumlahOrang = parseFloat(document.getElementById('jumlahorang').value);
        const hargaSatuan = parseFloat(document.getElementById('hargasatuan').value);
        const hargaTotal = isNaN(jumlahOrang) || isNaN(hargaSatuan) ? '' : jumlahOrang * hargaSatuan;
        document.getElementById('hargatotal').value = hargaTotal;
        const viewhargaTotal = isNaN(jumlahOrang) || isNaN(hargaSatuan) ? '' : (jumlahOrang * hargaSatuan).toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });
        document.getElementById('viewhargatotal').value = viewhargaTotal;
        }
    </script>

    <style>.checked { color: orange; }</style> 

</div>
@endsection