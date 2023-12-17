@extends('landing.layouts.app')
@section('content')

<div class="content-wrapper">
        <!-- Jumbotron -->
        <div class="p-5 text-center bg-image tour" style="background-image: url('https://jatengtravelguide.info/images/1682578827.png'); 
         height: 300px">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3 ">Daftar Biro Wisata </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- end Jumbotron -->

   
    <div class="content-biro">
        <div class="container">
            <div class="row">
                @foreach($users as $p)
                    @if($p->role == 'mitra')
                        <div class="col-md-12 col-lg-3">
                            <div class="card card-biro shadow-0 border border-dark">
                                <div class="text-center mt-3">
                                    <span class="badge badge-primary">Biro Wisata</span>
                                </div>
                                <div class="bg-image hover-overlay text-center p-3">
                                    <img src="{{ asset('storage/image/user/' . $p->profile_picture) }}" class=" img-biro rounded-circle border"/>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center" style="margin-top: -20px; font-size: 16px;">{{$p->nama_lengkap}}</h5>
                                    <div class="text-center mt-3">
                                        <a href="/detail-biro-wisata/{{ ($p->id) }}#{{$p->nama_lengkap}}" class="btn btn-dark shadow-0 rounded-lg" style="text-transform: lowercase;">Detail biro wisata</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    
    
</div>

@endsection