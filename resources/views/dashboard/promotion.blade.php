@extends('dashboard.layouts.app')
@section('content')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Promotion</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Promotion</li>
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
                                    <form action="{{route('promotion.search_promotion') }}" method="GET">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="search_promotion" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>  
                                </div>
                                <a href="{{route('tambah-promotion.index')}}" class="btn bg-dark btn-sm">
                                    <i class="fa-solid fa-plus mr-1"></i>
                                    Tambah Promosi
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                    <th>Image</th>
                                    <th>Nama Promotion</th>
                                    <th>Aksi</th>
                                    </tr>
                                </thead>
                                @foreach($promotion as $p)
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{asset('storage/image/promotion/'.$p->image_promotion)}}" alt="wisata" style="width:100px">
                                        </td>
                                        <td>{{ $p->nama_promotion}}</td>
                                        <td>
                                            <a href="/promotion/edit/{{ $p->id}}" class="btn btn-info btn-sm" >
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="/promotion/hapus/{{ $p->id}}" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <div class="pt-3">
                                {{ $promotion->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>

@endsection