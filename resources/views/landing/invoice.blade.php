
<div class="content-wrapper">

    <div class="container">
        <h1>Invoice Wisata</h1>
        <div class="row">
            <div class="col-md-6">
                <h3>Informasi Wisata</h3>
                <p>Nama Wisata: {{$pemesanan->nama_wisata}}</p>
                <p>Tanggal Berangkat: {{$pemesanan->tanggal}}</p>
                <p>Tanggal Pemesanan: {{$pemesanan->date}}</p>
            </div>
            <div class="col-md-6">
                <h3>Detail Pembayaran</h3>
                <p>Harga/pax: Rp {{$pemesanan->nama_wisata}}</p>
                <p>Total Biaya: Rp {{$pemesanan->harga}}</p>
            </div>
        </div>
    </div>
</div>

