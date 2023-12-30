<aside class="main-sidebar sidebar-dark-primary  elevation-4">
    <a href="{{route('dashboard.index')}}" class="brand-link">
        <img src="/images/icon/tour-logo.png" alt="AdminLTE Logo" class="brand-image img-circle ">
        <span class="brand-text font-weight-light">TegalTour</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if(auth()->user()->role == "admin")
            <div class="image">
                @if(Auth::user()->profile_picture && Storage::disk('public')->exists('image/user/' .
                Auth::user()->profile_picture))
                <img src="{{ asset('storage/image/user/' . Auth::user()->profile_picture) }}"
                    class="rounded-circle border border-2 border-dark" alt="Gambar Pengguna">
                @else
                <img src="\images\icon\profile.png" class="rounded-circle border border-2 border-dark"
                    alt="Gambar Default">
                @endif
            </div>
            <div class="info">
                <a href="{{route('profile')}}" class="d-block">{{ Auth::User()->nama_lengkap }}</a>
            </div>
            @endif
            @if(auth()->user()->role == "mitra")
            <div class="image">
                @if(Auth::user()->profile_picture && Storage::disk('public')->exists('image/user/' .
                Auth::user()->profile_picture))
                <img src="{{ asset('storage/image/user/' . Auth::user()->profile_picture) }}"
                    class="rounded-circle border border-2 border-dark" alt="Gambar Pengguna">
                @else
                <img src="\images\icon\profile.png" class="rounded-circle border border-2 border-dark"
                    alt="Gambar Default">
                @endif
            </div>
            <div class="info">
                <a href="{{route('profile')}}" class="d-block">{{ Auth::User()->nama_lengkap }}</a>
            </div>
            @endif
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if(auth()->user()->role == "admin" or auth()->user()->role == "mitra" )
                <li class="nav-item">
                    <a href="{{route('dashboard.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @endif
                @if(auth()->user()->role == "admin")
                <li class="nav-header">Input Data</li>
                <li class="nav-item">
                    <a href="{{route('data-kategori.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-list"></i>
                        <p>Data Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('data-rekening.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-wallet"></i>
                        <p>Rekening Admin</p>
                    </a>
                </li>
                <li class="nav-header">View Data</li>
                <li class="nav-item">
                    <a href="{{route('data-user.index')}}" class="nav-link">
                        <i class="fa-solid fa-users nav-icon"></i>
                        <p>Data User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('data-wisata-admin.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-store"></i>
                        <p>Paket wisata</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('data-order-admin.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-cart-shopping"></i>
                        <p>Data Order</p>
                        @if($newOrders > 0)
                        <span class="right badge badge-danger">{{ $newOrders }}</span>
                        @endif
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{route('request-mitra.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-handshake"></i>
                        <p>
                            <span class="right badge badge-danger">New</span>
                        </p>
                        <p>Request Mitra</p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="{{ route('request-mitra.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-handshake"></i>
                        <p>Request Mitra</p>
                        @if($newMitraRequests > 0)
                        <span class="right badge badge-danger">{{ $newMitraRequests }}</span>
                        @endif

                    </a>
                </li>
                <li class="nav-header">Keuangan</li>
                <li class="nav-item">
                    <a href="{{route('pendapatan-admin.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-money-bill-wave"></i>
                        <p>Pendapatan Admin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('pendapatan-biro-wisata.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-money-bill-wave"></i>
                        <p>Pendapatan Biro Wisata</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{route('data-rekening-admin.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-wallet"></i>
                        <p>Data Rekening</p>
                    </a>
                </li> -->
                @endif
                @if(auth()->user()->role == "mitra")
                <li class="nav-item">
                    <a href="{{route('data-wisata.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-store"></i>
                        <p>Paket Wisata</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
            <a href="{{route('data-rekening.index')}}" class="nav-link">
                <i class="nav-icon fa-solid fa-wallet"></i>
                <p>Rekening</p>
            </a>
            </li> -->
                <li class="nav-item">
                    <a href="{{route('data-order.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-cart-shopping"></i>
                        <p>Data Order</p>
                        @if($newOrdersBiro > 0)
                        <span class="right badge badge-danger">{{ $newOrdersBiro }}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('status-perjalanan.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-car-side"></i>
                        <p>Status Perjalanan</p>
                        @if($newOrdersBiro > 0)
                        <span class="right badge badge-danger">{{ $newOrdersBiro }}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('pendapatan.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-money-bill-wave"></i>
                        <p>Pendapatan</p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>