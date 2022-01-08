<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
   <!--Made with love by Mutiullah Samim -->
   
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="styles.css">

    <style>
        /* Made with love by Mutiullah Samim*/
        /*@import url('https://fonts.googleapis.com/css?family=Numans');*/

        html,body{
        background-image: url('{{ asset('assets/img/login_bg_img.jpg') }}');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
        font-family: 'Numans', sans-serif;
        }

        .container{
        height: 100%;
        align-content: center;
        }

        .card{
        height: 370px;
        margin-top: auto;
        margin-bottom: auto;
        width: 400px;
        background-color: rgba(0,0,0,0.5) !important;
        }

        .social_icon span{
        font-size: 60px;
        margin-left: 10px;
        color: #FFC312;
        }

        .social_icon span:hover{
        color: white;
        cursor: pointer;
        }

        .card-header h3{
        color: white;
        }

        .social_icon{
        position: absolute;
        right: 20px;
        top: -45px;
        }

        .input-group-prepend span{
        width: 50px;
        background-color: #FFC312;
        color: black;
        border:0 !important;
        }

        input:focus{
        outline: 0 0 0 0  !important;
        box-shadow: 0 0 0 0 !important;

        }

        .remember{
        color: white;
        }

        .remember input
        {
        width: 20px;
        height: 20px;
        margin-left: 15px;
        margin-right: 5px;
        }

        .login_btn{
        color: black;
        background-color: #FFC312;
        width: 100px;
        }

        .login_btn:hover{
        color: black;
        background-color: white;
        }

        .links{
        color: white;
        }

        .links a{
        margin-left: 4px;
        }

        .show_pass {
            background: #fff;
            padding: 11px;
            cursor: pointer;
        }
    </style>

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
            width: 1364px;
        }

        .onoffswitch3-inner .onoffswitch3-inactive {
            width: 100px;
            padding-left: 16px;
            background-color: #FFFFFF; color: #FFFFFF;
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
</head>
<body>
@php
    $notice = DB::table('notice')->where('status',1)->first();
@endphp
@if($notice)
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
@endif
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Sign In</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span>
                        <img style="width: 200px; padding: 50px 10px 10px 10px;" src="{{ asset('assets/img/logo.png') }}">
                    </span>
                    {{-- <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span> --}}
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group form-group" 
                            style="border: 1px solid #ced4da; border-radius: 4px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" 
                                class="form-control @error('password') is-invalid @enderror passward" 
                                name="password" 
                                required 
                                autocomplete="current-password"
                                placeholder="Password"
                                style=" border: 0;">
                        <i class="far fa-eye show_pass"></i>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row align-items-center remember">
                        <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Don't have an account?<a href="#">Sign Up</a>
                </div>
                <div class="d-flex justify-content-center">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.show_pass', function() {
        if($('.passward').attr('type') == 'password'){
            $('.passward').attr('type','text');
        }
        else {
            $('.passward').attr('type','password');
        }
    }) 
</script>
</body>
</html>
