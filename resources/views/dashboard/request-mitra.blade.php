@extends('dashboard.layouts.app')
@section('content')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Request Mitra </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Request Mitra</li>
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
                                <h3 class="card-title">Data Request Mitra</h3>
                                <div class="card-tools">
                                    <form action="{{route('mitra.search_data_mitra') }}" method="GET">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="search_data_mitra" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>  
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <th>Nama Bisnis</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @foreach($mitra as $p)
                                <tbody>
                                    <tr>
                                        <td>{{$p->nama_lengkap}}</td>
                                        <td>{{$p->nama_bisnis}}</td>
                                        <td>{{$p->alamat}}</td>
                                        <td>{{$p->telepon}}</td>
                                        <td>{{$p->email}}</td>
                                        <td>{{$p->password}}</td>
                                        <td>
                                            <a href="/request-mitra/hapus/{{ $p->id_mitra }}" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <div class="pt-3">
                                {{ $mitra->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>


@endsection