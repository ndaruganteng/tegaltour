@extends('dashboard.layouts.app')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="m-0 ">Tambah Data Promotion</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('promotion.index') }}"> <i class="fa-solid fa-arrow-left mr-2"></i>Kembali</a></li>
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
                        <form action="{{ route('Promotion.index') }}"  method="post" enctype="multipart/form-data">
                         {{ csrf_field() }}
                            <div class="form-group">
                                <label for="image_promotion">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" required="required"  name="image_promotion" >
                                        <label class="custom-file-label" for="image_promotion">Image</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_promotion">Nama Bank</label>
                                <input type="text" class="form-control" required="required"  name="nama_promotion"  placeholder="Masukan Nama image">
                            </div>
                            <div class="#">
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
@endsection