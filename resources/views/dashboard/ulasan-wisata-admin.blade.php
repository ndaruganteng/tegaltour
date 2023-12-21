@extends('dashboard.layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Ulasan Wisata Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="{{ route('data-wisata-admin.index') }}"> <i
                                    class="fa-solid fa-arrow-left mr-2"></i>Kembali</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-dark card-outline">
                        <div class="card-header" style="background-color: white;">
                            <div class="d-flex justify-content-between align-items-center">

                                <div>
                                    <h3 class="card-title mb-0 mr-3" style="font-size: 18px;">Total Ulasan Wisata</h3>
                                    <div class="rating-container text-center d-flex  align-items-center">
                                        @for ($i = 1; $i <= 5; $i++) @if ($i <=round($averageRating)) <i
                                            class="fa fa-star checked"></i>
                                            @else
                                            <i class="fa fa-star"></i>
                                            @endif
                                            @endfor
                                            <span class="ml-2">( {{ number_format($averageRating, 1, '.', '') }}/5
                                                )</span>
                                    </div>
                                </div>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="post">
                                                @if(count($ulasan) > 0)
                                                @foreach($ulasan as $item)
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm"
                                                        src="{{asset('storage/image/user/'.$item->profile_picture)}}"
                                                        alt="user image">

                                                    <span class="username">
                                                        <h5>{{ $item->nama }}</h5>
                                                    </span>
                                                    <span class="description">
                                                        {{ \Carbon\Carbon::parse($item->date)->locale('id')->isoFormat('dddd, D MMMM Y [,] H:mm:ss') }}
                                                    </span>
                                                </div>
                                                <p>
                                                    @for ($i = 1; $i <= $item->rating; $i++)
                                                        <span class="fa fa-star checked"></span>
                                                        @endfor
                                                        @for ($i = $item->rating + 1; $i <= 5; $i++) <span
                                                            class="fa fa-star"></span>
                                                            @endfor
                                                </p>
                                                <p>
                                                    <strong>Ulasan Untuk Biro Wisata :</strong> <br>
                                                    {{ $item->komentar }}
                                                </p>
                                                <p>
                                                    <strong>Ulasan Untuk Tempat Wisata :</strong>
                                                    <br>{{ $item->komentar_wisata }}
                                                </p>
                                                <hr>
                                                @endforeach
                                                @else
                                                <p>Belum ada ulasan.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
.checked {
    color: orange;
}
</style>

@endsection