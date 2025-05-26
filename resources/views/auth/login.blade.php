@extends('layouts.app')

@section('title', 'Login')

@section('styles')
<style>
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 80px 0;
    }

    .login-box {
        width: 400px;
        padding: 40px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .login-box h2 {
        font-weight: 600;
        margin-bottom: 30px;
        text-align: center;
    }

    .login-box .form-control {
        border-radius: 10px;
    }

    .login-box .btn {
        width: 100%;
        border-radius: 10px;
        margin-top: 15px;
    }

    .login-box .register {
        text-align: center;
        margin-top: 15px;
    }
</style>
@endsection

@section('content')
<div class="container login-container">
    <div class="login-box">
        <h2>Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter password">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>

            <div class="register">
                <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
