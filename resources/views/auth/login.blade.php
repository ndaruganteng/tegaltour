<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TegalTour</title>

    <!-- logo -->
    <link rel="icon" href="images/icon/tour-logo.png" type="image/x-icon">
    <!-- link css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- link font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- icon fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- mbd -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <!-- aos -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


</head>

<body>
    @include('sweetalert::alert')

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container p-2">
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a class="navbar-brand me-auto mt-2 mt-lg-0" href="{{route('home.index')}}">
                    <img src="/images/icon/tour-logo.png" height="30" alt="MDB Logo" loading="lazy" />
                    <small>TegalTour</small>
                </a>
                <ul class="navbar-nav justify-content-center me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home.index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('wisata.index')}}">Paket Wisata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('biro-wisata.index')}}">Daftar Biro Wisata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('join-mitra.index')}}">Join Mitra</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                @if (Auth::check() && Auth::user()->role == 'user')
                @if (Auth::check())
                <span class="me-2">{{ Auth::user()->nama_lengkap }}</span>
                @else
                @endif
                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                        id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        @if(Auth::user()->profile_picture && Storage::disk('public')->exists('image/user/' .
                        Auth::user()->profile_picture))
                        <img src="{{asset('storage/image/user/'.Auth::user()->profile_picture)}}" class="rounded-circle"
                            height="30" alt="Black and White Portrait of a Man" loading="lazy" />
                        @else
                        <img src="\images\icon\dua.png" class="rounded-circle" height="30"
                            alt="Black and White Portrait of a Man" loading="lazy" />
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" href="{{route('profile_user')}}">Profile Saya</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('pesanan-saya.index')}}">Pesanan Saya</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('history.index')}}">History Pesanan</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/logout">Logout</a>
                        </li>
                    </ul>
                </div>
                <a class="text-reset ms-2" href="{{route('transaksi.index')}}">
                    <i class="fas fa-shopping-cart"></i>
                </a>
                @else
                <a href="{{route('login.index')}}" type="button" class="btn btn-outline-dark btn-rounded btn-sm"
                    data-mdb-ripple-color="dark">Login </a>
                @endif
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- content -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100 login">
        <div class="row border rounded-5 p-3 bg-white box-area">
            <div
                class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box bg-dark">
                <div class="featured-image mb-3">
                    <img src="images/login/tour-logo.png" class="img-fluid" style="width: 250px;">
                </div>
                <small class="text-white text-wrap text-center"
                    style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Gabung dan dapatkan pengalaman
                    berwisata yang menarik.</small>

            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="error">
                        @if (Session::has('error'))
                        <script>
                        swal("Gagal", " {{ Session::get('error') }}", "error");
                        </script>
                        @endif
                    </div>
                    <form action="{{route('login.store')}}" method="post">
                        @csrf
                        <div class="header-text mb-4">
                            <h1>Login</h1>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control form-control-lg bg-light fs-6" name="email"
                                placeholder="Masukan Email">
                        </div>
                        <div class="input-group mb-1">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" name="password"
                                id="password" placeholder="Masukan Password">
                            <div class="input-group-append">
                                <button type="button" id="togglePassword" class="btn border shadow-0">
                                    <i id="eyeIcon" class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="forgot">
                                <small><a href="{{route('forget.password.get')}}">Lupa Password?</a></small>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-lg btn-dark w-100 fs-6">Login</button>
                        </div>
                        <div class="row">
                            <small>Belum punya akun? <a href="{{route('register.index')}}">Register</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- endcontent -->

    <!-- footer -->
    <footer class="text-center text-lg-start bg-light text-muted" style="margin-top: -50px;">

        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <div class="me-5 d-none d-lg-block">
                <span>Sosial Media:</span>
            </div>
            <div>
                <a href="https://wa.me/085647019630" target="_blank" class="me-4 text-reset">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://www.tiktok.com/@selaikelapa" target="_blank" class="me-4 text-reset">
                    <i class="fa-brands fa-tiktok"></i>
                </a>
                <a href="https://www.instagram.com/m.ndarru" target="_blank" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/profile.php?id=100009111716998" target="_blank"
                    class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </div>
        </section>

        <section>
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <img src="images/icon/tour-logo.png" class="me-2" alt="" style="width:25px;">
                            TegalTour
                        </h6>
                        <p>
                            Tegaltour adalah sebuah platform marketplace yang memfasilitasi penjualan berbagai paket
                            wisata
                            yang diunggah oleh mitra-mitra kami.
                        </p>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            Produk
                        </h6>
                        <p>
                            <a href="{{route('wisata.index')}}" class="text-reset">Paket Wisata</a>
                        </p>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            Menu
                        </h6>
                        <p>
                            <a href="{{route('home.index')}}" class="text-reset">Home</a>
                        </p>
                        <p>
                            <a href="{{route('wisata.index')}}" class="text-reset">Paket Wisata</a>
                        </p>
                        <p>
                            <a href="{{route('biro-wisata.index')}}" class="text-reset">Daftar Biro Wisata</a>
                        </p>
                        <p>
                            <a href="{{route('join-mitra.index')}}" class="text-reset">Join Mitra</a>
                        </p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p>
                            <i class="fas fa-home me-3"></i>
                            Tegal, Jawa Tengah, Indonesia
                        </p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            tegaltour@gmail.com
                        </p>
                        <p>
                            <i class="fas fa-phone me-3"></i>
                            085647019630
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2023 Copyright:
            <a class="text-reset fw-bold" href="#">tegaltour.my.id </a>
        </div>

    </footer>
    <!-- end footer -->


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>

    <!-- aos -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init({
        once: true,
    });
    </script>

    <script>
    // Fungsi untuk lihat password
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    const togglePasswordButton = document.getElementById('togglePassword');

    togglePasswordButton.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
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
            $("#passwordMessage").html("<span class='text-danger'>Password tidak valid</span>");
        }
    });

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


</body>

</html>