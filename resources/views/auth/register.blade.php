@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-white">
    <div class="w-full max-w-md p-8 bg-[#F3EDDB] rounded-xl shadow-md">
        <div class="mb-4 text-center">
            <h1 class="text-xl font-bold">PELUK_WANGI</h1>
            <p class="text-sm">Already have an account? <a href="/login" class="text-blue-600 underline">Sign in</a></p>
        </div>
        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label>Username</label>
                <input type="text" name="username" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="flex items-center space-x-2">
                <input type="checkbox" name="terms" required>
                <label>Setuju dengan Syarat & Ketentuan</label>
            </div>
            <button type="submit" class="w-full bg-[#5D674D] text-white py-2 rounded">Make an account</button>
        </form>
    </div>
</div>
@endsection
