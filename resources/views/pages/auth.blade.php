@extends('layouts.main')

@section('title', "Login - Register")

@section('content')
<!-- Titlebar
    ================================================== -->

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
            <li class=""><a href="#tab1">Login</a> </li>
            <li class=""><a href="#tab2">Register</a></li>
        </ul>

        <div class="tabs-container">
            <!-- Login -->
            <div class="tab-content" id="tab1" style="display: none;">
                <form method="POST" action="{{url('login')}}" class="login">
                    @csrf
                    @error('mes')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                    <p class="form-row form-row-wide">
                        <label for="email">Email:
                            <i class="ln ln-icon-Email"></i>
                            <input type="text" class="input-text" name="email" id="email" value="{{ old('email') }}" />
                        </label>
                        @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="pass">Password:
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="pass" id="pass" } />
                        </label>
                        @error('pass')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </p>

                    <p class=" form-row">
                        <input type="submit" class="button border fw margin-top-10" name="login" value="Login" />

                        <label for="rememberme" class="rememberme">
                            <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember
                            Me</label>
                    </p>

                    <p class="lost_password">
                        <a href="{{route('forgetpassword')}}">Lost Your Password?</a>
                    </p>

                </form>
            </div>

            <!-- Register -->
            <div class="tab-content" id="tab2" style="display: none;">

                <form method="post" action="{{ url('register') }}" class="register">
                    @csrf
                    <p class="form-row form-row-wide">
                        <label for="r_name">Your Fullname:
                            <i class="ln ln-icon-Male"></i>
                            <input type="text" class="input-text" name="r_name" id="r_name" value="{{old('r_name')}}" />
                        </label>
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="email">Email Address:
                            <i class="ln ln-icon-Mail"></i>
                            <input type="text" class="input-text" name="email" id="email" value="{{old('r_email')}}" />
                        </label>
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="password">Password:
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="password" id="password" />
                        </label>
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="r_repass">Repeat Password:
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="r_repass" id="r_repass" />
                        </label>
                    </p>

                    <p class="form-row">
                        <input type="submit" class="button border fw margin-top-10" name="register" value="Register" />
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
