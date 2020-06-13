
    <section>


        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">

                    <form action="{{route('forget-reset')}}" method="post" role="form">
                        <legend>New Password</legend>
                        @csrf

                        @if(session('error'))
                            <div>
                                {{session('error')}}
                            </div>
                        @endif

                        @if(session('success'))
                            <div>
                                {{session('success')}}
                            </div>
                        @endif

                        <input type="hidden" class="form-control" name="token" value='{{$token}}'>
                        <input type="hidden" class="form-control" name="email" value='{{$email}}'>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password"
                                   name="password">
                            @if($errors->has('password'))
                                <p style="color:red">{{$errors->first('password')}}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Retype Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Retype Password"
                                   name="re_password">
                            @if($errors->has('re_password'))
                                <p style="color:red">{{$errors->first('re_password')}}</p>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
