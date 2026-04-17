<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
  public function register(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required|string|min:3',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:8|confirmed',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'message' => "Validations Filed",
        'errors' => $validator->errors(),
      ], 422);
    }

    $user =  User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password)
    ]);
    $token = $user->createToken('api_token')->plainTextToken;

    return response()->json([
      'success' => true,
      'message' => "User registered successfuly!",
      'user' => $user,
      'token_type' => "Bearer",
      'token' => $token
    ], 201);
  }

  public function login(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'email' => 'required|email',
      'password' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'message' => "validations failed",
        'errors' => $validator->errors()
      ], 422);
    }

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      $user = User::where('email', $request->email)->first();
      $token = $user->createToken('api-token')->plainTextToken;

      return response()->json([
        'success' => true,
        'message' => "Logged In successfuly!",
        'user' => $user,
        'token_type' => "Bearer",
        'token' => $token
      ], 200);
    } else {
      return response()->json([
        'success' => false,
        'message' => "not logged in successfully!",
        'error' => "Invalid Credentials",
      ], 401);
    }
  }
}
