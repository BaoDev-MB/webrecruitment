@extends('layouts.main')

@section('title',"Forgot Password")

@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
    <div class="container">
        <div class="sixteen columns">
            <h2>Forgot Password</h2>
        </div>
    </div>
</div>

<!-- Content
================================================== -->

<!-- Container -->
<div class="container" style="height: 50vh;">
    <div class="row h-75 justify-content-center align-items-center">
        <form method="POST" action="forgetpass" class="register my-account col-md-5">
            <div class="form">
                <label for="username">Your Email:
                    <i class="ln ln-icon-Email"></i>
                    <input type="email" class="input-text" name="username" id="username" value="" />
                </label>
            </div>

            <p class="form-group">
                <input type="submit" class="btn-block border fw margin-top-10" name="register" value="Register" />
            </p>
        </form>
    </div>
</div>
@endsection()