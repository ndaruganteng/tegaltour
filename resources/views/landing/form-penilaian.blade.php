@extends('landing.layouts.app')
@section('content')

<div class="content-wrapper">

    <!-- <div class="content form-penilaian">
        <div class="container">
            <h3 class="text-center fw-bold">Form Penilaian</h3>
            <div class="row">
                <div class="col-md-12 col-lg-6 mt-5 text-center">
                    <div class="card shadow-0 mb-3">
                        <div class="card-body text-primary ">
                            <form>
                                <div class="form-outline mb-4">
                                  <input type="text" id="form4Example1" class="form-control" />
                                  <label class="form-label" for="form4Example1">Name</label>
                                </div>
                                <div class="form-outline mb-4">
                                  <input type="email" id="form4Example2" class="form-control" />
                                  <label class="form-label" for="form4Example2">Email address</label>
                                </div>
                                <div class="form-outline mb-4">
                                  <textarea class="form-control" id="form4Example3" rows="4"></textarea>
                                  <label class="form-label" for="form4Example3">Message</label>
                                </div>
                                <button type="submit" class="btn btn-dark btn-block mb-4 shadow-0">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 mt-5 text-center">
                    <img src="images/home/tour.png" class="img" alt="Wild Landscape" style="width: 400px;"/>
                </div>
            </div>
        </div>
    </div> -->
    <section class="vh-100 ">
        <div class="container-fluid h-custom form-penilaian">
            <h2 class="text-center">Form Penilaian</h2>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="images/home/tour.png"
                    class="img-fluid" alt="Sample image" style="width:100% ;">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form>
                        <div class="form-outline mb-4">
                            <input type="text" id="form4Example1" class="form-control" />
                            <label class="form-label" for="form4Example1">Name</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="email" id="form4Example2" class="form-control" />
                            <label class="form-label" for="form4Example2">Email address</label>
                        </div>
                        <div class="form-outline mb-4">
                            <textarea class="form-control" id="form4Example3" rows="4"></textarea>
                            <label class="form-label" for="form4Example3">Message</label>
                        </div>
                        <button type="submit" class="btn btn-dark shadow-0 btn-block mb-4">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>


@endsection