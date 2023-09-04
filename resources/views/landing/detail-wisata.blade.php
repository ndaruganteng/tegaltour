@extends('landing.layouts.app') @section('content')

<div class="content-wrapper">
    <section id="{{$detail_wisata->namawisata}}">
        <div class="image-tour">
            <img src="{{asset('storage/image/wisata/'.$detail_wisata->image)}}" class="img-fluid" alt="detail-tour image" />
        </div>
        <div class="judul-tour">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-9">
                        <h1>{{ $detail_wisata->namawisata }}</h1>
                        <div class="col-lg-12 info-detail border border-start-0 border-end-0">
                            <div class="row">
                                <div class="col-lg">
                                    <img src="images/detail-tour/durasi-tour.png" alt="" class="float-left" />
                                    <h4>Durasi Wisata</h4>
                                    <p>{{ $detail_wisata->durasi }}</p>
                                </div>
                                <div class="col-lg">
                                    <img src="images/detail-tour/jenis-tour.png" alt="" class="float-left" />
                                    <h4>Jenis Wisata</h4>
                                    <p>{{ $detail_wisata->kategori }}</p>
                                </div>
                                <div class="col-lg">
                                    <img src="images/detail-tour/lokasi-tour.png" alt="" class="float-left" />
                                    <h4>Lokasi Wisata</h4>
                                    <p>{{ $detail_wisata->lokasi }}</p>
                                </div>
                                <div class="col-lg">
                                    <img src="images/detail-tour/money.png" alt="" class="float-left" />
                                    <h4>Harga</h4>
                                    <p>Rp {{ $detail_wisata->harga }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 deskripsi">
                            <h3>Deskripsi</h3>
                            <p> {!! $detail_wisata->deskripsi !!}</p>
                        </div>
                        <div class="col-lg-12 deskripsi">
                            <h3>Fasilitas</h3>
                            <p> {!! $detail_wisata->fasilitas !!}</p>
                        </div>
                        <!-- <div class="col-lg-12 fasilitas">
                            <h2>Fasilitas</h2>
                            <div class="row">
                                <div class="col-lg">
                                    <ul class="list-unstyled">
                                        <li class="mb-1">
                                            <i class="fas fa-check-circle me-2 text-success"></i>
                                            Lorem ipsum dolor sit amet.
                                        </li>
                                        <li class="mb-1">
                                            <i class="fas fa-check-circle me-2 text-success"></i>
                                            Lorem ipsum dolor sit amet.
                                        </li>
                                        <li class="mb-1">
                                            <i class="fas fa-check-circle me-2 text-success"></i>
                                            Lorem ipsum dolor sit amet.
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg">
                                    <ul class="list-unstyled">
                                        <li class="mb-1">
                                            <i class="fa-solid fa-x me-2" style="color: #e00000"></i>
                                            Lorem ipsum dolor sit amet.
                                        </li>
                                        <li class="mb-1">
                                            <i class="fa-solid fa-x me-2" style="color: #e00000"></i>
                                            Lorem ipsum dolor sit amet.
                                        </li>
                                        <li class="mb-1">
                                            <i class="fa-solid fa-x me-2" style="color: #e00000"></i>
                                            Lorem ipsum dolor sit amet.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-12 maps">
                            <div class="card text-center border shadow-2 rounded-0">
                                <div class="card-header d-flex justify-content-between">
                                    <h3>lokasi wisata</h3>
                                    <a class="text-black" href="{{ $detail_wisata->linklokasi }}" target="_blank"
                                        role="button">
                                        <i class="fa-solid fa-location-dot me-1"></i>
                                        {{ $detail_wisata->lokasi }}
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
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img src="images/icon/profile.png" alt="" class="float-left me-3"
                                                style="width: 50px" />
                                            <p class="pt-2">Jamal Anak pertama</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="">
                                                Lorem ipsum dolor sit, amet
                                                consectetur adipisicing elit. Sint
                                                quia et aspernatur beatae illo
                                                repellat aut aliquid debitis, a
                                                doloremque officia neque odio nemo
                                                incidunt deleniti molestiae quaerat
                                                modi iure?
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img src="images/icon/profile.png" alt="" class="float-left me-3"
                                                style="width: 50px" />
                                            <p class="pt-2">Jamal Anak pertama</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="">
                                                Lorem ipsum dolor sit, amet
                                                consectetur adipisicing elit. Sint
                                                quia et aspernatur beatae illo
                                                repellat aut aliquid debitis, a
                                                doloremque officia neque odio nemo
                                                incidunt deleniti molestiae quaerat
                                                modi iure?
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img src="images/icon/profile.png" alt="" class="float-left me-3"
                                                style="width: 50px" />
                                            <p class="pt-2">Jamal Anak pertama</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="">
                                                Lorem ipsum dolor sit, amet
                                                consectetur adipisicing elit. Sint
                                                quia et aspernatur beatae illo
                                                repellat aut aliquid debitis, a
                                                doloremque officia neque odio nemo
                                                incidunt deleniti molestiae quaerat
                                                modi iure?
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3">
                        <div class="col-lg-12 host">
                            <div class="card text-center border border-2 shadow-0">
                                <div class="card-body">
                                    <img src="images/detail-tour/profile.png" alt="" class="rounded-circle" />
                                    <p class="card-text">
                                        Ojan Tour & Travel
                                        <i class="fas fa-check-circle" style="color: #1fbd00"></i>
                                    </p>
                                    <a href="https://wa.me/085647019630" target="_blank" type="button"
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
                                    <h1>Harga /pax</h1>
                                    <p>Rp {{ $detail_wisata->harga }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 booking">
                            <div class="card text-center border border-2">
                                <div class="card-header fw-blod">-BOOKING-</div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-outline mb-4">
                                            <input type="date" id="date" class="form-control" />
                                            <label class="form-label" for="form2Example1">Masukan Tanggal</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="number" id="typeNumber" class="form-control" />
                                            <label class="form-label" for="typeNumber">Masukan Jumlah Orang</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input class="form-control bg-white" id="formControlReadonly" type="text"
                                                value="" aria-label="readonly input example" readonly />
                                            <label class="form-label" for="formControlReadonly">Harga Total</label>
                                        </div>
                                        <a href="{{ route('transaksi.index') }}" type="submit"
                                            class="btn btn-dark btn-block mb-4">Pesan Sekarang</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-12 jadwal">
                            <div class="card text-center border border-2 shadow-0">
                                <div class="card-body">
                                    <ul class="list-group list-group-light list-group-small text-center">
                                        <li class="list-group-item">
                                            Senin 08.00 - 16.00
                                        </li>
                                        <li class="list-group-item">
                                            Selasa 08.00 - 16.00
                                        </li>
                                        <li class="list-group-item">
                                            Rabu 08.00 - 16.00
                                        </li>
                                        <li class="list-group-item">
                                            Kamis 08.00 - 16.00
                                        </li>
                                        <li class="list-group-item">
                                            Jumat 08.00 - 16.00
                                        </li>
                                        <li class="list-group-item">
                                            Sabtu 08.00 - 16.00
                                        </li>
                                        <li class="list-group-item text-danger">
                                            Minggu Tutup
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection