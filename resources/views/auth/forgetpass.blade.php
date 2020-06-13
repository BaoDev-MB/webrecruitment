<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Phòng SDH - ĐH Nông Lâm Tp. HCM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content=""/>
    <meta name="author" content="http://webthemez.com"/>
    <!-- css -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>

    <link rel="stylesheet" href="{{asset('ext/fa/css/font-awesome.min.css')}}"/>
    <style>
        body {
            background: #eee url({{asset('')}}img/sativa.png);
        }

        html, body {
            position: relative;
            height: 100%;
        }
        a:hover{
            text-decoration: none;
        }

        .login-container {
            position: relative;
            width: 300px;
            margin: 80px auto;
            padding: 20px 40px 40px;
            text-align: center;
            background: #fff;
            border: 1px solid #ccc;
        }

        #output {
            position: absolute;
            width: 300px;
            top: -75px;
            left: 0;
            color: #fff;
        }

        #output.alert-success {
            background: rgb(25, 204, 25);
        }

        #output.alert-danger {
            background: rgb(228, 105, 105);
        }

        .login-container::before, .login-container::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 3.5px;
            left: 0;
            background: #fff;
            z-index: -1;
            -webkit-transform: rotateZ(4deg);
            -moz-transform: rotateZ(4deg);
            -ms-transform: rotateZ(4deg);
            border: 1px solid #ccc;

        }

        .login-container::after {
            top: 5px;
            z-index: -2;
            -webkit-transform: rotateZ(-2deg);
            -moz-transform: rotateZ(-2deg);
            -ms-transform: rotateZ(-2deg);

        }

        .avatar {
            width: 100px;
            height: 100px;
            margin: 10px auto 30px;
            border-radius: 100%;
            border: 2px solid #aaa;
            background-size: cover;
        }

        .form-box input {
            width: 100%;
            padding: 10px;
            text-align: center;
            height: 40px;
            border: 1px solid #ccc;;
            background: #fafafa;
            transition: 0.2s ease-in-out;

        }

        .form-box input:focus {
            outline: 0;
            background: #eee;
        }

        .form-box input[type="email"] {
            border-radius: 0px 5px 0 0;
            text-transform: lowercase;
            float: right;
            clear: none;
            width: 85%;
            border-left: none;
        }

        .form-box input[type="password"] {
            border-radius: 0 0 5px 0;
            border-top: 0;
            width: 85%;
            border-left: none;
            float: right;
            clear: none;
            margin-bottom: 20px;
        }

        .form-box button.login {
            margin-top: 15px;
            padding: 10px 20px;
        }

        .animated {
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        @-webkit-keyframes fadeInUp {
            0% {
                opacity: 0;
                -webkit-transform: translateY(20px);
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                -webkit-transform: translateY(20px);
                -ms-transform: translateY(20px);
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                -webkit-transform: translateY(0);
                -ms-transform: translateY(0);
                transform: translateY(0);
            }
        }

        .fadeInUp {
            -webkit-animation-name: fadeInUp;
            animation-name: fadeInUp;
        }
    </style>

</head>
<body>
<div id="wrapper" class="home-page">
    <header class="topbar">
        <div class="container">

        </div>
    </header>
    <section id="content">
        <div class="container">

            <section class="services">
                <div class="container">
                    <div class="login-container" style="width: 350px">
                        <div id="output"></div>


                        <div class="form-box">
                            @if ($errors->has('finish'))
                                <span class="help-block" style="color: darkred">
                                        <strong>{{ $errors->first('finish') }}</strong>
                                    </span>
                            @else
                                <h2 style="
    font-size: 25px;
    margin-bottom:  30px;
    font-weight: bolder;
    color: #066986;
">LẤY LẠI MẬT KHẨU</h2>
                                @if ($errors->has('email'))
                                    <span class="help-block" style="color: darkred">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('captcha'))
                                    <span class="help-block" style="color: darkred">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                                @endif
                                <form action="{{route('doForgetPass')}}" method="POST">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div style="height: 40px;background: #cccccc;border: 1px solid #ccc;float: left;clear: right;width: 15%;border-radius: 5px 0 0 5px;">
                                        <i class="fa fa-user-o" aria-hidden="true" style=" margin-top: 8px; font-size: 20px; color: #676565; "></i>
                                    </div>
                                    <input name="email" type="email" placeholder="Email" value="{{old('email')}}" autofocus="" style="margin-bottom:  10px;">
                                    <div style="text-align: left;">
                                        <span id="c_data">
                                            <img src="{{route('captcha')}}" style="width: 218px;height: 80px;align-items: left;border: solid 1px #cecece;border-radius: 5px;">
                                        </span>
                                        <button id="captcha" type="button" class="btn btn-warning"><i class="fa fa-refresh" style="
    font-size: 23px;
"></i></button>
                                        <div style="padding-top: 10px">
                                            <input type="text" placeholder="Captcha" name="captcha" value="">
                                        </div>
                                    </div>
                                    <button class="btn btn-info btn-block login" type="submit" style=" margin-top: 20px;" >GỬI</button>
                                    <a href="{{route('login')}}"><button class="btn btn-info btn-block btn-warning" type="button" style=" margin-top: 10px;" >QUAY LẠI</button></a>
                                </form>
                            @endif
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </section>

    <footer>
        <div class="container">

            <div id="sub-footer">
                <div class="container">
                    <div class="row">

                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>