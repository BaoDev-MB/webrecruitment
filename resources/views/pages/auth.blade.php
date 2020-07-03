@extends('layouts.main')

@section('title', "Login - Register")

@section('content')
<div id="titlebar" class="single">
    <div class="container">
        <div class="sixteen columns">
            <h2>My Account</h2>
            <nav id="breadcrumbs">
                <ul>
                    <li>You are here:</li>
                    <li><a href="#">Home</a></li>
                    <li>My Account</li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Content
================================================== -->

<!-- Container -->
<div class="container">
    <div class="my-account">
        <ul class="tabs-nav">
            <li class=""><a href="#tab1">Login</a></li>
            <li class="in active"><a href="#tab2">Register</a></li>
        </ul>

        <div class="tabs-container">
            <!-- Login -->
            <div class="tab-content" id="tab1" style="display: none;">
                <form method="post" class="login">
                    <div class="form">
                        <label for="username">Username:
                            <i class="ln ln-icon-Male"></i>
                            <input type="text" class="input-text" name="username" id="username" value="" />
                        </label>
                    </div>

                    <div class="form">
                        <label for="password">Password:
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="password" id="password" />
                        </label>
                    </div>

                    <p class="form-row">
                        <input type="submit" class="btn-block border fw mt-3" name="login" value="Login" />

                        <label for="rememberme" class="rememberme">
                            <input name="rememberme" type="checkbox" id="rememberme" value="forever" />
                            Remember Me</label>
                    </p>

                    <p class="lost_password">
                        <a href="#">Lost Your Password?</a>
                    </p>
                </form>
            </div>

            <!-- Register -->
            <div class="tab-content" id="tab2" style="display: none;">
                <form method="post" class="register">
                    <div class="form">
                        <label for="username2">Username:
                            <i class="ln ln-icon-Male"></i>
                            <input type="text" class="input-text" name="username" id="username2" value="" />
                        </label>
                    </div>

                    <div class="form">
                        <label for="email2">Email Address:
                            <i class="ln ln-icon-Mail"></i>
                            <input type="text" class="input-text" name="email" id="email2" value="" />
                        </label>
                    </div>

                    <div class="form">
                        <label for="password1">Password:
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="password1" id="password1" />
                        </label>
                    </div>

                    <div class="form">
                        <label for="password2">Repeat Password:
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="password2" id="password2" />
                        </label>
                    </div>

                    <p class="form-row">
                        <input type="submit" class="btn-block border fw mt-3" name="register" value="Register" />
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection()


<!-- Script to active register
    ================================================== -->
@section('lastScript')
@if ($register ?? ''!='')
<script>
    $( document ).ready(function() {
        $('.tabs-nav a[href$="{{$register}}"]').parent("li").click();
    });
</script>
@endif
@endsection()