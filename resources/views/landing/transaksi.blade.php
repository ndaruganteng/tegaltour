@extends('landing.layouts.app')
@section('content')

<div class="content-wrapper">

    <div class="content cart">
        <div class="container">
            <h2 class="text-center fw-bold">Transaksi</h2>
            <div class="row">
                <div class="col-md-12 col-lg-4 mt-3">
                    <!-- <div class="col-lg-12">
                            <div class="card  shadow-0 mt-3 border">
                                <div class="card-header text-center" style="font-size: 18px; font-weight: bold;">Daftar Rekening TegalTour</div>
                                    @foreach($rekening as $p)
                                        <div class="card-body">
                                            <img src="{{asset('storage/image/rekening/'.$p->image_rekening)}}" class="card-img-top float-left" style="width: 100px; height: 100px; margin-right: 20px; margin-bottom: 10px;"/>
                                            <h5 style="font-size: 14px; font-weight: bold;">{{ $p->nama_bank }}</h5>
                                            <p style="font-size: 14px; ">{{ $p->no_rekening }}</p>
                                            <p style="font-size: 14px; margin-top: -10px;">A/N: {{ $p->nama_rekening }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div> -->
                    <div class="col-lg-12">
                        <div class="accordion mt-3" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button data-mdb-collapse-init class="accordion-button" type="button"
                                        data-mdb-toggle="collapse" data-mdb-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne" style="font-size: 18px; font-weight: bold;">
                                        Daftar Rekening TegalTour
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-mdb-parent="#accordionExample">
                                    <div class="accordion-body">
                                        @foreach($rekening as $p)
                                            <img src="{{asset('storage/image/rekening/'.$p->image_rekening)}}" class="card-img-top float-left" style="width: 80px; height: 80px; margin-right: 30px; margin-bottom: 10px;"/>
                                            <h5 style="font-size: 14px; font-weight: bold;">{{ $p->nama_bank }}</h5>
                                            <p style="font-size: 14px; ">{{ $p->no_rekening }}</p>
                                            <p style="font-size: 14px; margin-top: -10px;">A/N: {{ $p->nama_rekening }}</p>
                                            <hr>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8 mt-3">
                    @if($pemesanan->isEmpty())
                    <h5 class="p-3 text-center">Tidak Ada Transaksi</h5>
                    @else
                        @foreach($pemesanan as $p)
                            @if($p->status == null)
                                <div class="card mt-3">
                                    <div class="row g-0">
                                        <div class="col-md-12 p-3">
                                            <img src="{{asset('storage/image/wisata/'.$p->image)}}" class="img-thumbnail"
                                                style="width: 100%; height: 100%;" />
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <h5 class="card-title">Wisata : {{$p->nama_wisata}}</h5>
                                                <p class="card-text">Nama Pemesan: {{$p->nama_pengguna}} </p>
                                                <p class="card-text" style="margin-top: -10px;">Tanggal Pemesanan : {{
                                                    \Carbon\Carbon::parse($p->date)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                                                </p>
                                                <p class="card-text" style="margin-top: -10px;">Tanggal Berangkat : {{
                                                    \Carbon\Carbon::parse($p->tanggal)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                                                </p>
                                                <p class="card-text" style="margin-top: -10px;">Jam Berangkat : {{$p->jamberangkat}}
                                                    WIB</p>
                                                <p class="card-text" style="margin-top: -10px;">Jumlah Orang : {{$p->jumlah_orang}}
                                                    Orang</p>
                                                <p class="card-text" style="margin-top: -10px;">Harga/pax : Rp {{
                                                    number_format($p->harga, 0, ',', '.') }}</p>
                                                @if($p->status == 2)
                                                <p class="card-text" style="margin-top: -10px;">Harga Total : Rp.{{$p->hargatotal}}
                                                </p>
                                                @endif
                                                @if($p->bukti_pembayaran)
                                                <p class="card-text" style="margin-top: -10px;">Status Transaksi:
                                                    @if($p->status == null)
                                                    <span class="badge badge-danger">Menunggu konfirmasi!</span>
                                                    @else($p->status == 2)
                                                    <span class="badge badge-success">Telah dikonfimarsi!</span>
                                                    @endif
                                                </p>
                                                @endif
                                                <p class="card-text" style="margin-top: -10px;"> Transaksi :
                                                    @if($p->bukti_pembayaran)
                                                    <span class="badge badge-success">Sudah Melakukan Transaksi</span>
                                                    @else
                                                    <span class="badge badge-danger">Belum Melakukan Transaksi</span>
                                                    @endif
                                                </p>
                                                @if($p->bukti_pembayaran)
                                                @else
                                                <div class="alert alert-warning">
                                                    Harga Yang harus Dibayar : Rp {{ number_format($p->hargatotal, 0, ',', '.') }}
                                                </div>
                                                @endif
                                                <div>
                                                    @if($p->bukti_pembayaran)
                                                    @else
                                                    <button type="button" class="btn btn-dark shadow-0 btn-sm mt-2"
                                                        data-toggle="modal" data-target="#buktiModal{{$p->id_pemesanan}}"
                                                        data-whatever="@getbootstrap">
                                                        <i class="fa-solid fa-upload me-2"></i>Upload Bukti transfer
                                                    </button>
                                                    <a href="/data-order/hapus/{{ $p->id_pemesanan }}"
                                                        class="btn btn-danger btn-sm shadow-0 delete-button-pemesanan mt-2">
                                                        <i class="fa-solid fa-circle-xmark me-2"></i> Cancel
                                                    </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="buktiModal{{$p->id_pemesanan}}" tabindex="-1" role="dialog"
                                            aria-labelledby="buktiModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="buktiModalLabel{{$p->id_pemesanan}}">Upload
                                                            Bukti Transfer</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/upload-bukti_pembayaran/{{$p->id_pemesanan}}" method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group ">
                                                                <label class="col-form-label">Bukti transfer</label>
                                                                <input type="file" id="bukti_pembayaran" class="form-control"
                                                                    name="bukti_pembayaran" accept="image/*"
                                                                    onchange="previewImage(event)" require>
                                                            </div>
                                                            <div class="col-lg-12 mb-3">
                                                                <img id="image-preview" src="" class="img-thumbnail"
                                                                    style="display:none; max-width: 100%; max-height: 100%;"
                                                                    alt="Preview Image">
                                                            </div>

                                                            <div class="modal-footer ">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-black">Kirim</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
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
                    title: 'Konfirmasi Batal',
                    text: 'Apakah Anda yakin ingin membatalkan Pemesanan Paket wisata ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Batal',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = e.target.getAttribute('href');
                    }
                });
            });
        });
    </script>

    <script>
        function previewImage(event) {
            var input = event.target;
            var preview = document.getElementById('image-preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = "";
                preview.style.display = 'none';
            }
        }
    </script>

</div>

@endsection