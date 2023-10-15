<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Wisata</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-container {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin: 30px auto;
        }
        .invoice-header {
            background-color: #909090;
            color: #fff;
            padding: 10px 0;
            border-radius: 10px 10px 10px 10px;
            text-align: center;
        }
        .invoice-header h1 {
            font-size: 36px;
        }
        .invoice-details {
            margin-top: 20px;
        }
        .invoice-details p {
            margin: 10px 0;
        }
        .invoice-table {
            margin-top: 30px;
        }
        .invoice-table table {
            border: 1px solid #ddd;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #ddd;
            text-align: center;
        }
        .invoice-table th {
            background-color: #909090;
            color: #fff;
        }
        .total-amount {
            font-size: 24px;
            font-weight: 700;
            color: #000;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="invoice-container">
            <div class="invoice-header">
                <h1>Invoice Wisata</h1>
            </div>
            <div class="invoice-details">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Pemesan:</strong></p>
                        <p>{{$pemesanan->nama_pengguna}}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Detail Pesanan:</strong></p>
                        <p>Tanggal Pesanan: {{$pemesanan->date}}</p>
                        <p>Status Pembayaran: 
                            @if($pemesanan->status == 2)
                            <span class="badge badge-success badge-status">Selesai</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="invoice-table">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Wisata</th>
                            <th>Tanggal Berangkat</th>
                            <th>Jumlah Orang</th>
                            <th>Harga/pax</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>{{$pemesanan->nama_wisata}}</td>
                            <td>{{$pemesanan->tanggal}}</td>
                            <td>{{$pemesanan->jumlah_orang}}</td>
                            <td>Rp. {{$pemesanan->harga}}</td>
                            <td>Rp. {{$pemesanan->hargatotal}}</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-right total-amount">Total Bayar: Rp. {{$pemesanan->hargatotal}}</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
