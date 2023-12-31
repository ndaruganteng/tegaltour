<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- mbd -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <!-- aos -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
  </head>
  <body >

     <div class="container d-flex justify-content-center align-items-center min-vh-100 login">
        <div class="row border rounded-5 p-3 bg-white box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="/images/login/tour-logo.png" class="img-fluid" style="width: 250px;">
                </div>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Gabung dan dapatkan pengalaman berwisata yang menarik.</small>
                <a href="{{route('home.index')}}" type="button" class="btn btn-light btn-rounded shadow-0 my-3"><i class="fa-solid fa-house me-2"></i></i>Home</a>
            </div>       
            <div class="col-md-6 right-box">
                <div class="row align-items-center"> 
                    <div class="header-text mb-4">
                        <h1>Reset Password</h1>
                        <h4>Masukan Kata Sandi Baru</h4>
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <form action="{{ route('reset.password.post') }}" method="post">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="input-group mb-3">
                            <input type="email" id="email_address" name="email" required autofocus class="form-control form-control-lg bg-light fs-6" placeholder="Masukan Email">
                        </div>
                        @if ($errors->has('email'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        <div class="input-group mb-3">
                            <input type="password" id="password" name="password" required autofocus class="form-control form-control-lg bg-light fs-6" placeholder="Masukan Password Baru">
                        </div>
                        @if ($errors->has('password'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                        <div class="input-group mb-2">
                            <input type="password" id="password-confirm" name="password_confirmation" required autofocus class="form-control form-control-lg bg-light fs-6" placeholder="Masukan Konfimasii Password Baru">
                        </div>
                        @if ($errors->has('password_confirmation'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        @endif
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6" style="background: #103cbe;">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>

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
    
   
  </body>
</html>