<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TegalTour</title>
    <!-- logo -->
    <link rel="icon" href="images/icon/logo.png" type="image/x-icon">
    <!-- link css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- link font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- icon fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- mbd -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <!-- aos -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>   
  <body >

  @include('sweetalert::alert')

     <div class="container d-flex justify-content-center align-items-center min-vh-100 login">
        <div class="row border rounded-5 p-3 bg-white box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="images/login/tour-logo.png" class="img-fluid" style="width: 250px;">
                </div>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Gabung dan dapatkan pengalaman berwisata yang menarik.</small>
                <a href="{{route('home.index')}}" type="button" class="btn btn-light btn-rounded shadow-0 my-3"><i class="fa-solid fa-house me-2"></i></i>Home</a>
            </div>       
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h1>Register</h1>
                    </div>
                    <form action="/register" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="form-control form-control-lg bg-light fs-6" placeholder="Nama Lengkap">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="no_telepon" value="{{ old('no_telepon') }}" class="form-control form-control-lg bg-light fs-6" placeholder="Nomor Telepon">
                            @error('no_telepon')
                                <script>
                                    swal("Gagal", "{{ $message }}", "error");
                                </script>
                            @enderror  
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg bg-light fs-6" placeholder="Email">
                            @error('email')
                                <script>
                                    swal("Gagal", "{{ $message }}", "error");
                                </script>
                            @enderror        
                        </div>
                        <!-- <div class="input-group mb-4">
                            <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                            @error('password')
                            <script>
                                swal("Gagal", "{{ $message }}", "error");
                            </script>
                            @enderror  
                        </div> -->
                        <div class="input-group mb-1">
                            <input type="password" name="password" id="password" class="form-control form-control-lg bg-light fs-6" value="{{ old('password') }}" placeholder="Password">
                            <div class="input-group-append">
                                <span class="input-group-text" id="show-password" style="cursor: pointer;">
                                    <i class="fa fa-eye" id="eyeIcon"></i>
                                </span>
                            </div>
                            @error('password')
                                <script>
                                    swal("Gagal", "{{ $message }}", "error");
                                </script>
                            @enderror
                        </div>
                        <div id="passwordMessage" class="mb-4"></div>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6" style="background: #103cbe;">Register</button>
                        </div>
                    </form>
                    <div class="row">
                        <small>Sudah memiliki akun? <a href="{{route('login.index')}}">Login</a></small>
                    </div>
                </div>
            </div> 
        </div>
    </div>

    <style>
        .password-card {
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 10px;
            width: 300px;
        }

        /* Menambahkan gaya saat persyaratan tidak terpenuhi */
        .invalid {
            color: red;
        }

        /* Menambahkan gaya saat persyaratan terpenuhi */
        .valid {
            color: green;
        }
    </style>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS --> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    <!-- MDB -->
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
    ></script>
    <!-- aos -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        once: true,
      });
    </script>
    <!-- icon password js -->
    <script>
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        const showPasswordButton = document.getElementById('show-password');

        showPasswordButton.addEventListener('click', function () {
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

        // Fungsi untuk validasi password
        function isPasswordValid(password) {
            // Validasi panjang minimal (minimal 6 karakter)
            if (password.length < 6) {
                return false;
            }

            // Validasi huruf kecil, huruf besar, angka, dan karakter khusus
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