<aside class="main-sidebar sidebar-dark-primary  elevation-4">
  <a href="{{route('dashboard.index')}}" class="brand-link">
    <img src="/images/icon/tour-logo.png" alt="AdminLTE Logo" class="brand-image img-circle " >
    <span class="brand-text font-weight-light">TegalTour</span>
  </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/images/icon/profile.png" class="img-circle" alt="User Image">
      </div>
      @if(auth()->user()->role == "admin")
      <div class="info">
        <a href="#" class="d-block">{{ Auth::User()->nama_lengkap }}</a>
      </div>
      @endif
      @if(auth()->user()->role == "mitra")
      <div class="info">
        <a href="#" class="d-block">{{ Auth::User()->nama_lengkap }}</a>
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
        <li class="nav-item">
          <a href="{{route('data-user.index')}}" class="nav-link">
            <i class="fa-solid fa-user nav-icon"></i>
            <p>Data User</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('request-mitra.index')}}" class="nav-link">
            <i class="nav-icon fa-regular fa-handshake"></i>
            <p>Request Mitra</p>
          </a>
        </li>
        @endif
        @if(auth()->user()->role == "mitra")
        <li class="nav-item">
          <a href="{{route('data-wisata.index')}}" class="nav-link">
            <i class="nav-icon fa-solid fa-store"></i>
            <p>Data Wisata</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('data-rekening.index')}}" class="nav-link">
            <i class="nav-icon fa-solid fa-wallet"></i>
            <p>Rekening</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('data-order.index')}}" class="nav-link">
            <i class="nav-icon fa-solid fa-coins"></i>
            <p>Data Order</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('status-perjalanan.index')}}" class="nav-link">
            <i class="nav-icon fa-solid fa-car-side"></i>
            <p>Status Perjalanan</p>
          </a>
        </li>
        @endif
      </ul>
    </nav>
  </div>
</aside>