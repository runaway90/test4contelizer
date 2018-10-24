@extends('layout.up')

<div class="mt-3 container justify-content-center d-flex">
    <div class="pt-5  ml-5 pl-5 mr-5 pr-5 ">

        <form class="form-signin" role="form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="text-center mb-4">

                <div class="form-group">
                    <h2>Register a new user</h2>
                </div>

                <div class="justify-content-center form-label-group{{ $errors->has('email') ? ' has-error' : '' }}">

                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="email" id="email" name ='email' class="form-control" value="{{ old('email') }}" placeholder="Email address" required autofocus>
                    <label for="email" >Email address</label>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif

                </div>

                <div class="form-label-group{{ $errors->has('password') ? ' has-error' : '' }}">

                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" id="password"  name='password' class="form-control" placeholder="Password" required>
                    <label for="password">Password</label>
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>


                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </div>

        </form>

    </div>
</div>
</div>

@extends('layout.down')
