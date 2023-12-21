@extends('landing.layouts.app')
@section('content')

<div class="content-wrapper">

    <div class="content profil_saya">
        <div class="container">
            <h2 class="judul">Profile Saya</h2>
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="card card_profile text-center shadow-0 border border-2">
                        <div class="card-body">
                            <div class="image_profile">

                                @if(Auth::user()->profile_picture && Storage::disk('public')->exists('image/user/' .
                                Auth::user()->profile_picture))
                                <img src="{{asset('storage/image/user/'.Auth::user()->profile_picture)}}"
                                    class="rounded-circle border border-2 border-dark" alt="">
                                @else
                                <img src="\images\icon\dua.png" class="rounded-circle border border-2 border-dark"
                                    alt="">
                                @endif
                            </div>
                            <h5 class="card-title">{{ Auth::user()->nama_lengkap }}</h5>
                            <button type="button" class="btn btn-dark mt-1 btn-sm shadow-0" data-mdb-toggle="modal"
                                data-mdb-target="#profileuserModal"><i class="fas fa-edit mr-2"></i>Edit
                                Profile</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card card_profile shadow-0 border border-2">
                        <div class="card-body">
                            <p class="card-title"><strong>Nama Lengkap: </strong>{{ Auth::user()->nama_lengkap }}</p>
                            <p class="card-title"><strong>No Telepon : </strong>{{ Auth::user()->no_telepon }}</p>
                            <p class="card-title"><strong>Email : </strong>{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
<div class="modal fade" id="profileuserModal" tabindex="-1" aria-labelledby="profileuserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileuserModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profileUser.update', ['id' => Auth::id()]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="" class="col-form-label">Foto Profile</label>
                                <input type="file" value="{{ Auth::user()->profile_picture }}" name="profile_picture"
                                    class="form-control" accept="image/*" onchange="previewImage(event)">
                                <p style="font-style: italic; font-size: 12px;">size foto maksimal 2 mb dan extensi jpg,
                                    png, jpeg</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <img id="image-preview" src="" class="img-thumbnail rounded-circle"
                                    style="display:none; max-width: 100%; max-height: 200px;" alt="Preview Image">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" required="required" name="nama_lengkap"
                            value="{{ Auth::user()->nama_lengkap }}">
                    </div>
                    <div class="form-group">
                        <label for="no_telepon">Nomor Telepon</label>
                        <input type="text" class="form-control" required="required" name="no_telepon"
                            value="{{ Auth::user()->no_telepon }}"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                    <div class="form-group" hidden>
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{ Auth::user()->alamat }}">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-dark shadow-0" value="Simpan Data">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(event) {
    var input = event.target;
    var preview = document.getElementById('image-preview');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
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