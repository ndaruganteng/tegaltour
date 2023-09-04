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
                        <div class="row g-0 border border-top">
                            <div class="col-md-6 p-3">
                                    <img src="images/home/bromo.jpg"  class="img-thumbnail" style="width: 100%; height: 100%;"/>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <a class="btn position-absolute top-0 end-0 mt-3 mr-3 btn-floating btn-danger btn-sm shadow-0 "href="#!">
                                        <i class="fa-solid fa-trash-can pt-2"></i>
                                    </a>
                                    <h5 class="card-title">Wisata Guci</h5>
                                    <p class="card-text" >Nama : Jamal</p>
                                    <p class="card-text" style="margin-top: -10px;" >Tanggal Berangkat : 11-08-23</p>
                                    <p class="card-text" style="margin-top: -10px;" >Jumlah Orang : 2</p>
                                    <p class="card-text" style="margin-top: -10px;" >Harga/pax : Rp 50.000</p>
                                    <p class="card-text" style="margin-top: -10px;" >Status : <span class="badge badge-success">Pembayaran Berhasil</span> </p>
                                    <div class="alert alert-warning" role="alert">
                                        Harga Yang harus Dibayar : Rp 100.000
                                      </div>
                                    <button type="button" class="btn btn-dark shadow-0  btn-block" data-toggle="modal" data-target="#buktiModal" data-whatever="@getbootstrap"><i class="fa-solid fa-upload me-2"></i>Upload Bukti transfer</button>
                                    
                                </div>
                            </div>
                        </div>
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

    <!-- modal bukti tf -->
    <div class="modal fade" id="buktiModal" tabindex="-1" role="dialog" aria-labelledby="buktiModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buktiModalLabel">Upload Bukti Transfer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group mb-5">
                            <label for="recipient-name" class="col-form-label">Bukti transfer</label>
                            <input type="file" class="form-control" id="recipient-name">
                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-black">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</div>


@endsection