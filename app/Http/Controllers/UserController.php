<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomeExceptions;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
        $user = User::with(['socialMedia:id,platform,username'])->get([
                'email', 'role_id', 'gender', 'birthdate', 'socialmedia_id'
            ]);
            
         if($user)
         {
            return response()->json([
                "message" => "Get users successfully",
                "status" => 200,
                "data" => $user
            ]);
         }
         return response()->json([
            "message" => "User not found",
            "status" => 404,
        ]);
        }
        catch(Exception $e)
        {
            throw new CustomeExceptions($e->getMessage(), 500);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try
        {
          $ValidatedUser = $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:users,email",
            "password" => "required|string|min:8|max:16",
            "gender" => "required",
            "birthdate" => "required",
            "role_id" => "required|integer",
            "socialmedia_id" => "nullable"
          ]);
          $user = User::create($ValidatedUser);
          if($user)
          {
            return response()->json([
                "message" => "Create users successfully",
                "status" => 200,
                "data" => $user
            ]);
          }
          return response()->json([
            "message" => "Fail to create users",
            "status" => 400,
            // "data" => $user
        ]);
        }
        catch(Exception $e)
        {
            throw new CustomeExceptions($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try
        {
         $user = User::findOrFail($id);
         if($user)
         {
            return response()->json([
                "message" => "Get user successfully",
                "status" => 200,
                "data" => $user
            ]);
         }
         return response()->json([
            "message" => "User not found",
            "status" => 404,
        ]);
        }
        catch(Exception $e)
        {
            throw new CustomeExceptions($e->getMessage(), 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try
        {
            $ValidatedUser = $request->validate([
                "name" => "required|string",
                "email" => "required|email|unique:users,email",
                "password" => "required|string|min:8|max:16",
                "gender" => "required",
                "birthdate" => "required",
                "role_id" => "required|integer",
                "socialmedia_id" => "nullable"
              ]);
              $user=User::findOrFail($id);
              if($user)
              {
                $user->update($ValidatedUser);
                return response()->json([
                    "message" => "Update user successfully",
                    "status" => 200,
                    "data" => $user
                ]);
              }
        }
        catch(Exception $e)
        {
            throw new CustomeExceptions($e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        try
        {
            $user = user::findOrFail($id);
            if($user)
            {
                $user->delete($id);
                return response()->json([
                    "message" => "Delete user successfully",
                    "status" => 200,
                ]);
            }

        }
        catch(Exception $e)
        {
            throw new CustomeExceptions($e->getMessage(), 500);
        }
    }
}
