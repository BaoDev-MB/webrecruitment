
    <section>
        <div id="login-box">
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}
                    @endforeach
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            <div class="left">
                <form action="{{route('signup')}}" method="post" role="beta-form-checkout">
                    {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                    {!! csrf_field() !!}
                    <h1>Sign up</h1>


                    <input type="text" name="email" placeholder="E-mail"/>
                    <input type="text" name="phone" placeholder="Numberphone"/>
                    <input type="password" name="password" placeholder="Password"/>
                    <input type="password" name="re_password" placeholder="Retype password"/>
                    <input type="text" name="name" placeholder="Username"/>

                    <input type="submit" name="signup_submit" value="Sign me up"/>
                </form>
            </div>
        </div>
    </section>
