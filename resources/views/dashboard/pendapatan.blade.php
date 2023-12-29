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
                        <li class="breadcrumb-item active">Pendapatan Biro wisata </li>
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
                                            <th>Nama Wisata</th>
                                            <th>Total Pemesan</th>
                                            <th>Total Pendapatan</th>
                                            <th>Status Pendapatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($destinasi as $wisata)
                                        <tr>
                                            <td>{{ $wisata->namawisata }}</td>
                                            <td>{{ $wisata->total_pemesan }}</td>
                                            <td>Rp{{ number_format($wisata->total_harga_potong, 2) }}</td>
                                            <td>
                                                @if($wisata->status_pendapatan == null)
                                                <span class="badge badge-danger">Belum di ambil</span>
                                                @elseif($wisata->status_pendapatan == 1)
                                                <span class="badge badge-warning">Proses</span>
                                                @elseif($wisata->status_pendapatan == 2)
                                                <span class="badge badge-success">Saldo Telah Di Tarik</span>
                                                @elseif($wisata->status_pendapatan == 3)
                                                <span class="badge badge-danger">Penarikan Dicancel</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($wisata->status_pendapatan == null)
                                                <form
                                                    action="{{ route('tarik-saldo', ['namaWisata' => $wisata->namawisata]) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success tarik-saldo-btn"
                                                        data-id="{{ $wisata->id }}">Tarik Saldo</button>
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

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('pendapatan-table').addEventListener('click', function(event) {
        if (event.target.classList.contains('tarik-saldo-btn')) {
            const idWisata = event.target.getAttribute('data-id');
            fetch(`/tarik-saldo/${idWisata}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    updateStatus(idWisata, data.status_pendapatan);
                    Swal.fire({
                        title: 'Sukses',
                        text: 'Penarikan Saldo telah dikonfirmasi',
                        icon: 'success',
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    });

    function updateStatus(id, newStatus) {
        const statusElement = document.getElementById(`status_${id}`);
        if (statusElement) {
            switch (newStatus) {
                case null:
                    statusElement.innerHTML = '<span class="badge badge-danger">Belum di ambil</span>';
                    break;
                case 1:
                    statusElement.innerHTML = '<span class="badge badge-warning">Proses</span>';
                    break;
                case 2:
                    statusElement.innerHTML = '<span class="badge badge-success">Saldo Telah Di Tarik</span>';
                    break;
                case 3:
                    statusElement.innerHTML = '<span class="badge badge-danger">Penarikan Dicancel</span>';
                    break;
                default:
                    break;
            }
        }
    }
});
</script>

@endsection