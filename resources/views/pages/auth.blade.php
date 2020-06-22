@extends('layouts.main')

@section('title', "Login - Register")

@section('content')<!-- Titlebar
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
                <li class=""><a href="#tab1">Login</a></li>
                <li class="{{--@if(Session::has('signup')) active @endif--}}"><a href="#tab2">Register</a></li>
            </ul>

            <div class="tabs-container">
                <!-- Login -->
                <div class="tab-content" id="tab1" style="display: none;">
                    @if (session('ok'))
                        <div class="alert alert-success">
                            {{ session('ok') }}
                        </div>
                    @endif
                    @if (!Session::has('signup')&&$errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form method="post" class="login">
                        @csrf
                        <p class="form-row form-row-wide">
                            <label for="username">Username:
                                <i class="ln ln-icon-Male"></i>
                                <input type="text" class="input-text" name="email" id="username" value="" />
                            </label>
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="password">Password:
                                <i class="ln ln-icon-Lock-2"></i>
                                <input class="input-text" type="password" name="pass" id="password"/>
                            </label>
                        </p>

                        <p class="form-row">
                            <input type="submit" class="button border fw margin-top-10" name="login" value="Login" />

                            <label for="rememberme" class="rememberme">
                            <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember Me</label>
                        </p>

                        <p class="lost_password">
                            <a href="#" >Lost Your Password?</a>
                        </p>

                    </form>
                </div>

                <!-- Register -->
                <div class="tab-content" id="tab2" style="display: none;">

                    <form method="post" class="register">

                    <p class="form-row form-row-wide">
                        <label for="username2">Username:
                            <i class="ln ln-icon-Male"></i>
                            <input type="text" class="input-text" name="name" id="username2" value="" />
                        </label>
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="email2">Email Address:
                            <i class="ln ln-icon-Mail"></i>
                            <input type="text" class="input-text" name="email" id="email2" value="" />
                        </label>
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="password1">Password:
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="pass" id="password1"/>
                        </label>
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="password2">Repeat Password:
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="repass" id="password2"/>
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
