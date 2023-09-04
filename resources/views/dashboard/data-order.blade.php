@extends('dashboard.layouts.app')
@section('content')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Data Order </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
              <li class="breadcrumb-item active"> Data Order</li>
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
                                <h3 class="card-title">Data Order</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th>Bukti Tf</th>
                                        <th>Nama Tour</th>
                                        <th>Nama Pembeli</th>
                                        <th>Tanggal Berangkat</th>
                                        <th>Jumlah Orang</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#buktiModal" data-whatever="@getbootstrap">
                                                <img src="images/dashboard/bukti.jpg" alt="wisata" style="width:50px" >
                                            </a>
                                        </td>
                                        <td>Wisata Tegal</td>
                                        <td>Jamal</td>
                                        <td>11-7-2014</td>
                                        <td>1 Orang</td>
                                        <td>
                                            <span class="badge badge-success">Disetuji</span>
                                        </td>
                                        <td>
                                            <!-- <button class="btn btn-success btn-sm">
                                                <i class="fas fa-check"></i>
                                            </button> -->
                                            <a class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#buktiModal" data-whatever="@getbootstrap">
                                                <img src="images/dashboard/bukti.jpg" alt="wisata" style="width:50px" >
                                            </a>
                                        </td>
                                        <td>Wisata Tegal</td>
                                        <td>Jamal</td>
                                        <td>11-7-2014</td>
                                        <td>1 Orang</td>
                                        <td>
                                            <span class="badge badge-danger">Belum Disetuji</span>
                                        </td>
                                        <td>
                                            <button class="btn btn-success btn-sm">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- modal bukti -->
    <div class="modal fade" id="buktiModal" tabindex="-1" role="dialog" aria-labelledby="buktiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buktiModalLabel">Bukti Transfer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="p-2">
                        <img src="images/dashboard/bukti.jpg"  alt="wisata" class="img-fluid"/>   
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection