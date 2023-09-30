@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Data Rekening </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
              <li class="breadcrumb-item active"> Data Rekening</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div class="card-tools">
                                    <form action="{{route('rekening.search_data_rekening') }}" method="GET">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="search_data_rekening" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>    
                                </div>
                                <a href="{{route('tambah-data-rekening.index')}}"  class="btn bg-dark btn-sm">
                                    <i class="fa-solid fa-plus mr-1"></i>
                                    Tambah Rekening
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                    <th>Image</th>
                                    <th>Nama Bank</th>
                                    <th>Nomor Rekening</th>
                                    <th>Nama Rekening</th>
                                    <th>Aksi</th>
                                    </tr>
                                </thead>
                                @foreach($rekening as $p)
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{asset('storage/image/rekening/'.$p->image_rekening)}}" alt="wisata" style="width:100px">
                                        </td>
                                        <td>{{ $p->nama_bank}}</td>
                                        <td>{{ $p->no_rekening}}</td>
                                        <td>{{ $p->nama_rekening}}</td>
                                        <td>
                                            <a href="/data-rekening/edit/{{ $p->id_rekening }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="/data-rekening/hapus/{{ $p->id_rekening }}" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection