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
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="{{ route('Mitra.index') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }} 
                        <div class="divider d-flex align-items-center my-4">
                            <h4 class="text-center fw-bold">Form Pengajuan Gabung Mitra</h4>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" class="form-control form-control-lg"
                            placeholder="Nama Bisnis" required="required" name="nama_lengkap" />
                            <label class="form-label" for="nama_lengkap">Nama Bisnis</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" class="form-control form-control-lg"
                            placeholder="No Telepon" required="required" name="telepon" />
                            <label class="form-label" for="telepon">No Telepon</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="email" class="form-control form-control-lg"
                            placeholder="Enter" required="required" name="email"/>
                            <label class="form-label" for="email">Email</label>
                        </div>
                        <div class="form-outline mb-3">
                            <input type="password" class="form-control form-control-lg"
                            placeholder="Enter password" required="required" name="password"/>
                            <label class="form-label" for="password">Password</label>
                        </div>
                        <div class="text-center text-lg-start mt-4 pt-2">
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
                    <h3><i class="fa-solid fa-comment-dots me-2"></i>Apa itu TegalTour.com?</h3>
                    <p class="mt-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, ullam. Amet esse nisi voluptatum maiores? Praesentium quae sunt saepe, cupiditate quas incidunt suscipit cum, maiores quidem atque aut error voluptatibus?
                    </p>
                </div>
                <div class="col-md-12 col-lg-6 mt-5">
                    <h3><i class="fa-solid fa-comment-dots me-2"></i>Apa keuntungan menjadi mitra TegalTour.com ?</h3>
                    <p class="mt-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, ullam. Amet esse nisi voluptatum maiores? Praesentium quae sunt saepe, cupiditate quas incidunt suscipit cum, maiores quidem atque aut error voluptatibus?
                    </p>
                </div>
                <div class="col-md-12 col-lg-6 mt-5">
                    <h3><i class="fa-solid fa-comment-dots me-2"></i>  Bagaimana cara bergabung sebagai mitra TegalTour.com?</h3>
                    <p class="mt-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, ullam. Amet esse nisi voluptatum maiores? Praesentium quae sunt saepe, cupiditate quas incidunt suscipit cum, maiores quidem atque aut error voluptatibus?
                    </p>
                </div>
                <div class="col-md-12 col-lg-6 mt-5">
                    <h3><i class="fa-solid fa-comment-dots me-2"></i>  Bagaimana cara memposting layanan saya di platform TegalTour.com?</h3>
                    <p class="mt-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, ullam. Amet esse nisi voluptatum maiores? Praesentium quae sunt saepe, cupiditate quas incidunt suscipit cum, maiores quidem atque aut error voluptatibus?
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection