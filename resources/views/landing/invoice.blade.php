<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Wisata</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="text-center">
                    <h1>Invoice Wisata</h1>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Pemesan:</strong></p>
                        <p>Nama: {{$pemesanan->nama_pengguna}}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Detail Pesanan:</strong></p>
                        <p>Tanggal Pesanan:  {{$pemesanan->date}}</p>
                        @if($pemesanan->status == 2)
                        <p>Status Pembayaran : <span class="badge badge-success">Selesai</span></p>
                        @endif
                    </div>
                </div>
                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Wisata</th>
                            <th>Jumlah Orang</th>
                            <th>Harga/pax</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>{{$pemesanan->nama_wisata}}</td>
                            <td>{{$pemesanan->jumlah_orang}}</td>
                            <td>Rp. {{$pemesanan->harga}} </td>
                            <td>Rp. {{$pemesanan->hargatotal}}</td>
                        </tr>
                    </tbody>
                </table>
                <hr>
            </div>
        </div>
    </div>
</body>
</html>
