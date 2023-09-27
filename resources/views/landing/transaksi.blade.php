@extends('landing.layouts.app')
@section('content')

<div class="content-wrapper">

    <div class="content cart">
        <div class="container">
            <h3 class="text-center fw-bold">Transaksi</h3>
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-3">
                    <div class="col-lg-12">
                        @if($pemesanan->isEmpty())
                        <h5 class="p-3 text-center">Belum Ada Transaksi</h5>
                        @else
                        @foreach($pemesanan as $p)
                            @if($p->status == null)                       
                            <div class="card mt-3">
                                <div class="row g-0">
                                    <div class="col-md-6 p-3">
                                        <img src="{{asset('storage/image/wisata/'.$p->image)}}" class="img-thumbnail"
                                            style="width: 100%; height: 100%;" />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="card-title">Wisata : {{$p->nama_wisata}}</h5>
                                            <p class="card-text">Nama : {{$p->nama_pengguna}} </p>
                                            <p class="card-text" style="margin-top: -10px;">Tanggal Berangkat : {{$p->tanggal}}</p>
                                            <p class="card-text" style="margin-top: -10px;">Jumlah Orang : {{$p->jumlah_orang}}</p>
                                            <p class="card-text" style="margin-top: -10px;">Harga/pax : Rp.{{$p->harga}}</p>
                                            @if($p->status == 2)
                                            <p class="card-text" style="margin-top: -10px;">Harga Total : Rp.{{$p->hargatotal}}</p>
                                            @endif
                                            @if($p->bukti_pembayaran)
                                            <p class="card-text" style="margin-top: -10px;">Status Transaksi:
                                                @if($p->status == null)
                                                <span class="badge badge-danger">Menunggu konfirmasi!</span>
                                                @else($p->status == 2)
                                                <span class="badge badge-success">Telah dikonfimarsi!</span>
                                                @endif
                                            </p>
                                            @endif
                                            <p class="card-text" style="margin-top: -10px;"> Transaksi :
                                                @if($p->bukti_pembayaran)
                                                <span class="badge badge-success">Sudah Melakukan Transaksi</span>
                                                @else
                                                <span class="badge badge-danger">Belum Melakukan Transaksi</span>
                                                @endif
                                            </p>
                                            @if($p->status == null)
                                            <div class="alert alert-warning" role="alert">
                                                Harga Yang harus Dibayar : Rp {{ $p->hargatotal}}
                                            </div>
                                            @endif
                                            <div>
                                                @if($p->bukti_pembayaran)
                                                <button type="button" class="btn btn-dark shadow-0 btn-sm"
                                                    data-toggle="modal" data-target="#buktiModal{{$p->id_pemesanan}}"
                                                    data-whatever="@getbootstrap">
                                                    <i class="fa-solid fa-upload me-2"></i>Upload Bukti transfer
                                                </button>
                                                @else
                                                <a href="/data-order/hapus/{{ $p->id_pemesanan }}"
                                                    class="btn  btn-danger btn-sm shadow-0">
                                                    <i class="fa-solid fa-circle-xmark me-2"></i>Cancel
                                                </a>
                                                <button type="button" class="btn btn-dark shadow-0 btn-sm"
                                                    data-toggle="modal" data-target="#buktiModal{{$p->id_pemesanan}}"
                                                    data-whatever="@getbootstrap">
                                                    <i class="fa-solid fa-upload me-2"></i>Upload Bukti transfer
                                                </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 info-rekening border-top">
                                        <div class="row">
                                            @foreach ($rekening[$p->id_mitra] as $rekeningItem)
                                            <div class="col-lg-4 col-md-12">
                                                <img src="{{asset('storage/image/rekening/'.$rekeningItem->image_rekening)}}" class="float-left" />
                                                <p>Nama Bank: {{ $rekeningItem->nama_bank }}</p>
                                                <p>Nomor Rekening: {{ $rekeningItem->no_rekening }}</p>
                                                <p>A/N: {{ $rekeningItem->nama_rekening }}</p>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="buktiModal{{$p->id_pemesanan}}" tabindex="-1" role="dialog"
                                    aria-labelledby="buktiModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="buktiModalLabel{{$p->id_pemesanan}}">Upload
                                                    Bukti Transfer</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/upload-bukti_pembayaran/{{$p->id_pemesanan}}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group mb-5">
                                                        <label class="col-form-label">Bukti transfer</label>
                                                        <input type="file" class="form-control" name="bukti_pembayaran">
                                                    </div>
                                                    <div class="modal-footer ">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-black">Kirim</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="modal fade" id="imagebuktiModal{{$p->id_pemesanan}}" tabindex="-1" role="dialog"
                                    aria-labelledby="imagebuktiModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="imagebuktiModalLabel{{$p->id_pemesanan}}">Bukti
                                                    Pembayaran</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{asset('storage/image/bukti-transfer/'.$p->bukti_pembayaran)}}"
                                                    class="img-thumbnail" style="width: 100%; height: 100%;" />
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            @else($p->status == 2)
                            @endif
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>



@endsection