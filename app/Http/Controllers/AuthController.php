<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomeExceptions;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Throw_;

class AuthController extends Controller
{
    //
 public function login(Request $request)
 {
    try{
    $request->validate([
         "email" => "required|email",
         "password" => "required|string|min:8|max:16"
     ]);
    $email = $request->input('email');
    $password = $request->input('password');
    $user = User::where('email',$email)->first();
    if (!$user || !Hash::check($password, $user->password)) {
        throw new CustomeExceptions('Invalid email or password', 403);
    }

    $token = $user->createToken($user->id)->plainTextToken;

    return response()->json([
        'message' => 'Verified successfully',
        'status' => 200,
        'token' => $token,
    ]);
    }
    catch(Exception $e)
    {
        throw new CustomeExceptions($e->getMessage(), 500);
    }
  
 }
 public function register(Request $request)
 {
    try{
        $validateUser =  $request->validate([
            "name" => "required|string|min:4|max:50",
            "email" => "required|string|unique:users,email",
            "password" => "required|string|min:8|max:16"
        ]);
     $validateUser['password'] = Hash::make($validateUser['password']);
    $user = User::create($validateUser);
    if($user)
    {
      
      $token = $user->createToken($user->id)->plainTextToken;
      return response()->json([
          'message' => 'Registration successful',
          'status' => 201,
          'token' => $token,
      ]);

    }
    }
    catch(Exception $e)
    {
        // return response()->json($e->getMessage());
        throw new CustomeExceptions($e->getMessage(), 500);
    }
 }
 public function logout(Request $request)
 {
    try
    {
    // access to head of user request the token authentication 
    $user = $request->user('sanctum');
    if (!$user) {
        throw new CustomeExceptions('Unauthentication' , 401);
    }
    $token = $user->currentAccessToken();

    if($token)
        {
            $token->delete();
            return response()->json(['message' => 'Logged out successfully', "status" => 200]);
        }
            return response()->json(['message' => 'No active token found.'], 400);
    }
    catch(Exception $e)
    {
      throw new CustomeExceptions($e->getMessage(),500);
    }
    
 }
}
