@extends('dashboard.layouts.app')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="m-0 ">Edit Data promotion</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="{{ route('promotion.index') }}"> <i class="fa-solid fa-arrow-left mr-2"></i>Kembali</a></li>
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
                            <h3 class="text-center ">Edit Data Promotion</h3>
                        </div>
                        <form action="{{ url('/promotion/update/'.$promotion->id) }}"  method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                            <input type="hidden" name="id" id="id" value="{{ $promotion->id }}">
                                <div class="form-group">
                                    <label for="image_promotion">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" value="{{ $promotion->image_promotion}}"  name="image_promotion" >
                                            <label class="custom-file-label" for="image_promotion"> {{ $promotion->image_promotion}} </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_promotion">Nama Promotion</label>
                                    <input type="text" class="form-control" value="{{ $promotion->nama_promotion}}"  name="nama_promotion"  placeholder="Masukan Nama Promotion">
                                </div>
                                <div class="#">
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