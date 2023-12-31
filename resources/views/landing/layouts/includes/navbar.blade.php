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
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar"
                    role="button" data-mdb-toggle="dropdown" aria-expanded="false">
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