@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Pendapatan Biro Wisata</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pendapatan Biro Wisata</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-dark card-outline">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="pendapatan-table" class="table table-striped table-bordered text-center"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama Biro Wisata</th>
                                            <th>Nama Wisata</th>
                                            <th>Total Pemesan</th>
                                            <th>Total Pendapatan Kotor</th>
                                            <th>Total Pendapatan Bersih</th>
                                            <th>Total Potongan Admin</th>
                                            <!-- <th>Status Pendapatan</th>
                                            <th>Aksi</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($destinasi as $wisata)
                                        <tr>
                                            <td>{{ $wisata->nama_lengkap }}</td>
                                            <td>{{ $wisata->namawisata }}</td>
                                            <td>{{ $wisata->total_pemesan }}</td>
                                            <td>
                                                Rp{{ rtrim(number_format($wisata->total_harga, 2, ',', '.'), '0') }}
                                            </td>
                                            <td>
                                                Rp{{ rtrim(number_format($wisata->total_harga_potong, 2, ',', '.'), '0') }}
                                            </td>
                                            <td>Rp{{ rtrim(number_format($wisata->potongan, 2, ',', '.'), '0') }}</td>
                                            <!-- <td>
                                                @if ($wisata->status_pendapatan == 1)
                                                <span class="badge badge-success">Ditarik</span>
                                                @else
                                                <span class="badge badge-warning">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form method="post"
                                                    action="">
                                                    @csrf
                                                    @method('put')
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        Konfirmasi Penarikan
                                                    </button>
                                                </form>
                                            </td> -->
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