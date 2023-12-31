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
                                            <th>Total Wisatawan</th>
                                            <th>Total Pendapatan Kotor</th>
                                            <th>Total Pendapatan Bersih</th>
                                            <th>Total Potongan Admin</th>
                                            <th>Pajak</th>
                                            <th>Status Pendapatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($destinasi as $wisata)
                                        <tr>
                                            <td>{{ $wisata->nama_lengkap }}</td>
                                            <td>{{ $wisata->namawisata }}</td>
                                            <td>{{ $wisata->total_pemesan }}</td>
                                            <td>{{ $wisata->jumlah_orang }}</td>
                                            <td>
                                                Rp{{ number_format($wisata->total_harga, 2, ',', '.'), '0' }}
                                            </td>
                                            <td>
                                                Rp{{ number_format($wisata->total_harga_potong, 2, ',', '.'), '0' }}
                                            </td>
                                            <td>Rp{{ rtrim(number_format($wisata->potongan, 2, ',', '.'), '0') }}</td>
                                            <td><span class="badge badge-dark">10%</span></td>
                                            <td>
                                                @if($wisata->status_pendapatan == null)
                                                <span class="badge badge-dark">belum di tarik</span>
                                                @elseif($wisata->status_pendapatan == 1)
                                                <span class="badge badge-warning">Request Tarik Saldo</span>
                                                @elseif($wisata->status_pendapatan == 2)
                                                <span class="badge badge-success">Saldo telah Ditarik</span>
                                                @elseif($wisata->status_pendapatan == 3)
                                                <span class="badge badge-danger">Penarikan Di cancel</span>
                                                @endif
                                            </td>
                                            <td>

                                                @if($wisata->status_pendapatan == 1)
                                                <form
                                                    action="{{ route('konfirmasi-tarik-saldo', ['namaWisata' => $wisata->namawisata]) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-sm btn-success mt-2 ">Konfirmasi</button>
                                                </form>
                                                @else
                                                <p>-</p>
                                                @endif
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


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const konfirmasiButtons = document.querySelectorAll('.konfirmasi');

    konfirmasiButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();

            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin melanjutkan?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = button.getAttribute('href');
                }
            });
        });
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const cancelButtons = document.querySelectorAll('.cancel');

    cancelButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();

            Swal.fire({
                title: 'Konfirmasi Pembatalan',
                text: 'Apakah Anda yakin ingin membatalkan?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = button.getAttribute('href');
                }
            });
        });
    });
});
</script>

@endsection