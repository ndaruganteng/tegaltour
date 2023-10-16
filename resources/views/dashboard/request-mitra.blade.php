@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Data User </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
              <li class="breadcrumb-item active"> Data User</li>
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
                                <h3 class="card-title">Data User</h3>
                                <div class="card-tools">
                                    <form action="{{route('users.search_user') }}" method="GET">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="search_user"  id="search_user" class="form-control float-right" placeholder="Search" >
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
                                        <th>Bukti Mitra</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>No Telephone</th>
                                        <th>Role</th> 
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @foreach($users as $p)
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#buktimitraModal{{$p->id}}" data-whatever="@getbootstrap">
                                                <img src="{{ asset('storage/image/bukti-mitra/' . $p->bukti_mitra) }}" alt="wisata" style="width: 50px;">
                                            </a>
                                        </td>
                                        <td>{{$p->nama_lengkap}}</td>
                                        <td>{{$p->alamat}}</td>
                                        <td>{{$p->email}}</td>
                                        <td>{{$p->no_telepon}}</td>
                                        <td>
                                            <span class="badge badge-dark">{{$p->role}}</span>
                                        </td>
                                        <td>
                                            <a class="btn btn-success btn-sm" href="/konfirmasi-mitra/{{$p->id}}">
                                                <i class="fa-solid fa-envelope"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                <div class="modal fade" id="buktimitraModal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="buktimitraModalLabel{{$p->id}}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="buktimitraModalLabel">Bukti Transfer</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class=" text-center">
                                                        <img src="{{asset('storage/image/bukti-mitra/'.$p->bukti_mitra)}}"  alt="wisata" class="img-fluid"/>   
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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