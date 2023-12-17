@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="m-0 ">Edit Paket Wisata</h3>
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
                            <h5 class="text-center "> Form Edit Paket Wisata</h5>
                        </div>
                        <form class="form-sample" action="{{ url('/data-wisata/update/'.$wisata->id_wisata) }}" method="post" enctype="multipart/form-data">
                             @csrf
                            @method('put')
                            <div class="card-body">
                                <input type="hidden" name="id" id="id" value="{{ $wisata->id }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="image" class="col-sm-3 col-form-label">Gambar Wisata</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" value="{{ $wisata->image}}" name="image">
                                                <p class="text-secondary" style="font-size: 14px; font-style: italic;">size foto maksimal 2 mb dan extensi jpg, png, jpeg</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
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
                                            <label for="durasi" class="col-sm-3 col-form-label">Durasi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="{{ $wisata->durasi}}" name="durasi">
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
                                                    <option value="{{$data->id_kategori}}" {{ $data->id_kategori == $wisata->kategori ? 'selected' : '' }}>
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
                                                <input type="text" class="form-control"  id="hargaInput" value="{{ $wisata->harga}}" name="harga">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="jamberangkat" class="col-sm-3 col-form-label">Jam Berangkat</label>
                                            <div class="col-sm-9">
                                                <input type="time" class="form-control" value="{{ $wisata->jamberangkat}}" name="jamberangkat"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="tanggalberangkat" class="col-sm-3 col-form-label">Tanggal Berangkat</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="tanggalberangkat" 
                                                    value="{{ $wisata->tanggalberangkat }}" 
                                                    min="{{ $wisata->tanggalberangkat }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="titikkumpul" class="col-sm-3 col-form-label">Titik Kumpul</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="titikkumpul" 
                                                    value="{{ $wisata->titikkumpul }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="lokasi" class="col-sm-3 col-form-label">Highlight</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" rows="3" name="lokasi">{{ $wisata->lokasi}}</textarea>
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
                                <div>
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

<script>

    var tanggalBerangkatInput = document.querySelector('input[name="tanggalberangkat"]');

    // Mengatur tanggal minimal ke tanggal sekarang
    var today = new Date();
    var year = today.getFullYear();
    var month = (today.getMonth() + 1).toString().padStart(2, '0');
    var day = today.getDate().toString().padStart(2, '0');
    var currentDate = year + '-' + month + '-' + day;

    tanggalBerangkatInput.setAttribute('min', currentDate);

    // Memeriksa perubahan pada input tanggal
    tanggalBerangkatInput.addEventListener('change', function () {
        if (tanggalBerangkatInput.value < currentDate) {
            alert('Tanggal berangkat tidak boleh sebelum hari ini.');
            tanggalBerangkatInput.value = currentDate;
        }
    });
</script>

<script>
    document.getElementById('hargaInput').addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');

        if (parseInt(this.value) < 0) {
            this.value = '0';
        }
    });
</script>
@endsection