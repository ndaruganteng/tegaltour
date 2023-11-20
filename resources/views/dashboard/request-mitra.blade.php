@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0"> Request Mitra </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
              <li class="breadcrumb-item active"> Requset Mitra</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="requestmitra-table" class="table table-striped table-bordered text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama Bisnis</th>
                                            <th>Alamat Lengkap</th>
                                            <th>Email</th>
                                            <th>No Telephone</th>
                                            <th>Role</th> 
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $p)
                                            <tr>
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
                                                    <a class="btn btn-danger btn-sm" href="/cancel-mitra/{{$p->id}}">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </a>
                                                </td>
                                            </tr>                       
                                        @endforeach
                                    </tbody>     
                                </table>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection