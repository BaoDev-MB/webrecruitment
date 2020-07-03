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
    <div class="row my-account h-75 justify-content-center align-items-center">
        <form method="POST" action="forgetpass" class="register my-account">
            @csrf
            <div class="form">
                <label for="username">Your Email:
                    <i class="ln ln-icon-Email"></i>
                    <input type="email" class="input-text" name="email" id="username" value="" />
                </label>
            </div>
            @error('mes')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
            <p class="form-group">
                <input type="submit" class="btn-block border fw margin-top-10" value="Comfirm" />
            </p>
        </form>
    </div>
</div>
@endsection()