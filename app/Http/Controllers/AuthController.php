<?php

  namespace App\Http\Controllers;

  use App\Models\User;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Hash;

  class AuthController extends Controller
  {
      public function register(Request $request)
      {
          // Langkah 1: Tes respons sederhana
          return response()->json(['message' => 'Test successful'], 200);

          // Langkah 2: Uncomment setelah tes berhasil
          /*
          $request->validate([
              'username' => 'required|string|unique:users',
              'email' => 'required|string|email|unique:users',
              'password' => 'required|string|min:6|confirmed',
          ]);

          $user = User::create([
              'username' => $request->username,
              'email' => $request->email,
              'password' => Hash::make($request->password),
          ]);

          return response()->json(['message' => 'User registered', 'user' => $user], 201);
          */
      }

      public function login(Request $request)
      {
          $request->validate([
              'username' => 'required|string',
              'password' => 'required|string',
          ]);

          $user = User::where('username', $request->username)->first();

          if (!$user || !Hash::check($request->password, $user->password)) {
              return response()->json(['message' => 'Invalid credentials'], 401);
          }

          $token = $user->createToken('auth_token')->plainTextToken;

          return response()->json(['message' => 'Login successful', 'token' => $token], 200);
      }
  }