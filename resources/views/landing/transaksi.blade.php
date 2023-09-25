@extends('landing.layouts.app')
@section('content')

<div class="content-wrapper">

<div class="content cart">
    <div class="container">
        <h3 class="text-center fw-bold">Transaksi</h3>
        <div class="row">
            <div class="col-md-12 col-lg-12 mt-5">
                <div class="col-lg-12">
                    <div class="card">
                        @if($pemesanan->isEmpty())
                        <h5 class="p-3 text-center">Belum Ada Transaksi</h5> 
                        @else
                        @foreach($pemesanan as $p)
                            <div class="row g-0 border border-top">
                                <div class="col-md-6 p-3">  
                                    <img src="{{asset('storage/image/wisata/'.$p->image)}}" class="img-thumbnail" style="width: 100%; height: 100%;" />
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <a href="/data-order/hapus/{{ $p->id_pemesanan }}" class="btn position-absolute top-0 end-0 mt-3 mr-3 btn-floating btn-danger btn-sm shadow-0 " href="#!">
                                            <i class="fa-solid fa-trash-can pt-2"></i>
                                        </a>
                                        <h5 class="card-title">Wisata : {{$p->nama_wisata}}</h5>
                                        <p class="card-text" >Nama : {{$p->nama_pengguna}} </p>
                                        <p class="card-text" style="margin-top: -10px;" >Tanggal Berangkat : {{$p->tanggal}}</p>
                                        <p class="card-text" style="margin-top: -10px;" >Jumlah Orang : {{$p->jumlah_orang}}</p>
                                        <p class="card-text" style="margin-top: -10px;" >Harga/pax : Rp.{{$p->harga}}</p>
                                        @if($p->status == 2)
                                        <p class="card-text" style="margin-top: -10px;" >Harga Total : Rp.{{ $p->hargatotal}} </p>
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
                                            @if($p->status == null)
                                            <button type="button" class="btn btn-dark shadow-0 btn-sm" data-toggle="modal" data-target="#buktiModal{{$p->id_pemesanan}}" data-whatever="@getbootstrap">
                                                <i class="fa-solid fa-upload me-2"></i>Upload Bukti transfer
                                            </button>                      
                                            @else
                                            <button type="button"  class="btn btn-primary shadow-0 btn-sm" data-toggle="modal" data-target="#imagebuktiModal{{$p->id_pemesanan}}" data-whatever="@getbootstrap">
                                                <i class="fa-solid fa-eye me-2"></i>Bukti Transfer
                                            </button>
                                            @endif
                                        </div>                      
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="card-header text-center fs-5">Daftar rekening </div>
                                        <h5 class="card-title">Data Rekening:</h5>
                                            @foreach ($rekening[$p->id_mitra] as $rekeningItem)
                                                <img src="{{asset('storage/image/rekening/'.$rekeningItem->image_rekening)}}" style="width:100px" alt="">
                                                <p class="card-text">Nomor Rekening: {{ $rekeningItem->no_rekening }}</p>
                                                <p class="card-text">Nama Bank: {{ $rekeningItem->nama_bank }}</p>
                                                <p class="card-text">Nama Rekening: {{ $rekeningItem->nama_rekening }}</p>
                                            @endforeach                          
                                    </div>
                                </div>
                            </div>
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
                    @endif
                    </div>
                </div>
            </div>
         
        </div>
    </div>


</div>


</div>



@endsection