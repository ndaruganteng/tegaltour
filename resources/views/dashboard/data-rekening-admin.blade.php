@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
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

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="rekeningadmin-table" class="table table-striped table-bordered text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                        <th>Nama Mitra</th>
                                            <th>Image</th>
                                            <th>Nama Bank</th>
                                            <th>Nomor Rekening</th>
                                            <th>Nama Rekening</th>
                                        </tr>
                                    </thead>                           
                                    <tbody>
                                        @foreach($rekening as $p)
                                            <tr>
                                                <td>{{ $p->nama}}</td>
                                                <td>
                                                    <img src="{{asset('storage/image/rekening/'.$p->image_rekening)}}" alt="wisata" style="width:50px; heigth:auto;">
                                                </td>  
                                                <td>{{ $p->nama_bank}}</td>
                                                <td>{{ $p->no_rekening}}</td>
                                                <td>{{ $p->nama_rekening}}</td>
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