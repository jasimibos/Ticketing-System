
@extends('index')
@section('main_section')
<style type="text/css">
        /*@import url('https://fonts.googleapis.com/css?family=Montserrat');*/

        .onoffswitch3
        {
            position: absolute; 
            -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
        }

        .onoffswitch3-checkbox {
            display: none;
        }

        .onoffswitch3-label {
            display: block; overflow: hidden; cursor: pointer;
            border: 0px solid #999999; border-radius: 0px;
        }

        .onoffswitch3-inner {
            display: block; width: 200%; margin-left: -100%;
            -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
            -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
        }

        .onoffswitch3-inner > span {
            display: block; float: left; position: relative; width: 50%; height: 30px; padding: 0; line-height: 30px;
            font-size: 14px; color: white; font-family: 'Montserrat', sans-serif; font-weight: bold;
            -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
        }

        .onoffswitch3-inner .onoffswitch3-active {
            padding-left: 10px;
            background-color: #FFFFFF; 
            color: #FFFFFF;
            width: 1099px;
        }

        .onoffswitch3-inner .onoffswitch3-inactive {
            width: 100px;
            padding-left: 16px;
            background-color: #FFFFFF; 
            color: #FFFFFF;
            text-align: right;
        }

        .onoffswitch3-switch {
            display: block; width: 50%; margin: 0px; text-align: center; 
            border: 0px solid #999999;border-radius: 0px; 
            position: absolute; top: 0; bottom: 0;
        }
        .onoffswitch3-active .onoffswitch3-switch {
            background: #27A1CA; left: 0;
            width: 160px;
        }
        .onoffswitch3-inactive{
            background: #A1A1A1; right: 0;
            width: 20px;
        }
        .onoffswitch3-checkbox:checked + .onoffswitch3-label .onoffswitch3-inner {
            margin-left: 0;
        }

        .glyphicon-remove{
            padding: 3px 0px 0px 0px;
            color: #fff;
            background-color: #000;
            height: 25px;
            width: 25px;
            border-radius: 15px;
            border: 2px solid #fff;
        }

        .scroll-text{
            color: #ef0a0a;
        }
    </style>
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                @if(auth()->user()->role == 2)
                <li class="breadcrumb-item active" style="height: 30px;">
                    @php
                    $notice = DB::table('notice')->where('status',1)->first();
                    @endphp
                    @if($notice && auth()->user()->role == 2)
                    <div class="onoffswitch3">
                        <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="myonoffswitch3" checked>
                        <label class="onoffswitch3-label" for="myonoffswitch3">
                            <span class="onoffswitch3-inner">
                                <span class="onoffswitch3-active">
                                    <marquee class="scroll-text">{{ $notice->title .' : '. $notice->description }}</marquee>
                                    <span class="onoffswitch3-switch">IMPORTANT NOTICE 
                                        {{-- <span class="glyphicon glyphicon-remove"></span> --}}
                                    </span>
                                </span>
                                <span class="onoffswitch3-inactive"><span class="onoffswitch3-switch">SHOW BREAKING NEWS</span></span>
                            </span>
                        </label>
                    </div>
                    @else
                    Dashboard
                    @endif
                </li>
                @else
                <li class="breadcrumb-item active"> Dashboard </li>
                @endif
            </ol>
            @if(auth()->user()->role == 1)
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body"><h4>{{ count($user) }}</h4></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Total Clients</a>
                            <!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body"><h4>{{ count($due) }}</h4></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Total Due</a>
                            <!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body"><h4>{{ count($paid) }}</h4></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Total Paid</a>
                            <!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body"><h4>{{ count($de_active_acc) }}</h4></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">De-active Accouts</a>
                            <!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(auth()->user()->role == 2)
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body"><h1>{{ $app_count }}</h1></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Application Count</a>
                            <!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-md-6"></div>
                <div class="col-xl-12 col-md-12">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body"><h5>বিকাশে টাকার পাঠানোর ক্ষেত্রে আপনার রেজিস্ট্রেশন নম্বর টি রেফারেন্স হিসেবে ব্যবহার করুন।</h5></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Note</a>
                            <!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </main>
@stop
        
