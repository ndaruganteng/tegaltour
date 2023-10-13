@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="m-0 ">Edit Paket Wisata</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="{{ route('data-wisata.index') }}"> <i class="fa-solid fa-arrow-left mr-2"></i>Kembali</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="text-center ">Edit Paket Wisata</h3>
                        </div>
                        <form class="form-sample" action="{{ url('/data-wisata/update/'.$wisata->id_wisata) }}" method="post" enctype="multipart/form-data">
                             @csrf
                            @method('put')
                            <div class="card-body">
                                <input type="hidden" name="id" id="id" value="{{ $wisata->id }}">
                                <div class="row">
                                    <div class="col-md-10 ">
                                        <div class="form-group row">
                                            <label for="image" class="col-form-label">Image</label>
                                            <input type="file" value="{{ $wisata->image}}" name="image" class="form-control">
                                            <p class="fst-italic text-secondary">size foto maksimal 2 mb dan extensi jpg, png, jpeg</p>     
                                        </div>             
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-grup">
                                            @if ($wisata->image)
                                            <img src="{{asset('storage/image/wisata/'.$wisata->image)}}" class="img-thumbnail" width="200">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="namawisata" class="col-sm-3 col-form-label">Nama Paket Wisata</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="{{ $wisata->namawisata}}"  name="namawisata">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="lokasi" class="col-sm-3 col-form-label">Lokasi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="{{ $wisata->lokasi}}" name="lokasi"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                                            <div class="col-sm-9">
                                                <select class="custom-select form-control" name="kategori">
                                                @foreach($kategori as $data)
                                                <option value="{{$data->id_kategori}}" {{ $data->nama_kategori == $wisata->kategori ? 'selected' : '' }}>{{$data->nama_kategori}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="harga" class="col-sm-3 col-form-label">Harga Wisata</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="{{ $wisata->harga}}" name="harga">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="durasi" class="col-sm-3 col-form-label">Durasi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="{{ $wisata->durasi}}" name="durasi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="tanggalberangkat" class="col-sm-3 col-form-label">Tanggal Berangkat</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" value="{{ $wisata->tanggalberangkat}}" name="tanggalberangkat">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="linklokasi">Link Lokasi</label>
                                    <input type="text" class="form-control" value="{{ $wisata->linklokasi}}" name="linklokasi">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Wisata</label>
                                    <input id="deskripsi" type="hidden" value="{{ $wisata->deskripsi}}" name="deskripsi">
                                    <trix-editor input="deskripsi"></trix-editor>
                                </div>
                                <div class="form-group">
                                    <label for="fasilitas">Fasilitas Wisata</label>
                                    <input id="fasilitas" type="hidden" name="fasilitas" value="{{ $wisata->fasilitas}}">
                                    <trix-editor input="fasilitas"></trix-editor>
                                </div>
                                <div class="#">
                                    <button type="submit" class="btn btn-secondary " value="Simpan Data">Simpan</button>
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