@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="m-0 ">Edit Data Rekening</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="{{ route('data-rekening.index') }}"> <i class="fa-solid fa-arrow-left mr-2"></i>Kembali</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 grid-margin">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="text-center ">Edit Data Rekening</h3>
                        </div>
                        <form action="{{ url('/data-rekening/update/'.$rekening->id_rekening) }}"  method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                            <input type="hidden" name="id" id="id" value="{{ $rekening->id_rekening }}">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="image_rekening" class="col-form-label">Image</label>
                                            <input type="file" value="{{ $rekening->image_rekening}}" name="image_rekening" class="form-control">
                                            <p class="fst-italic text-secondary">size foto maksimal 2 mb dan extensi jpg, png, jpeg</p>     
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-grup">
                                            @if ($rekening->image_rekening)
                                            <img src="{{asset('storage/image/rekening/'.$rekening->image_rekening)}}" class="img-thumbnail" width="200">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_bank">Nama Bank</label>
                                    <input type="text" class="form-control" value="{{ $rekening->nama_bank}}"  name="nama_bank"  placeholder="Masukan Nama Bank">
                                </div>
                                <div class="form-group">
                                    <label for="no_rekening">Nomor Rekening</label>
                                    <input type="text" class="form-control" value="{{ $rekening->no_rekening}}"  name="no_rekening" placeholder="Masukan Nomor Rekening Rekening">
                                </div>
                                <div class="form-group">
                                    <label for="nama_rekening">Nama Rekening</label>
                                    <input type="text" class="form-control" value="{{ $rekening->nama_rekening}}"  name="nama_rekening" placeholder="Nama Rekening">
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-secondary " value="Simpan Data" >Simpan</button>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection