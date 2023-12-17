@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
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

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="order-table" class="table table-striped table-bordered  text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Bukti Tf</th>
                                            <th>Nama Paket Wisata</th>
                                            <th>Nama Pemesan</th>
                                            <th>Status Perjalalanan</th>
                                            <th>Status Pemesanan</th>
                                            <th>Jam Berangkat</th>
                                            <th>Tanggal Berangkat</th>
                                            <th>Tanggal Pemesanan</th>
                                            <th>Jumlah Orang</th>
                                            <th>Harga/Orang</th>
                                            <th>Harga Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        @foreach($pemesanan as $p)
                                            <tr>
                                                <td>
                                                    @if($p->bukti_pembayaran)
                                                        <a href="#" data-toggle="modal" data-target="#buktiModal{{$p->id_pemesanan}}" data-whatever="@getbootstrap">
                                                            <img src="{{ asset('storage/image/bukti-transfer/' . $p->bukti_pembayaran) }}" alt="wisata" style="width: 50px;">
                                                        </a>
                                                    @else
                                                        <h1 class="p-3 text-center" style="font-size:10px">Bukti Transfer Kosong</h1>
                                                    @endif
                                                </td>
                                                
                                                <td>{{$p->nama_wisata}}</td>
                                                <td>{{$p->nama_pengguna}}</td>
                                                @if($p->status == 4)
                                                <td>
                                                    <p>-</p>
                                                </td>
                                                @else
                                                <td>
                                                    @if($p->status_perjalanan == null)
                                                    <p class="card-text" > <span class="badge badge-warning">Menunggu</span> </p>
                                                    @elseif($p->status_perjalanan == 2)
                                                    <p class="card-text" ><span class="badge badge-info">Berangkat</span> </p>
                                                    @elseif($p->status_perjalanan == 3)
                                                    <p class="card-text" ><span class="badge badge-success">Selesai</span> </p>
                                                    @endif
                                                </td>
                                                @endif
                                                <td>
                                                    @if($p->status == null)
                                                        <div class="badge badge-warning">Belum disetuji </div>
                                                    @elseif($p->status == 2)
                                                        <div class="badge badge-success"> Dikonfirmasi</div>
                                                    @elseif($p->status == 3)
                                                        <div class="badge badge-success"> Dikonfirmasi</div>
                                                    @elseif($p->status == 4)
                                                        <div class="badge badge-danger"> Dibatalkan</div>
                                                    @endif
                                                </td>
                                                <td>{{$p->jamberangkat}} WIB</td>
                                                <td>{{ \Carbon\Carbon::parse($p->tanggal)->locale('id')->isoFormat('dddd, D MMMM Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($p->date)->locale('id')->isoFormat('dddd, D MMMM Y') }}</td>
                                                <td>{{ $p->jumlah_orang}}</td>
                                                <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                                                <td>Rp {{ number_format($p->hargatotal, 0, ',', '.') }}</td>
                                                <td>
                                                    @if($p->status == null)
                                                        <form  method="post" action="{{route('konfirmasi', ['id_pemesanan'=> $p->id_pemesanan])}}">
                                                            @csrf
                                                            @method('put')
                                                            <button type="submit" class="btn btn-success btn-sm">
                                                                <i class="fa-solid fa-check"></i>  
                                                            </button>
                                                        </form>
                                                        <form  method="post" action="{{route('cancel', ['id_pemesanan'=> $p->id_pemesanan])}}">
                                                            @csrf
                                                            @method('put')
                                                            <button type="submit" class="btn btn-danger btn-sm mt-1">
                                                                <i class="fa-solid fa-xmark"></i>  
                                                            </button>
                                                        </form>
                                                    @else
                                                        <a href="/data-order/hapus/{{ $p->id_pemesanan }}" class="btn btn-danger btn-sm delete-button-pemesanan">
                                                            <i class="fa-solid fa-trash"></i> 
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            <!-- modal bukti -->
                                            <div class="modal fade" id="buktiModal{{$p->id_pemesanan}}" tabindex="-1" role="dialog" aria-labelledby="buktiModalLabel{{$p->id_pemesanan}}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="buktiModalLabel">Bukti Transfer</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class=" text-center">
                                                                <img src="{{asset('storage/image/bukti-transfer/'.$p->bukti_pembayaran)}}"  alt="wisata" class="img-fluid"/>   
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal bukti -->
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
    const deleteButtons = document.querySelectorAll('.delete-button-pemesanan');

    deleteButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();

            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: 'Apakah Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = e.target.getAttribute('href');
                }
            });
        });
    });
</script>


@endsection