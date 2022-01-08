
@extends('index')
@section('main_section')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Payment Information</li>
            </ol>

            <div class="row">
                
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <center>
                            <h3>bkash</h3>
                            <img width="100%" src="{{ asset('assets/img/pay_info.png') }}">
                    </center>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <center>
                            <h3>Rocket</h3>
                            <img width="100%" src="{{ asset('assets/img/rocket_pay_img.jpg') }}">
                    </center>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <center>
                            <img width="100%" src="{{ asset('assets/img/info_01.jpg') }}">
                    </center>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <center>
                            <img width="100%" src="{{ asset('assets/img/info_02.jpg') }}">
                    </center>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </main>
@stop
        
