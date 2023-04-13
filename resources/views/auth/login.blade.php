@extends('layout')

@section('content')
    <div class="login-wrapper">
        <div class="form-wrapper">
        @if(session('success'))
            <p class="login-error">{{session('success')}}</p>
        @endif
            <form action="/login" method="POST">
                @csrf
                <p class="text-input-wrapper"><img src="/assets/user.png" alt="Email icon" class="login__icon"><input type="email" placeholder="Email" name="email"></p>
                <p class="text-input-wrapper"><img src="/assets/lock.png" alt="Password icon" class="login__icon"><input type="password" placeholder="Password" name="password"></p>
                <p class="submit-wrapper"><input type="submit" class="login-button" value="Login"></p>
            </form>

            <div class="screen__background">	
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
            </div>
        </div>
    </div>
@stop