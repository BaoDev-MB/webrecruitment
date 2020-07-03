@extends('layouts.main')

@section('title',"Reset Password")

@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
    <div class="container">
        <div class="sixteen columns">
            <h2>Reset Password</h2>
        </div>
    </div>
</div>

<!-- Content
================================================== -->

<!-- Container -->
<div class="container" style="height: 50vh;">
    <div class="my-account row h-75 justify-content-center align-items-center">
        <form method="POST" action="{{route('resetpass',['email'=>$email,'key'=>$key])}}" class="register">
            @csrf
            <div class="form">
                <label for="pass">New Password:
                    <i class="ln ln-icon-Lock-2"></i>
                    <input type="password" class="input-text" name="pass" id="pass" value="" />
                </label>
            </div>
            <div class="form">
                <label for="repass">Confirm Password:
                    <i class="ln ln-icon-Lock-2"></i>
                    <input type="password" class="input-text" name="re-pass" id="repass" value="" />
                </label>
            </div>

            <p class="form-group">
                <input type="submit" class="btn-block border fw margin-top-10" name="submit" value="Submit" />
            </p>
        </form>
    </div>
</div>
@endsection()