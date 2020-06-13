<style>
    .form-gap {
        padding-bottom: 70px;
    }
</style>
<div class="form-gap"></div>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h2 class="text-center">Forgot Password?</h2>
                        <p>You can reset your password here.</p>
                        <div class="panel-body">

                            <form id="register-form" role="form" action="{{route('forget-create')}}" autocomplete="off" class="form" method="post">
                                    @csrf



                                @if(session('success'))
                                    <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input type="email" class="form-control" name="email" placeholder="Email">

                                    </div>
                                    @if($errors->has('email'))
                                        <p style="color:red">{{$errors->first('email')}}</p>
                                    @endif
                                @if(session('error'))
                                        <div>
                                            <p style="color:red"> {{session('error')}}</p>

                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Reset Password</button>

                                </div>

                                <input type="hidden" class="hide" name="token" id="token" value="">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
