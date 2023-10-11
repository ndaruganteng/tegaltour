@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="m-0 ">Tambah Data Rekening</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('data-rekening.index') }}"> <i class="fa-solid fa-arrow-left mr-2"></i>Kembali</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-6 grid-margin">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="text-center ">Input Data Rekening</h3>
                        </div>
                        <div class="card-body">
                        <form action="{{ route('Rekening.index') }}"  method="post" enctype="multipart/form-data">
                         {{ csrf_field() }}
                         <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="image_rekening" class="col-form-label">Image</label>
                                    <input type="file" class="form-control" id="image_rekening" required="required" name="image_rekening" accept="image/*" onchange="previewImage(event)">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img id="image-preview" src="" class="img-thumbnail" style="display:none; max-width: 100%; max-height: 100px;" alt="Preview Image">
                            </div>
                         </div>
                            
                            <div class="form-group">
                                <label for="nama_bank">Nama Bank</label>
                                <input type="text" class="form-control" required="required"  name="nama_bank"  placeholder="Masukan Nama Bank">
                            </div>
                            <!-- <div class="form-group ">
                                <label for="nama_bank">Nama Bank</label>
                                <select class="custom-select form-control" required="required" name="nama_bank">
                                        <option value="">Pilih Bank </option>
                                        <option value="Bank BCA">Bank BCA</option>
                                        <option value="Bank BRI">Bank BRI</option>
                                        <option value="Bank MANDIRI">Bank MANDIRI</option>
                                        <option value="Bank BNI">Bank BNI</option>
                                    </select>                                      
                            </div> -->
                            <div class="form-group">
                                <label for="no_rekening">Nomor Rekening</label>
                                <input type="text" class="form-control" required="required"  name="no_rekening" placeholder="Masukan Nomor Rekening Rekening">
                            </div>
                            <div class="form-group">
                                <label for="nama_rekening">Nama Rekening</label>
                                <input type="text" class="form-control" required="required"  name="nama_rekening" placeholder="Masukan Nama Rekening">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-secondary " value="Simpan Data" >Simpan</button>
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