@extends('layouts.app')

@section('title', 'Register')

@section('styles')
<style>
    .register-container {
        display: flex;
        justify-content: center;
        padding: 80px 0;
    }

    .register-box {
        width: 400px;
        padding: 40px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .register-box h2 {
        font-weight: 600;
        margin-bottom: 30px;
        text-align: center;
    }

    .register-box .form-control {
        border-radius: 10px;
    }

    .register-box .btn {
        width: 100%;
        border-radius: 10px;
        margin-top: 15px;
    }

    .register-box .login-link {
        text-align: center;
        margin-top: 15px;
    }
</style>
@endsection

@section('content')
<div class="register-container">
    <div class="register-box">
        <h2>Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter username" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="terms" class="form-check-input" id="terms" required>
                <label class="form-check-label" for="terms">Setuju dengan Syarat & Ketentuan</label>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>

            <div class="login-link">
                <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
