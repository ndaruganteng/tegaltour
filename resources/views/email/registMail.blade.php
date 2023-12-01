<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di TegalTour</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #131B1B;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 50px;
            color: #f9f5f2;
        }
        .header {
            background-color: #513D34;
            color: #fff;
            text-align: center;
            padding: 20px;
            border-radius: 10px 10px 0 0;
        }
        .header h1 {
            font-size: 36px;
        }
        .card {
            border: none;
            background-color: #f9f5f2;
            padding: 20px;
            border-radius: 0 0 10px 10px;
            color: #000;
        }
        .card h1{
            font-size: 20px;
            color: #706C61;
        }
        .card h4 {
            font-size: 16px;
            color: #706C61;
        }
        .card p {
            margin-bottom: 10px;
        }
        .thank-you {
            text-align: center;
            margin-top: 20px;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container ">
        <div class="header">
            <h1>Selamat Datang di TegalTour Marketplace</h1>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <h1>Selamat akun anda telah dikonfimarsi oleh admin</h1>
                    <h4>Informasi Mitra:</h4>
                    <p>Nama  : {{ $details['nama_lengkap'] }}</p>
                    <p>Email : {{ $details['email'] }}</p>
                    <p>Alamat : {{ $details['alamat'] }}</p>
                </div>
            </div>
        </div>
        <div class="thank-you">
            <p>Terima kasih telah menjadi mitra kami!</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
