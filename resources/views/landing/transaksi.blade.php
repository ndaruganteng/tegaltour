@extends('landing.layouts.app')
@section('content')

<div class="content-wrapper">

<div class="content cart">
    <div class="container">
        <h3 class="text-center fw-bold">Transaksi</h3>
        <div class="row">
            <div class="col-md-12 col-lg-9 mt-5">
                <div class="col-lg-12">
                    <div class="card">
                    <!-- <h4 class="p-3">Keranjang Kosong</h4> -->
                        @foreach($pemesanan as $p)
                            <div class="row g-0 border border-top">
                                <div class="col-md-6 p-3">
                                    <img src="{{asset('storage/image/bukti-transfer/'.$p->bukti_pembayaran)}}"  class="img-thumbnail" style="width: 100%; height: 100%;"/>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <a class="btn position-absolute top-0 end-0 mt-3 mr-3 btn-floating btn-danger btn-sm shadow-0 " href="#!">
                                            <i class="fa-solid fa-trash-can pt-2"></i>
                                        </a>
                                        <h5 class="card-title">Wisata : {{$p->namawisata}}</h5>
                                        <p class="card-text" >Nama : {{ $p->namauser}}</p>
                                        <p class="card-text" style="margin-top: -10px;" >Tanggal Berangkat : {{ $p->tanggalberangkat}}</p>
                                        <p class="card-text" style="margin-top: -10px;" >Jumlah Orang : {{ $p->jumlahorang}}</p>
                                        <p class="card-text" style="margin-top: -10px;" >Harga/pax : Rp {{ $p->hargasatuan}}</p>
                                        @if($p->status == 2)
                                        <p class="card-text" style="margin-top: -10px;" >Harga Total : Rp {{ $p->hargatotal}}</p>
                                        @endif
                                        <p class="card-text" style="margin-top: -10px;" >Status : 
                                            @if($p->status == null)
                                            <span class="badge badge-danger">Menunggu konfirmasi</span> 
                                            @else($p->status == 2)
                                            <span class="badge badge-success">Pembayaran dikonfimarsi!</span>
                                            @endif 
                                        </p>
                                        @if($p->status == null)
                                        <div class="alert alert-warning" role="alert">
                                            Harga Yang harus Dibayar : Rp {{ $p->hargatotal}}
                                        </div>
                                        @endif
                                        <div>
                                            <button type="button" class="btn btn-dark shadow-0 btn-sm" data-toggle="modal" data-target="#buktiModal{{$p->id_pemesanan}}" data-whatever="@getbootstrap">
                                                <i class="fa-solid fa-upload me-2"></i>Upload Bukti transfer
                                            </button>                      
                                            @if($p->status == 2)
                                            <button type="button"  class="btn btn-primary shadow-0 btn-sm" data-toggle="modal" data-target="#imagebuktiModal{{$p->id_pemesanan}}" data-whatever="@getbootstrap">
                                                <i class="fa-solid fa-eye me-2"></i>Bukti Transfer
                                            </button>
                                            @endif
                                        </div>                      
                                    </div>
                                </div>
                            </div>
                            <!-- modal upload bukti tf -->
                            <div class="modal fade" id="buktiModal{{$p->id_pemesanan}}" tabindex="-1" role="dialog" aria-labelledby="buktiModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="buktiModalLabel{{$p->id_pemesanan}}">Upload Bukti Transfer</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/upload-bukti_pembayaran/{{$p->id_pemesanan}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group mb-5">
                                                    <label for="bukti_pembayaran" class="col-form-label">Bukti transfer</label>
                                                    <input type="file" class="form-control" name="bukti_pembayaran">
                                                </div>
                                                <div class="modal-footer ">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-black">Kirim</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal bukti tf -->
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
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-3 mt-5">
                <div class="col-lg-12">
                    <div class="card text-center">
                        <div class="card-header text-center fs-5">Daftar rekening </div>
                            @foreach($rekening as $item)  
                                <div class="card-body m-0">
                                    <img src="{{asset('storage/image/rekening/'.$item->image_rekening)}}" class="" style="width: 100px;">
                                    <p class="mt-2">{{ $item->nama_bank }}</p>
                                    <p style="margin-top: -15px;"> {{ $item->no_rekening }}</p>
                                    <p style="margin-top: -15px;">A/N {{ $item->nama_rekening }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


</div>


@endsection