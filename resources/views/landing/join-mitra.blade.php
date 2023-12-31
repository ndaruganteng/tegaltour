@extends('landing.layouts.app') 
@section('content')

<div class="content-wrapper">
    
    <div class="content mitra">
        <div class="container">
            <h1 class="text-center">Gabung Menjadi Mitra</h1>
            <p class="text-center">Anda mempunyai bisnis di bidang pariwisata? <br>Bergabunglah menjadi mitra dan nikmati berbagai keuntungan menarik bersama kami.</p>
            <div class="row d-flex justify-content-center align-items-center h-100">
                @if (Session::has('message'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="images/mitra/mitra.png"
                    class="img-fluid" alt="Sample image" style="width: 100;">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 "  >
                    <form action="{{ route('Mitra.index') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}                       
                        <div class="divider d-flex align-items-center my-3">
                            <h4 class="text-center fw-bold">Form Pengajuan Gabung Mitra</h4>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12 col-lg-8">
                                <label class="form-label" for="customFile">Foto Profile</label>
                                <input type="file" name="profile_picture" id="profile_picture" accept="image/*" onchange="previewImage(event)" class="form-control"/>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <img id="image-preview" src="" class="rounded-circle border border-2 border-dark m-2" style="display:none; max-width: 100px; max-height: 100px;" alt="Preview Image">
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <input type="text" class="form-control form-control-lg"
                                placeholder="Nama Bisnis" required="required" name="nama_lengkap" value="{{ old('nama_lengkap') }}" />
                            <label class="form-label" for="nama_lengkap">Nama Bisnis</label>
                        </div>
                        <div class="form-outline mb-3">
                            <input type="text" class="form-control form-control-lg"
                                placeholder="No Telepon" required="required" name="telepon" value="{{ old('telepon') }}" />
                            <label class="form-label" for="telepon">No Telepon</label>
                        </div>
                        <div class="form-outline mb-3">
                            <input type="text" class="form-control form-control-lg"
                                placeholder="Masukan Alamat Bisnis" required="required" name="alamat" value="{{ old('alamat') }}" />
                            <label class="form-label" for="alamat">Alamat Lengkap </label>
                        </div>
                        <div class="form-outline mb-3">
                            <input type="text" class="form-control form-control-lg"
                                placeholder="Masukan Rekening Bisnis" required="required" name="rekening" value="{{ old('rekening') }}" />
                            <label class="form-label" for="alamat">Rekening Bisnis</label>
                        </div>
                        <div class="form-outline mb-3">
                            <input type="email" class="form-control form-control-lg"
                                placeholder="Enter" required="required" name="email" value="{{ old('email') }}" />
                            <label class="form-label" for="email">Email</label>
                        </div>
                        <div class="form-outline mb-2">
                            <input type="password" class="form-control form-control-lg" placeholder="Enter password" required="required" name="password" id="password" value="{{ old('password') }}" />
                            <label class="form-label" for="password">Password</label>
                            <span toggle="#password" class="password-toggle-icon fa fa-eye"></span>
                        </div>
                        <div id="passwordMessage" class="mb-3"></div>
                        <div class="text-center text-lg-start">
                            <button type="submit" class="btn btn-dark "
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Join Mitra</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="content cj-mitra">
        <div class="container ">
            <h1 class="text-center ">Bagaimana Cara Gabung Menjadi Mitra?</h1>
            <div class="col-md-12 col-lg-10 mx-auto ">
                <div class="row">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/mitra/number-1.png" alt="" class="float-left" />
                        <h4>Daftar Menjadi Mitra</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, a.</p>
                    </div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <img src="images/mitra/number-2.png" alt="" class="float-left" />
                        <h4>Tambahkan Layanan</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod, dolor.</p>
                    </div>
                    <div class="col-lg-4 " data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        <img src="images/mitra/number-3.png" alt="" class="float-left" />
                        <h4>Dapatkan Pesanan</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, nostrum!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content k-mitra">
        <div class="container ">
            <h1 class="text-center mb-4">Mengapa Bermitra Dengan Kami ?</h1>
            <div class="col-lg-10 col-md-12 mx-auto">  
                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right" data-aos-duration="1000">
                        <div class="card text-center border border-2  ">
                            <div class="card-body">
                                <img src="images/mitra/salary.png" alt="" class="rounded-circle" />
                                <p class="card-text">Meningkatkan Penjualan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="card text-center border border-2  ">
                            <div class="card-body">
                                <img src="images/mitra/networking.png" alt="" class="rounded-circle" />
                                <p class="card-text">Memperluas Jangkauan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                        <div class="card text-center border border-2 ">
                            <div class="card-body">
                                <img src="images/mitra/cooperation.png" alt="" class="rounded-circle" />
                                <p class="card-text">Menjalin kemitraan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content fAQs border-top ">
        <div class="container mt-5 mb-5">
            <h2 class="text-center fw-bold mb-3">FAQs</h2>
            <div class="row">
                <div class="col-md-12 col-lg-6 mt-5">
                    <h3><i class="fa-solid fa-comment-dots me-2"></i>Apa itu TegalTour?</h3>
                    <p class="mt-4">
                    Tegaltour adalah sebuah platform marketplace yang memfasilitasi penjualan berbagai paket wisata yang diunggah oleh mitra-mitra kami.
                    </p>
                </div>
                <div class="col-md-12 col-lg-6 mt-5">
                    <h3><i class="fa-solid fa-comment-dots me-2"></i>Apa keuntungan menjadi mitra TegalTour?</h3>
                    <p class="mt-4">
                        Keuntungan menjadi mitra TegalTour.com mencakup eksposur lebih luas, akses ke pangsa pasar yang luas, manajemen yang mudah, dukungan teknis, peluang kolaborasi, dan peningkatan pendapatan, sehingga Anda dapat mengembangkan bisnis wisata Anda dengan lebih baik.
                    </p>
                </div>
                <div class="col-md-12 col-lg-6 mt-5">
                    <h3><i class="fa-solid fa-comment-dots me-2"></i>  Bagaimana cara bergabung sebagai mitra TegalTour?</h3>
                    <p class="mt-4">                     
                        Anda dapat bergabung sebagai mitra TegalTour dengan mengakses situs web kami, mengisi formulir pendaftaran, mengunggah dokumen pendukung, menunggu verifikasi, dan jika disetujui, Anda akan mendapatkan akses ke akun mitra di platform TegalTour untuk mengelola dan menjual produk wisata Anda.
                    </p>
                </div>
                <div class="col-md-12 col-lg-6 mt-5">
                    <h3><i class="fa-solid fa-comment-dots me-2"></i>  Bagaimana cara memposting layanan saya di platform TegalTour?</h3>
                    <p class="mt-4">
                    Untuk memposting layanan atau produk wisata Anda di platform TegalTour, masuk ke akun mitra Anda, tambahkan detail produk, termasuk deskripsi, harga, foto, dan metode pembayaran, lalu publikasikan produk Anda untuk menawarkannya kepada calon pelanggan.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    .custom-file {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }
    .custom-file-input {
        position: absolute;
        font-size: 100px;
        right: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
    }
    .custom-file-label {
        cursor: pointer;
    }
</style>

<style>
    .password-toggle-icon {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
    z-index: 2;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".password-toggle-icon").on('click', function() {
            var passwordField = $($(this).attr("toggle"));
            if (passwordField.attr("type") == "password") {
                passwordField.attr("type", "text");
                $(this).removeClass("fa-eye");
                $(this).addClass("fa-eye-slash");
            } else {
                passwordField.attr("type", "password");
                $(this).removeClass("fa-eye-slash");
                $(this).addClass("fa-eye");
            }
        });
    });
</script>
<script>
    // Fungsi untuk validasi password
    $("#password").on("input", function() {
        var password = $(this).val();
        var passwordIsValid = isPasswordValid(password);

        if (passwordIsValid) {
            $("#passwordMessage").html("<span class='text-success'>Password valid</span>");
        } else {
            $("#passwordMessage").html("<span class='text-danger'>Password tidak valid </span>");
        }
    });

    // Fungsi untuk validasi password
    function isPasswordValid(password) {
        if (password.length < 6) {
            return false;
        }

        var lowercaseRegex = /[a-z]/;
        var uppercaseRegex = /[A-Z]/;
        var digitRegex = /[0-9]/;
        var specialCharacterRegex = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/;

        return (
            lowercaseRegex.test(password) &&
            uppercaseRegex.test(password) &&
            digitRegex.test(password) &&
            specialCharacterRegex.test(password)
        );
    }
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


@endsection