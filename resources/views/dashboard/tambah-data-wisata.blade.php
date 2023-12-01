@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="m-0 ">Tambah Paket Wisata</h3>
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
                    <div class="card card-primary card-outline">
                        <div class="card-header" style="background-color: white;">
                            <h4 class="text-center ">Form Tambah Paket Wisata</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-sample" action="{{ route('Wisata.index') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <!-- <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group mb-2">
                                            <label for="image" class="col-form-label">Image</label>
                                            <input type="file" class="form-control" id="image" required="required" name="image" accept="image/*" onchange="previewImage(event)">
                                            @if ($errors->has('image'))
                                                <div class="text-danger">{{ $errors->first('image') }}</div>
                                            @endif
                                            <p class="fst-italic text-secondary">size foto maksimal 2 mb dan extensi jpg, png, jpeg</p>     
                                         </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <img id="image-preview" src="" class="img-thumbnail" style="display:none; max-width: 100%; max-height: 100px;" alt="Preview Image">
                                    </div>
                                </div>                                -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="image" class="col-sm-3 col-form-label">Gambar Wisata</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" required="required"
                                                    name="image" accept="image/*" id="image" onchange="previewImage(event)"
                                                >
                                                <p class="text-secondary" style="font-size: 14px; font-style: italic;">size foto maksimal 2 mb dan extensi jpg, png, jpeg</p>
                                                @if ($errors->has('image'))
                                                    <div class="text-danger">{{ $errors->first('image') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group row">                                        
                                            <img id="image-preview" src="" class="img-thumbnail" style="display:none; max-width: 100%; max-height: 100px;" alt="Preview Image">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="namawisata" class="col-sm-3 col-form-label">Nama Paket Wisata</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" required="required"
                                                    name="namawisata" value="{{ old('namawisata') }}"  placeholder="Masukan Nama Paket Wisata">
                                                    @if($errors->has('namawisata'))
                                                        <p class="text-danger">{{ $errors->first('namawisata') }}</p>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="durasi" class="col-sm-3 col-form-label">Durasi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" required="required"
                                                    name="durasi" value="{{ old('durasi') }}" placeholder="Masukan Kuota Tour">
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
                                                        <option value="{{$data->id_kategori}}" {{ old('kategori') == $data->id_kategori ? 'selected' : '' }}>
                                                            {{$data->nama_kategori}}
                                                        </option>
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
                                                    name="harga" value="{{ old('harga') }}" placeholder="Masukan Harga Wisata">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="jam_berangkat" class="col-sm-3 col-form-label">Jam Berangkat</label>
                                            <div class="col-sm-9">
                                                <input type="time" class="form-control" required="required"
                                                    name="jamberangkat" value="{{ old('jam_berangkat') }}" placeholder="Masukan Titik Kumpul Wisata">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="tanggalberangkat" class="col-sm-3 col-form-label">Tanggal Berangkat</label>
                                            <div class="col-sm-9">
                                                <input type="date" value="{{ old('tanggalberangkat') }}" class="form-control" required="required" name="tanggalberangkat"
                                                    placeholder="Masukan Tanggal Berangkat">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="titikkumpul" class="col-sm-3 col-form-label">Titik Kumpul</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="{{ old('titikkumpul') }}" required="required" name="titikkumpul"
                                                    placeholder="Masukan Titik Kumpul">
                                                @if($errors->has('titikkumpul'))
                                                    <p class="text-danger">{{ $errors->first('titikkumpul') }}</p>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="lokasi" class="col-sm-3 col-form-label">Highlight Wisata</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="{{ old('lokasi') }}" required="required" name="lokasi"
                                                    placeholder="Masukan Highlight Wisata">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="linklokasi">Link Lokasi</label>
                                    <input type="text" class="form-control" required="required" value="{{ old('linklokasi') }}" name="linklokasi"
                                        placeholder="Masukan Link Lokasi Wisata">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Wisata</label>
                                    <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
                                    <trix-editor input="deskripsi"></trix-editor>
                                </div>
                                <div class="form-group">
                                    <label for="fasilitas">Fasilitas Wisata</label>
                                    <input id="fasilitas" type="hidden" name="fasilitas" value="{{ old('fasilitas') }}">
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

<script>
    $('#image').on('change', function() {
        if ($(this).is(':invalid')) {
            $(this).val('');
        }
    });
</script>

<script>

    var tanggalBerangkatInput = document.querySelector('input[name="tanggalberangkat"]');

    var today = new Date();
    var year = today.getFullYear();
    var month = (today.getMonth() + 1).toString().padStart(2, '0');
    var day = today.getDate().toString().padStart(2, '0');
    var currentDate = year + '-' + month + '-' + day;

    tanggalBerangkatInput.setAttribute('min', currentDate);

    tanggalBerangkatInput.addEventListener('change', function () {
        if (tanggalBerangkatInput.value < currentDate) {
            alert('Tanggal berangkat tidak boleh sebelum hari ini.');
            tanggalBerangkatInput.value = currentDate;
        }
    });
</script>




@endsection