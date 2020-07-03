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
            <li class=""><a href="#tab2">Register</a></li>
        </ul>

        <div class="tabs-container">
            <!-- Login -->
            <div class="tab-content" id="tab1" style="display: none;">
                <form method="post" class="login">
                    @csrf
                    @error('mes')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror

                    @if(Session::has('ok'))
                    <small class="form-text text-success">{{ Session::get('ok') }}</small>
                    @endif
                    <p class="form">
                        <label for="email">Email:
                            <i class="ln ln-icon-Email"></i>
                            <input type="text" class="input-text" name="email" id="email" value="{{ old('email') }}" />
                        </label>
                        @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </p>

                    <p class="form">
                        <label for="pass">Password:
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="pass" id="pass" } />
                        </label>
                        @error('pass')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </p>

                    <p class="form-group">
                        <input type="submit" class="btn-block border fw mt-3" name="login" value="Login" />

                        <label for="rememberme" class="rememberme">
                            <input name="rememberme" type="checkbox" id="rememberme" value="forever" />
                            Remember Me</label>
                    </p>

                    <p class="lost_password">
                        <a href="{{route('forgetpass')}}">Lost Your Password?</a>
                    </p>
                </form>
            </div>

            <!-- Register -->
            <div class="tab-content" id="tab2" style="display: none;">
                <form method="post" class="register">
                    @csrf
                    <p class="form">
                        <label for="r_firstname">First Name:
                            <i class="ln ln-icon-Male"></i>
                            <input type="text" class="input-text" name="r_firstname" id="r_firstname"
                                value="{{old('r_firstname')}}" />
                        </label>
                        @error('r_firstname')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </p>
                    <p class="form">
                        <label for="r_lastname">Last Name:
                            <i class="ln ln-icon-Male"></i>
                            <input type="text" class="input-text" name="r_lastname" id="r_lastname"
                                value="{{old('r_lastname')}}" />
                        </label>
                        @error('r_lastname')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </p>

                    <p class="form">
                        <label for="r_email">Email Address:
                            <i class="ln ln-icon-Mail"></i>
                            <input type="text" class="input-text" name="r_email" id="r_email"
                                value="{{old('r_email')}}" />
                        </label>
                        @error('r_email')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </p>

                    <p class="form">
                        <label for="r_pass">Password:
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="r_pass" id="r_pass" />
                        </label>
                        @error('r_pass')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </p>

                    <p class="form">
                        <label for="r_repass">Repeat Password:
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="r_repass" id="r_repass" />
                        </label>
                        @error('r_repass')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </p>

                    <p class="form-group">
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