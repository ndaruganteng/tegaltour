@extends('dashboard.layouts.app')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="m-0 ">Tambah Data Wisata</h2>
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
                            <h3 class="text-center ">Input Data Tour</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-sample" action="{{ route('Wisata.index') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="form-group mb-2">
                                    <label for="image">Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" required="required"  name="image">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <p class="fst-italic text-secondary">size foto maksimal 2 mb dan extensi jpg, png, jpeg</p>             
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="namawisata" class="col-sm-3 col-form-label">Nama Wisata</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" required="required"
                                                    name="namawisata" placeholder="Masukan Nama Wisata">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="lokasi" class="col-sm-3 col-form-label">Lokasi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" required="required"
                                                    name="lokasi" placeholder="Masukan Lokasi Wisata">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" required="required"
                                                    name="kategori" placeholder="Masukan Kategori Wisata">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="harga" class="col-sm-3 col-form-label">Harga Wisata</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" required="required"
                                                    name="harga" placeholder="Masukan Harga Wisata">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="durasi" class="col-sm-3 col-form-label">Durasi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" required="required"
                                                    name="durasi" placeholder="Masukan Kuota Tour">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="tanggalberangkat" class="col-sm-3 col-form-label">Tanggal Berangkat</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" required="required" name="tanggalberangkat"
                                                    placeholder="Masukan Tanggal Berangkat">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="linklokasi">Link Lokasi</label>
                                    <input type="text" class="form-control" required="required" name="linklokasi"
                                        placeholder="Masukan Link Lokasi Wisata">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Wisata</label>
                                    <input id="deskripsi" type="hidden" name="deskripsi">
                                    <trix-editor input="deskripsi"></trix-editor>
                                </div>
                                <div class="form-group">
                                    <label for="fasilitas">Fasilitas Wisata</label>
                                    <input id="fasilitas" type="hidden" name="fasilitas">
                                    <trix-editor input="fasilitas"></trix-editor>
                                </div>
                                <div class="#">
                                    <button type="submit" class="btn btn-secondary " value="Simpan Data">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection