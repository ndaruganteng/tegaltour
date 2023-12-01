@extends('landing.layouts.app')
@section('content')

<div class="content-wrapper">

    <div class="content cart">
        <div class="container">
            <h2 class="text-center fw-bold">Pesanan Saya</h2>
            <div class="row">
                <div class="col-md-12 col-lg-12 ">
                    <div class="col-lg-12">
                        @if($pemesanan->isEmpty())
                            <h4 class="p-3 text-center"> Tidak Ada Pesanan</h4> 
                        @else
                            @foreach($pemesanan as $p)
                            @if($p->status == 2)
                                <div class="card mt-3">
                                    <div class="row g-0">
                                        <div class="col-md-6 p-3">
                                            <img src="{{asset('storage/image/wisata/'.$p->image)}}"  class="img-thumbnail" style="width: 100%; height: auto;"/>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <h6 class="card-title mb-3">Wisata : {{$p->nama_wisata}}</h6>
                                                <p class="card-text" style="font-size: 14px; margin-top: -5px;">Nama Pemesan: {{$p->nama_pengguna}}</p>
                                                <p class="card-text"style="font-size: 14px; margin-top: -5px;">Tanggal Pemesanan : {{ \Carbon\Carbon::parse($p->date)->locale('id')->isoFormat('dddd, D MMMM Y') }}</p>
                                                <p class="card-text" style="font-size: 14px; margin-top: -5px;">Tanggal Berangkat: {{ \Carbon\Carbon::parse($p->tanggal)->locale('id')->isoFormat('dddd, D MMMM Y') }}</p>
                                                <p class="card-text" style="font-size: 14px; margin-top: -5px;">Jam Berangkat: {{$p->jamberangkat}} WIB</p>
                                                <p class="card-text"style="font-size: 14px; margin-top: -5px;">Titik Kumpul : {{$p->titikkumpul}}</p>
                                                <p class="card-text"style="font-size: 14px; margin-top: -5px;">Jumlah Orang : {{$p->jumlah_orang}}</p>
                                                <p class="card-text"style="font-size: 14px; margin-top: -5px;">Harga/pax : Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                                                <p class="card-text"style="font-size: 14px; margin-top: -5px;">Harga Total : Rp {{ number_format($p->hargatotal, 0, ',', '.') }}</p>
                                                @if($p->status == 2)
                                                    <p class="card-text"style="font-size: 14px; margin-top: -5px;">Transaksi : <span class="badge badge-success">Telah Dikonfirmasi</span></p>
                                                @endif
                                                @if($p->status_perjalanan == null)
                                                <p class="card-text" style="font-size: 14px; margin-top: -5px;">Status Perjalanan : <span class="badge badge-warning">Menunggu</span> </p>
                                                @elseif($p->status_perjalanan == 2)
                                                <p class="card-text" style="font-size: 14px; margin-top: -5px;">Status Perjalanan : <span class="badge badge-info">Berangkat</span> </p>
                                                @elseif($p->status_perjalanan == 3)
                                                <p class="card-text" style="font-size: 14px; margin-top: -5px;">Status Perjalanan : <span class="badge badge-success">Selesai</span> </p>
                                                @endif
                                                <div>
                                                    @if($p->status_perjalanan == null)
                                                    <button type="button"   class="btn btn-primary shadow-0 btn-sm mt-1" data-toggle="modal" data-target="#imagebuktiModal{{$p->id_pemesanan}}" data-whatever="@getbootstrap">
                                                        <i class="fa-solid fa-eye me-2"></i>Bukti Transfer
                                                    </button>
                                                    <a href="/invoice/{{$p->id_pemesanan}}" class="btn btn-dark btn-sm shadow-0 mt-1">
                                                        <i class="fa-solid fa-download me-2"></i>Download invoice
                                                    </a>
                                                    @elseif($p->status_perjalanan == 3)
                                                    <button type="button" class="btn btn-info btn-sm shadow-0" data-mdb-toggle="modal" data-mdb-target="#ulasanModal{{$p->id_pemesanan}}"><i class="fa-solid fa-envelope me-2"></i>Beri Ulasan</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal ulasan -->
                                    <div class="modal fade" id="ulasanModal{{$p->id_pemesanan}}" tabindex="-1" aria-labelledby="ulasanModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Beri Ulasan</h5>
                                                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{ route('Ulasan.index') }}">
                                                        @csrf
                                                        <input type="text" class="form-control" hidden name="id_pemesanan" value="{{$p->id_pemesanan}}">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" hidden name="id_user" value="{{$p->id_user}}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" hidden name="id_wisata" value="{{$p->id_wisata}}" required>
                                                        </div>
                                                        <div class="form-group text-center">                                                       
                                                            <div class="rating">
                                                                <input type="radio" id="star5" name="rating" value="5"/>
                                                                <label for="star5"></label>
                                                                <input type="radio" id="star4" name="rating" value="4" />
                                                                <label for="star4"></label>
                                                                <input type="radio" id="star3" name="rating" value="3" />
                                                                <label for="star3"></label>
                                                                <input type="radio" id="star2" name="rating" value="2" />
                                                                <label for="star2"></label>
                                                                <input type="radio" id="star1" name="rating" value="1" />
                                                                <label for="star1"></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea class="form-control" id="komentar" name="komentar" placeholder="Berikan Ulasan Anda"  required></textarea>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger shadow-0" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-dark shadow-0">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal ulasan -->
                                    <!-- modal bukti pembayaran -->
                                    <div class="modal fade" id="imagebuktiModal{{$p->id_pemesanan}}" tabindex="-1" role="dialog" aria-labelledby="imagebuktiModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imagebuktiModalLabel{{$p->id_pemesanan}}">Bukti Pembayaran</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{asset('storage/image/bukti-transfer/'.$p->bukti_pembayaran)}}"  class="img-thumbnail" style="width: 100%; height: 100%;"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal bukti pembayaran -->
                                </div>
                            @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<style>
    .rating {
        display: inline-block;
        unicode-bidi: bidi-override;
        direction: rtl;
    }
    .rating > input {
        display: none;
    }
    .rating > label {
        cursor: pointer;
        width: 50px;
        font-size: 50px;
        text-align: center;
        color: #ccc;
    }
    .rating > label:before {
        content: '\2605';
    }
    .rating > input:checked ~ label {
        color: #f7d943;
    }
    .rating > label:hover,
    .rating > label:hover ~ label {
        color: #f7d943;
    }
</style>

<script>
    // Jika Anda ingin mengambil nilai rating yang diberikan saat form disubmit, Anda dapat menggunakan JavaScript.
    document.getElementById('ratingForm').addEventListener('submit', function (event) {
        event.preventDefault();
        const selectedRating = document.querySelector('input[name="rating"]:checked').value;
        alert(`Anda memberikan rating: ${selectedRating}`);
    });
</script>


@endsection