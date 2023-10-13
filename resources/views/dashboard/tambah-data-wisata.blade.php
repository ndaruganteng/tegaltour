@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="m-0 ">Tambah Paket Wisata</h2>
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
                            <h3 class="text-center ">Form Tambah Paket Wisata</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-sample" action="{{ route('Wisata.index') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group mb-2">
                                            <label for="image" class="col-form-label">Image</label>
                                            <input type="file" class="form-control" id="image" required="required" name="image" accept="image/*" onchange="previewImage(event)">
                                            <p class="fst-italic text-secondary">size foto maksimal 2 mb dan extensi jpg, png, jpeg</p>     
                                         </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <img id="image-preview" src="" class="img-thumbnail" style="display:none; max-width: 100%; max-height: 100px;" alt="Preview Image">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="namawisata" class="col-sm-3 col-form-label">Nama Paket Wisata</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" required="required"
                                                    name="namawisata" placeholder="Masukan Nama Paket Wisata">
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
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                                            <div class="col-sm-9">
                                                <select class="custom-select form-control" required="required" name="kategori">
                                                    <option value="">Pilih Kategori Wisata</option>
                                                    @foreach($kategori as $data)
                                                    <option value="{{$data->id_kategori}}">{{$data->nama_kategori}}</option>
                                                    @endforeach
                                                </select>
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

<script>
    function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = "";
            preview.style.display = 'none';
        }
    }
</script>

@endsection